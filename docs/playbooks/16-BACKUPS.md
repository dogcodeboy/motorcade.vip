# PLAYBOOK 16 — BACKUPS (FILES + DATABASE)
**Project:** motorcade.vip (AWS / Amazon Linux 2023)
**Goal:** Create durable backups (DB + files) without taking the site offline.

## 1) What this playbook creates
### On the server
- Backup root: `/var/backups/motorcade/`
- Daily backup folders: `/var/backups/motorcade/YYYY/MM/DD/`
- Backup artifacts per run:
  - Database dump: `db-<dbname>-<timestamp>.sql.gz`
  - Site content archive: `wp-content-<timestamp>.tar.gz`
  - Nginx+maintenance archive: `nginx-and-maintenance-<timestamp>.tar.gz`
  - Manifest: `manifest-<timestamp>.txt`
  - Log: `/var/log/motorcade/backups/backup-<timestamp>.log`

### In the repo
- Ansible playbook: `ansible/playbooks/16_backups.yml`

## 2) Design choices (safe + simple)
- **No downtime**: backups are read-only operations.
- **DB dumps** use MySQL credentials from Ansible vars (vault-backed in your repo).
- **File backups** focus on the change surface:
  - `/var/www/motorcade/wp-content/` (themes, plugins, uploads)
  - `/etc/nginx/conf.d/`, `/etc/nginx/snippets/`, maintenance directory
- Optional automation via **systemd timer** (disabled by default; you can enable).

## 3) Preconditions
- WordPress is live.
- `mysqldump` is available (from MariaDB client packages).
- Ansible vault is available at run time if DB password is vaulted.

## 4) Run (Ansible)
From repo root:
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/16_backups.yml
```

Optional: run a backup immediately during the playbook:
```bash
ansible-playbook -i inventories/prod/hosts.ini playbooks/16_backups.yml \
  -e motorcade_backup_run_now=true
```

Optional: install + enable nightly timer (02:15 local server time):
```bash
ansible-playbook -i inventories/prod/hosts.ini playbooks/16_backups.yml \
  -e motorcade_backup_enable_timer=true
```

## 5) Verify
- Confirm backup directory exists:
```bash
sudo ls -la /var/backups/motorcade | head
```
- Confirm latest artifacts:
```bash
sudo find /var/backups/motorcade -type f | tail -n 20
```
- Confirm latest log:
```bash
sudo ls -la /var/log/motorcade/backups | tail
sudo tail -n 80 /var/log/motorcade/backups/backup-*.log
```

## 6) What “good” looks like
- A new dated folder is created under `/var/backups/motorcade/YYYY/MM/DD/`
- It contains **db + wp-content + nginx/maintenance** archives
- Logs show successful `mysqldump` and `tar` creation

## 7) Next
➡ **Playbook 17 — Restore & Disaster Recovery (DR)**
