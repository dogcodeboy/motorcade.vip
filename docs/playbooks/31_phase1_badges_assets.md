# Playbook 31 — Phase 1 Badge SVG Assets

## What this fixes
The homepage "trust" feature cards use SVG icons. The theme references them by direct URL under WordPress uploads.
If the SVG files aren’t present on the server, the icons render as broken images.

## Theme-expected filenames
The theme expects these exact files:
- `licensed-insured.svg`
- `background-checked.svg`
- `rapid-response.svg`

## Server path
These files must exist on the web server at:
`/var/www/motorcade/wp-content/uploads/motorcade/phase1/badges/svg/`

## How to run
From the repo:
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/31_phase1_badges_assets.yml
```

## Notes
This playbook **does not** upload anything via wp-admin, and it does not depend on WordPress Media Library. It simply restores the files at the paths the theme expects.
