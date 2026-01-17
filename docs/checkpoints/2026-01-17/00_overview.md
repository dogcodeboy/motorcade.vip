# Checkpoint Overview — 2026-01-17

## Why this checkpoint exists

A regression re-occurred after later styling/image playbooks: the header logo stopped rendering even though the logo markup and asset URLs were still present.

This checkpoint captures:
- the **working fix** applied via Ansible (Playbook 37c)
- the **server-side backup artifact** created immediately after the fix
- an updated repo reference (playbook + docs + README links)

## What this checkpoint protects

- Single authoritative logo render path (header only)
- No Site Identity bar
- No duplicate logos
- Defensive CSS so future patches cannot hide/collapse the logo container
