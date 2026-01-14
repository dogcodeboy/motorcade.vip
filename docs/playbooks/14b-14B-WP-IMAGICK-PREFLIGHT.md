# Playbook 14b — 14B WP IMAGICK PREFLIGHT

## Purpose
Preflight checks for Imagick/ImageMagick support.

## Ansible playbook
`ansible/playbooks/14b-wp-imagick-preflight.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/14b-wp-imagick-preflight.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
