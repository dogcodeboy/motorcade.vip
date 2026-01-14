# Playbook 11 — 11 NGINX SSL

## Purpose
Provision SSL config / cert wiring and HTTPS vhost.

## Ansible playbook
`ansible/playbooks/11-nginx-ssl.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/11-nginx-ssl.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
