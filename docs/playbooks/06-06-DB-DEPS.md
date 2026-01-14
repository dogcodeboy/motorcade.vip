# Playbook 06 — 06 DB DEPS

## Purpose
Install database client/server dependencies (MariaDB/MySQL bits used by WP).

## Ansible playbook
`ansible/playbooks/06-db-deps.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/06-db-deps.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
