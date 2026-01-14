# Playbook 12 — 12 WP FILESYSTEM

## Purpose
Set WP filesystem permissions/ownership (wp-content, uploads, etc.).

## Ansible playbook
`ansible/playbooks/12-wp-filesystem.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/12-wp-filesystem.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
