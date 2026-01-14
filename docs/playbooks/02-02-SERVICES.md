# Playbook 02 — 02 SERVICES

## Purpose
Enable/start core services (nginx/php-fpm/etc.) and firewall basics if used.

## Ansible playbook
`ansible/playbooks/02-services.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/02-services.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
