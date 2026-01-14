# PLAYBOOK 18 — OPS HANDOFF & DAY-2 RUNBOOK
**Project:** motorcade.vip (AWS / Amazon Linux 2023)
**Goal:** Make day-2 operations repeatable and fast.

## 1) What this playbook creates
### On the server
- Health check script: `/usr/local/sbin/motorcade-healthcheck.sh`
- Diagnostics bundle script: `/usr/local/sbin/motorcade-diagnostics.sh`
- Log rotation: `/etc/logrotate.d/motorcade`
- Logs root: `/var/log/motorcade/` (health/diagnostics)

### In the repo
- Ansible playbook: `ansible/playbooks/18_ops_handoff.yml`

## 2) Health check (fast)
```bash
sudo /usr/local/sbin/motorcade-healthcheck.sh
```
Checks:
- nginx config test
- nginx + php-fpm service status
- HTTPS HEAD request to motorcade.vip

## 3) Diagnostics bundle (for troubleshooting)
```bash
sudo /usr/local/sbin/motorcade-diagnostics.sh
```
Creates a timestamped bundle under:
- `/var/log/motorcade/diagnostics/`

Includes:
- service status summaries
- nginx configs list
- recent nginx/php-fpm logs (bounded)
- basic disk/memory snapshot

## 4) Logrotate
Keeps `/var/log/motorcade/*.log` from growing forever.

## 5) Day-2 operator rules
- Don’t edit nginx live unless necessary.
- Use maintenance mode flag file for controlled downtime.
- Backups run daily (or manually) and are verified periodically.

## 6) End state
After Playbooks 15–18:
- you know what assets exist (15)
- you can back them up (16)
- you can restore them (17)
- you have a stable ops routine (18)
