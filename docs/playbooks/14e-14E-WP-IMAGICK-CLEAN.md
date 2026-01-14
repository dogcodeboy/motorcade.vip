# Playbook 14e — 14E WP IMAGICK CLEAN

## Purpose
Clean up/normalize imagick config after install.

## Ansible playbook
`ansible/playbooks/14e-wp-imagick-clean.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/14e-wp-imagick-clean.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
