# Playbook 04 — 04 PHP TEST

## Purpose
Deploy a temporary PHP test endpoint to validate PHP-FPM wiring.

## Ansible playbook
`ansible/playbooks/04-php-test.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/04-php-test.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
