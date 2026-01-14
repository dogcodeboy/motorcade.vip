# Playbook 08 — 08 WORDPRESS INSTALL

## Purpose
Lay down WordPress files and initial directory structure.

## Ansible playbook
`ansible/playbooks/08-wordpress-install.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/08-wordpress-install.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
