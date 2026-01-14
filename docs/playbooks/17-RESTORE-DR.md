# PLAYBOOK 17 — RESTORE & DISASTER RECOVERY (DR)
**Project:** motorcade.vip (AWS / Amazon Linux 2023)
**Goal:** Make restores predictable and testable.

## 1) What this playbook creates
### On the server
- Restore helper script: `/usr/local/sbin/motorcade-restore.sh`
- Restore test workspace: `/var/tmp/motorcade-restore-test/`
- Restore logs: `/var/log/motorcade/restore/`

### In the repo
- Ansible playbook: `ansible/playbooks/17_restore_dr.yml`

## 2) Restore philosophy
- **Never** restore directly into production paths without verification.
- First restore into a **staging directory**, validate contents, then do a controlled swap.
- DB restore is the most sensitive step — validate target DB name before importing.

## 3) Preconditions
- Backups exist from Playbook 16.
- You know the target backup folder, e.g.:
  - `/var/backups/motorcade/2026/01/13/`

## 4) Run (Ansible)
From repo root:
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/17_restore_dr.yml
```

## 5) How to run a safe restore test (no production changes)
Example:
```bash
sudo /usr/local/sbin/motorcade-restore.sh \
  --backup-dir /var/backups/motorcade/2026/01/13 \
  --mode test

sudo ls -la /var/tmp/motorcade-restore-test | head
```

## 6) How to do a controlled production restore (only when needed)
**Warning:** this can overwrite live content.

```bash
sudo /usr/local/sbin/motorcade-restore.sh \
  --backup-dir /var/backups/motorcade/2026/01/13 \
  --mode apply
```

The script will:
- verify required files exist
- stage extract archives
- (optional) restore DB dump if you confirm the target DB name matches
- only then copy files into place

## 7) Next
➡ **Playbook 18 — Ops Handoff & Day-2 Runbook**
