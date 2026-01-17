# Playbook 36h — Cleanup legacy nested ansible/ansible/ansible directory

## Why this exists
At some point a ZIP was extracted into the repo with an extra `ansible/` prefix, which created:

- `repo/ansible/ansible/ansible/files/themes/...`

That **looks like 3 nested folders** (and it’s confusing), and it caused playbooks to search for files in the wrong place.

## What this playbook does
- If `ansible/ansible` exists, it renames it to an archived folder with a timestamp:
  - `ansible/_archived_ansible_nested_<timestamp>/...`
- It does **not** delete anything.

## Run it
From repo root:

```bash
cd ansible
ansible-playbook playbooks/36h_cleanup_legacy_nested_ansible_dir.yml
```

After this, the canonical theme files should live under:

- `ansible/files/themes/motorcade-trust/`

…and playbooks should reference `files/themes/...` (not `ansible/files/...`).
