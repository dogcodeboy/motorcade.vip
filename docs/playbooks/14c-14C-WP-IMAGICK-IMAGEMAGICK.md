# Playbook 14c — 14C WP IMAGICK IMAGEMAGICK

## Purpose
Install ImageMagick system packages.

## Ansible playbook
`ansible/playbooks/14c-wp-imagick-imagemagick.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/14c-wp-imagick-imagemagick.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
