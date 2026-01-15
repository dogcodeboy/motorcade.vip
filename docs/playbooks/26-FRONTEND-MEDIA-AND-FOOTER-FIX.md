# Playbook 26 — Frontend Media and Footer Fix

## Purpose
Fix the *delivery path* for WordPress media so uploaded files under `/wp-content/uploads/` can be served directly by nginx (instead of being routed through PHP or blocked by an overly-catchall location).

This playbook is about **serving** files correctly.  
It does **not** make the theme “call” specific images in templates (that is Playbook 27).

## What it changes
- Injects an nginx `server {}`-level managed block (`MOTORCADE_STATIC_UPLOADS`) into:
  - `/etc/nginx/conf.d/motorcade.conf`
  - `/etc/nginx/conf.d/motorcade-ssl.conf`
- Adds explicit locations for:
  - `^~ /wp-content/uploads/` (media)
  - common static extensions (css/js/images/fonts)
- Reloads nginx if config changes.

## Why it matters
If `/wp-content/uploads/...` is not served as a normal static path, images may:
- 404 on the frontend even though they exist on disk
- be handled by PHP/FastCGI unexpectedly
- be blocked due to nested/invalid nginx configuration

## Important note (root cause we corrected)
**The nginx `location` blocks must be inserted inside `server {}` — not inside an existing `location / {}` block.**
Nginx does not allow `location` directives nested within `location`.

This playbook uses:
- `insertafter: "^server\s*\{"`
to guarantee correct placement.

## Run
From the controller repo:
```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/26_frontend_media_and_footer_fix.yml
```

## Verify
Pick any image URL that exists on the server:
```bash
curl -I https://motorcade.vip/wp-content/uploads/motorcade/hero-executive-protection.jpg
```
Expected:
- `HTTP/2 200`
- `content-type: image/jpeg`

If you still see missing images *visually* on the homepage but direct URLs work, that means the **theme is not referencing the assets** → proceed to Playbook 27.
