# Playbook 13 — 13 WP LIMITS

## Purpose
Tune PHP/WP limits (upload size, memory, timeouts).

## Ansible playbook
`ansible/playbooks/13-wp-limits.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/13-wp-limits.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
