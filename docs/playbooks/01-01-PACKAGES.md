# Playbook 01 — 01 PACKAGES

## Purpose
Install baseline packages needed for the stack.

## Ansible playbook
`ansible/playbooks/01-packages.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/01-packages.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
