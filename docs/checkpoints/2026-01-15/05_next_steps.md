# Next Steps — 2026-01-15

## A) Audit first (small scope)

1. Confirm which directory you are in when running Ansible.
2. Confirm playbook filenames exist.
3. Confirm where the theme files live in the repo.

## B) Normalize theme source-of-truth

Move theme files to a canonical location (recommended):

- `ansible/files/themes/motorcade-trust/`

Then update any playbooks that reference the theme path.

## C) Re-run branding playbooks

Once normalized:

- Run `29_brand_logo.yml`
- Run `30_branding_logo_toggle.yml`

## D) Start Playbook 31 (Trust polish)

Target outcomes:

- lighter hero
- more breathing room
- stronger hierarchy
- responsive spacing
- keep site fast
