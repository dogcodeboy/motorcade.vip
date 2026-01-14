# Playbook 14g — 14G MAINTENANCE SITE

## Purpose
Enable nginx maintenance mode / maintenance page wiring.

## Ansible playbook
`ansible/playbooks/14g-maintenance-site.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/14g-maintenance-site.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
