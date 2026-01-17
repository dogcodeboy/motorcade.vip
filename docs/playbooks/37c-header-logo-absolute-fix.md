# Playbook 37c — Header Logo Absolute Fix

## Purpose
Hard-fix the header logo regression by applying an authoritative, defensive CSS patch that prevents the logo container from being hidden/collapsed by later styling.

## Runs against
- `motorcade-web-01` (inventory host)

## What it changes
- Creates timestamped backups of:
  - `.../themes/motorcade-trust/style.css`
  - `.../themes/motorcade-trust/header.php`
- Appends a “MC PATCH 37C” block at the end of `style.css`
- Creates a server-side theme tarball backup under:
  - `/home/ec2-user/backups/motorcade/`

## Command

```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/37c_header_logo_absolute_fix.yml --ask-vault-pass
```

## Verify
- Hard refresh: `Ctrl+Shift+R`
- Confirm logo visible in header and not duplicated
