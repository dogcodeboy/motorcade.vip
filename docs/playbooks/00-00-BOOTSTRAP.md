# Playbook 00 — 00 BOOTSTRAP

## Purpose
Bootstrap host access & base prerequisites (users/dirs/basics).

## Ansible playbook
`ansible/playbooks/00-bootstrap.yml`

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/00-bootstrap.yml
```

## Notes
- These docs are intentionally concise. The playbook itself is the source of truth for tasks.
- If a playbook changes production behavior, prefer running it in sequence using `14-all.yml` (where applicable).
