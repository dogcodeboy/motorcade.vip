# Repo Layout Notes — 2026-01-15

## Key directories

- Repo root: `motorcade.vip/`
- Ansible root (preferred): `motorcade.vip/ansible/`

## Current problem: nested ansible paths

A theme rsync operation introduced (or preserved) a nested structure:

- `ansible/files/themes/motorcade-trust/`

This is **not ideal** and causes confusion when running commands.

## Canonical target (next session)

Normalize to **one** canonical location, for example:

- `ansible/files/themes/motorcade-trust/`

…and remove/ignore the nested `ansible/ansible/ansible/` tree once the playbooks are updated.

## Why the theme appeared “missing” in repo

Historically, the repo carried the theme as a packaged zip:

- `ansible/files/wp/themes/motorcade-trust-theme.zip`

So the theme *was* repo-managed, but not as an extracted directory.
