# Playbook 14a — 14A PHP BASELINE

## Purpose
Stabilize PHP baseline settings for production.

## Ansible playbook
`ansible/playbooks/14a-php-baseline.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/14a-php-baseline.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
