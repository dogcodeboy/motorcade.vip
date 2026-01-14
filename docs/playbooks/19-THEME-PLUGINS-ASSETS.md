# Playbook 19 — Theme, Plugins, and Assets Deployment

## Purpose
Deploy the Motorcade WordPress **theme**, optional **custom plugins**, and optional **image assets** using Ansible (idempotent and repeatable).

This playbook is designed to be **safe on a live site**:
- No nginx reloads
- No WordPress core edits
- File operations only (theme/plugins/uploads)

## Repo Inputs (must exist)
Place these files in the repo:

- Theme zip:
  - `ansible/files/wp/themes/motorcade-trust-theme.zip`
- Plugin zips (optional):
  - `ansible/files/wp/plugins/motorcade-content-injector-v1.1.0.zip`
- Assets zip (optional):
  - `ansible/files/wp/assets/motorcade-assets.zip`

## What it does on the server
- Uploads theme zip to `/tmp` and unpacks into:
  - `/var/www/motorcade/wp-content/themes/motorcade-trust/`
- Uploads plugin zip(s) and unpacks into:
  - `/var/www/motorcade/wp-content/plugins/`
- Ensures assets directory exists:
  - `/var/www/motorcade/wp-content/uploads/motorcade/`
- Sets ownership to `nginx:nginx` recursively on the deployed paths.
- Attempts theme activation **only if WP-CLI exists**.

## Run
From repo:

```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/19_theme_plugins_assets.yml
```

### Optional: deploy assets bundle
```bash
ansible-playbook -i inventories/prod/hosts.ini playbooks/19_theme_plugins_assets.yml -e deploy_assets=true
```

## Activation notes
- If WP-CLI is present, the theme is activated automatically.
- If WP-CLI is not present, activate manually:
  - WP Admin → Appearance → Themes → Activate “motorcade-trust”.

## Troubleshooting
### “Could not find or access … motorcade-trust-theme.zip”
Ensure the file exists at:
`ansible/files/wp/themes/motorcade-trust-theme.zip`

This playbook uses `{{ playbook_dir }}` to resolve paths correctly when executed from `ansible/`.

### Plugins not activating
Activation is intentionally disabled by default (`activate_plugins: false`) until plugin folder slugs are confirmed.
