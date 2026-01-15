# Checkpoint Overview — 2026-01-15

This checkpoint captures a **known-good recovery point** after a repo reset (GitKraken hard reset) and partial server drift.

## Why this checkpoint exists

- A follow-on session made changes that were **not reliably represented in the repo**.
- The repo was reset to a stable point.
- The server still had remnants of changes, so we’re re-establishing the intended state using Ansible (no manual edits).

## What we’re protecting

- **Ansible-only** management of WordPress, theme, and assets
- A trust-first UX direction (see `motorcade-chatGPT-Session.txt`)
- A stable baseline for Playbook 31 work (homepage psychological polish)
