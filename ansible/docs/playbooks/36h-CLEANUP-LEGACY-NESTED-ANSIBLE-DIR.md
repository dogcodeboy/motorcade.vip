# Playbook 36h — Cleanup legacy nested ansible directory

## Why this exists
At some point a zip was unzipped into the repo root and created an **accidental** tree:

- `ansible/ansible/ansible/...`

This makes playbooks search for files in the wrong place and causes confusing “3 nested folders deep” issues.

## What this does
Deletes **only**:
- `ansible/ansible/`

It does **not** touch:
- `ansible/files/` (canonical)
- `ansible/playbooks/`

## Run
From repo root:
```bash
cd ansible
ansible-playbook playbooks/36h_cleanup_legacy_nested_ansible_dir.yml
```

## After
Commit the deletions:
- `git status`
- commit message suggestion: `chore(ansible): remove legacy nested ansible directory`
