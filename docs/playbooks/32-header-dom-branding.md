# Playbook 32 — Header DOM & Branding Hierarchy Consolidation

**Goal:** Move the shield logo into the same DOM row as the navigation, and eliminate duplicate logo output caused by WordPress “Site Identity” markup being emitted in multiple places.

## What this playbook changes

- **Edits**: `/var/www/motorcade/wp-content/themes/motorcade-trust/header.php`
- Inserts an inline logo block **near the primary nav menu** (`wp_nav_menu`) using stable markers.
- Comments out other `the_custom_logo()` / `echo get_custom_logo()` call sites to suppress duplicates.
- Reloads **NGINX**.

## What this playbook does NOT do

- Does **not** touch logo image files or favicon assets.
- Does **not** use wp-admin.
- Does **not** modify `functions.php` or WordPress database theme-mod settings.

## Safety / Reversibility

- Creates a timestamped backup on-server:
  - `/var/backups/motorcade/32-header-dom-branding/<timestamp>/header.php`
- Validates patched file syntax before deployment:
  - `php -l /tmp/header.php.patched`
- Writes a copy of the **pre-change** header.php to the control machine for committing:
  - `ansible/artifacts/32-header-dom-branding/header.php`

## Run command

From repo root:

```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/32-header-dom-branding.yml --ask-vault-pass
```

## Verification checklist

- Logo appears inline on the same row as navigation.
- No second/duplicate logo appears below the menu.
- Mobile header remains responsive (no overflow / wrapping regressions).
- Site loads without PHP errors.

## Rollback

If something looks wrong:

1) Restore server backup:

```bash
sudo cp -a /var/backups/motorcade/32-header-dom-branding/<timestamp>/header.php \
  /var/www/motorcade/wp-content/themes/motorcade-trust/header.php
sudo systemctl reload nginx
```

2) Commit the rollback note in the next checkpoint.
