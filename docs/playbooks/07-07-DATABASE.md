# Playbook 07 — 07 DATABASE

## Purpose
Create WordPress database and user grants.

## Ansible playbook
`ansible/playbooks/07-database.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/07-database.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
