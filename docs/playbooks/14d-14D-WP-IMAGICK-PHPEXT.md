# Playbook 14d — 14D WP IMAGICK PHPEXT

## Purpose
Install/enable PHP imagick extension.

## Ansible playbook
`ansible/playbooks/14d-wp-imagick-phpext.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/14d-wp-imagick-phpext.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
