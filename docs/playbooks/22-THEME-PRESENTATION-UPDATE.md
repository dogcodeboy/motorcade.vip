# Playbook 22 — Theme Presentation Update

## Purpose
Deploys an updated `motorcade-trust` theme (v1.1.0) with:
- Proper menu rendering
- Clean header/nav layout
- Button styling and section spacing
- Front-page template support

## What it does
- Uploads `motorcade-trust-theme.zip` from `ansible/files/wp/themes/`
- Unarchives into `wp-content/themes/`
- Fixes ownership to `nginx:nginx`
- Activates theme via WP-CLI (best-effort)

## Run
```bash
cd ansible
ansible-playbook playbooks/22_theme_presentation_update.yml
```
