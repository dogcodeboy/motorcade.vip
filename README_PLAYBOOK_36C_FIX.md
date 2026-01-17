# Motorcade — Playbook 36c Header Row Fix (Repo-aligned)

This patch makes the **header logo stay in the same row** as the navigation + CTA on desktop.

## What it updates (repo source of truth)
- `ansible/files/themes/motorcade-trust/header.php`
- `ansible/files/themes/motorcade-trust/style.css`
- `ansible/playbooks/36c_header_logo_row_fix.yml`

## Apply (recommended commands)
From repo root:

```bash
cd ~/Repos/motorcade.vip
unzip -o ~/Downloads/motorcade-playbook36c-header-row-fix-REPOPATCH.zip

cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/36c_header_logo_row_fix.yml \
  --private-key ~/.ssh/motorcade-key.pem
```

## Verify
Open the site and confirm:
- The logo sits on the same row as the menu items.
- On small screens, wrapping may still occur (expected).
