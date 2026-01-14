# 24 — Deploy Site Image Assets

## Purpose
Copies the Motorcade site image pack to the WordPress uploads directory so the theme/pages can reference stable URLs like:

- `/wp-content/uploads/motorcade/<filename>`

This is intentionally **idempotent**: you can rerun it safely.

## What it changes
On the **web server**:

- Ensures `{{ wp_root }}/wp-content/uploads/motorcade/` exists
- Copies images from the repo (controller) into that folder
- Ensures ownership is correct for the web user (typically `nginx:nginx` on Amazon Linux)

## Expected repo inputs
This playbook expects the controller path:

- `ansible/files/wp/assets/images/motorcade/`

If you keep a separate `assets/images/motorcade/` at repo root, **copy/sync it into** the expected Ansible path before running.

## Run
From the `ansible/` directory at repo root:

```bash
ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/24_assets_images.yml
```

## Verify
Pick one image filename you know exists (example: `about-team.jpg`) and run:

```bash
ssh -i ~/.ssh/motorcade-key.pem ec2-user@<SERVER_IP> \
  "ls -la {{ wp_root }}/wp-content/uploads/motorcade/ | head"
```

And from your workstation:

```bash
curl -I https://motorcade.vip/wp-content/uploads/motorcade/about-team.jpg
```

You want `HTTP/2 200` (or `200 OK`).

## If images still don’t appear on the site
This playbook only **places files**. If the front-end still shows no images, the usual causes are:

1. The theme/pages are referencing a different path (404 in devtools).
2. Permissions/ownership prevent Nginx from reading the files (403).
3. Caching (browser/CDN) — hard refresh or test in an incognito window.
4. The active theme hasn’t been deployed/activated yet.

Check the exact broken image URL in the browser and test it with `curl -I` to see if it’s a 404/403.
