# Inventory (Example)

This is a sanitized example inventory. Copy this folder to `prod/` (or another name)
and replace the hostnames/IPs, SSH user, and any group names to match your AWS setup.

Run playbooks from the `ansible/` directory, e.g.:

```bash
cd ansible
ansible-playbook playbooks/00-bootstrap.yml
```

If you use a different inventory path:

```bash
ansible-playbook -i inventories/prod/hosts.ini playbooks/00-bootstrap.yml
```
