# Ansible Playbooks

This repo uses Ansible as the deployment authority.

## Running (baseline)

From the repo root:

```bash
cd ansible
ansible-playbook playbooks/00-bootstrap.yml
```

To run the full baseline sequence (00–14f), use your existing orchestration
playbook (e.g. `14-all.yml`) or run sequentially per your checklist.

## Inventory

A sanitized example inventory is in:

`ansible/inventories/prod.example/`

Copy it to `ansible/inventories/prod/` and update host/IP/user.

## Secrets

Secrets must be stored in Ansible Vault (encrypted `vault.yml`).
Never commit vault passwords or private keys.
