# Playbook 24 — Assets (Images) + WP Filesystem Fix (Option C)

## Purpose
This playbook deploys Motorcade website image assets into WordPress **uploads** (not the theme), and hardens the WordPress filesystem settings so media operations (crop/favicon, thumbnail regeneration, etc.) work reliably.

This matches the **Option C** decision: the theme and content reference images from:

- `/wp-content/uploads/motorcade/*`

## What it does
1. Ensures the WordPress root exists (`/var/www/motorcade`).
2. Ensures `wp-content/uploads/motorcade/` exists on the server.
3. Copies all asset images from the repo into `wp-content/uploads/motorcade/` (idempotent).
4. Fixes ownership and permissions for `wp-content/uploads`:
   - owner/group: `nginx:nginx`
   - directories: `0755`
   - files: `0644`
5. Sets `FS_METHOD` to `direct` in `wp-config.php` using a safe `blockinfile` marker.
6. Optionally imports the uploaded JPGs into the WP Media Library via `wp-cli` (if available).

## Inputs
Repo asset source (controller):
- `ansible/files/wp/assets/images/motorcade/`

Server destinations:
- `wp-content/uploads/motorcade/`

## Run
From the repo:

```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/24_assets_images.yml
```

## Verify
On the server:

```bash
ls -la /var/www/motorcade/wp-content/uploads/motorcade | head
sudo -u nginx wp --path=/var/www/motorcade eval 'var_dump(wp_is_writable(wp_upload_dir()["basedir"]));'
```

In WP Admin:
- Appearance → Customize → Site Identity → try setting/cropping the Site Icon (favicon)

## Notes
- If Site Health reports "not writable" but uploads work, it’s often because WP checks additional paths (themes/plugins) depending on the filesystem method. `FS_METHOD=direct` + correct ownership resolves this on most nginx+php-fpm stacks.
