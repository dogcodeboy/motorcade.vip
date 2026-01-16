# Playbook 36 — Homepage Render Assets + Footer DPS License

## What this does

1. Uploads the **exact render-matched images** into the active theme at:
   `wp-content/themes/motorcade-trust/assets/img/homepage_render/`
2. Replaces `front-page.php` with a **render-matched, responsive homepage** template (backs up the old file).
3. Injects a managed CSS block into `style.css` (safe to re-run).
4. Ensures the **Texas DPS License** line appears in the footer **site-wide** via a managed block in `footer.php`.

## Run

From repo root:

```bash
ansible-playbook \
  -i ansible/inventories/prod/hosts.ini \
  ansible/playbooks/36_homepage_render_assets_and_footer_license.yml \
  --ask-vault-pass
```

## After

- Verify homepage: `https://motorcade.vip/`
- Verify footer on multiple pages (Home/Services/About/etc): look for **"Texas DPS License:"**

## DPS License value

This playbook renders the value from the WordPress option:
- `motorcade_dps_license`

If it is not set, it will show the placeholder `ADD_LICENSE_IN_WP_ADMIN`.

To set it (if WP-CLI is installed):

```bash
wp option update motorcade_dps_license "<YOUR_LICENSE_NUMBER>" --path=/var/www/motorcade
```
