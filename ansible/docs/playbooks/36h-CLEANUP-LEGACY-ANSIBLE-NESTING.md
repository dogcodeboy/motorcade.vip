# Playbook 36h — Cleanup legacy ansible/ansible nesting (controller-side)

## Why this exists
At some point earlier, a zip was extracted from inside `ansible/`, which created an accidental nested path:

- `ansible/ansible/ansible/files/...`

This breaks playbooks that expect controller files at:

- `ansible/files/...`

## What it does
Deletes the **local** `ansible/ansible` directory tree. It does **not** touch the server.

## Run
From repo root:
```bash
cd ansible
ansible-playbook playbooks/36h_cleanup_legacy_ansible_nesting.yml
```
