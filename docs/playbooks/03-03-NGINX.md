# Playbook 03 — 03 NGINX

## Purpose
Install/configure nginx baseline and vhost includes.

## Ansible playbook
`ansible/playbooks/03-nginx.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/03-nginx.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
