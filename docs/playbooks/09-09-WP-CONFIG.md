# Playbook 09 — 09 WP CONFIG

## Purpose
Create/update wp-config.php and related configuration.

## Ansible playbook
`ansible/playbooks/09-wp-config.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/09-wp-config.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
