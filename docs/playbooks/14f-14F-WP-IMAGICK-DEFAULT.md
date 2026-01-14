# Playbook 14f — 14F WP IMAGICK DEFAULT

## Purpose
Set imagick defaults used by WordPress/media.

## Ansible playbook
`ansible/playbooks/14f-wp-imagick-default.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/14f-wp-imagick-default.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
