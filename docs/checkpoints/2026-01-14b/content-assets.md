# Content & Assets (as of 2026-01-14b)

Repo asset source of truth:
- `assets/images/motorcade/*`

Ansible deployment source (used by Playbook 24):
- `ansible/files/wp/uploads/motorcade/*`

Remote destination:
- `/var/www/motorcade/wp-content/uploads/motorcade/*`

Notes:
- Playbook 24 previously copied from an empty directory (only `.gitkeep`).
  This checkpoint populates the directory so Playbook 24 and future ops are consistent.
