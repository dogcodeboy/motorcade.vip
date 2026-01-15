# Playbook 29 — Brand & Logo Integration

## Purpose
Add clear Motorcade branding (logo + name) to the site header in a **psychology-first** way:
- Immediate legitimacy / authority cue (brand mark visible above the fold)
- Calm, professional feel (mostly white header with dark accents)
- Responsive behavior (logo-only on tight mobile widths)

## What it changes
- Copies `motorcade-logo.png` into the active theme at:
  `/var/www/motorcade/wp-content/themes/motorcade-trust/assets/img/motorcade-logo.png`
- Injects a managed branding block into `header.php`
  - Uses WordPress **Custom Logo** if set
  - Falls back to the theme asset logo (never breaks if WP option changes)
- Injects a small managed CSS block into `style.css` for alignment + sizing
- If `wp-cli` is available:
  - Imports the logo into Media Library (if not already present)
  - Sets it as the WordPress Custom Logo via `theme mod set custom_logo`

## Run
From `ansible/`:
```bash
ansible-playbook -i inventories/prod/hosts.ini playbooks/29_brand_logo.yml
```

## Verify
- Visit: `https://motorcade.vip`
- Header should display the Motorcade logo (and name on desktop/tablet)
- On small mobile widths, the header should show the logo only to prevent crowding.

## Rollback
Re-run with a revert commit, or remove the managed blocks:
- In `header.php`: `<!-- BEGIN MOTORCADE_BRAND_HEADER -->` ... `<!-- END MOTORCADE_BRAND_HEADER -->`
- In `style.css`: `/* BEGIN MOTORCADE_BRANDING_CSS */` ... `/* END MOTORCADE_BRANDING_CSS */`
