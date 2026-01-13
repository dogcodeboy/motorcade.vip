# Ansible (Motorcade)

This folder contains the infrastructure and WordPress provisioning playbooks.

## Quick start

1) Copy the example inventory:

```bash
cp -r inventories/prod.example inventories/prod
```

2) Edit `inventories/prod/hosts.ini` with your AWS host(s).

3) Install collections/roles (if used):

```bash
ansible-galaxy install -r requirements.yml
```

4) Run playbooks from this directory:

```bash
ansible-playbook playbooks/00-bootstrap.yml
```

## Secrets

- Commit encrypted vault files (e.g. `group_vars/**/vault.yml`) only.
- Never commit vault passwords or private keys.
