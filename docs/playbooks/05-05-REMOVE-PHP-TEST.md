# Playbook 05 — 05 REMOVE PHP TEST

## Purpose
Remove the temporary PHP test endpoint after validation.

## Ansible playbook
`ansible/playbooks/05-remove-php-test.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/05-remove-php-test.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
