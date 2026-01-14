# Playbook 10 — 10 WP CORE INSTALL

## Purpose
Run WP core install steps (site URL, admin user, initial setup).

## Ansible playbook
`ansible/playbooks/10-wp-core-install.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/10-wp-core-install.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
