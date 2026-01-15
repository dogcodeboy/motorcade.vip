# Theme Vendoring Normalization — 2026-01-15

## Problem
During recovery, an rsync/copy operation introduced an accidental nested path:

- `ansible/ansible/ansible/files/themes/motorcade-trust/`

This confused local repo operations and made it unclear where the theme "source of truth" lives.

## Canonical target
The extracted theme should live at:

- `ansible/files/themes/motorcade-trust/`

## Cleanup rule
After the canonical path exists and is committed:

- Delete `ansible/ansible/ansible/files/themes/motorcade-trust/`
- Prefer deleting `ansible/ansible/` entirely if it contains no other needed files.

## Why keep an extracted theme directory at all?
We already have the theme zip at:

- `ansible/files/wp/themes/motorcade-trust-theme.zip`

Keeping an extracted copy in a clean canonical location makes it easier to:
- review diffs
- do targeted file-level patches when needed
- confirm expected theme files for server reconciliation

The zip remains the recommended packaging format for installation.
