# Playbook 36e — Roll back header.php + style.css

## What this fixes
If the homepage suddenly shows **giant logos / giant icons**, a **blank hero**, or **multiple logos**, it usually means `header.php` and/or `style.css` in the active theme were overwritten with a partial file.

This playbook restores both files from the **newest on-server backups** (the `*.bak.*`, `*.broken.*`, or `*.pre_*` copies that were created during prior patch attempts).

## Run
From the repo root:

```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/36e_rollback_header_style.yml \
  --private-key ~/.ssh/motorcade-key.pem
```

## Notes
- This playbook is **server-first**: it restores from backups in `/var/www/motorcade/wp-content/themes/motorcade-trust/`.
- After the rollback succeeds and the site is stable, we can re-apply the header-row change **safely** using a patch that edits CSS surgically instead of replacing whole files.
