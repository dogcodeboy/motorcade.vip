# Playbook 28b — Light + Responsive Layout Polish

## Purpose
Bring the homepage in line with the intended UX:
- **Mostly white** layout with **dark accents**
- Clean, calm authority (trust-first)
- Fully **responsive** layout (no overlap on resize)

This playbook is a presentation-only refinement. It does not modify WordPress content in the admin UI.

## What it changes
- Deploys a refined theme front page template:
  - `wp-content/themes/motorcade-trust/front-page.php`
- Injects (and replaces) a managed CSS override block into:
  - `wp-content/themes/motorcade-trust/style.css`

## Files (repo)
- `ansible/playbooks/28b_light_responsive_polish.yml`
- `ansible/files/theme/patches/front-page.ux.light.php`
- `ansible/files/theme/patches/ux-polish-light.css`

## Run
From `~/Repos/motorcade.vip/ansible`:

```bash
ansible-playbook -i inventories/prod/hosts.ini playbooks/28b_light_responsive_polish.yml
```

## Expected result
- Hero remains controlled/dark (professional) but the page below is **white**
- Trust row becomes a clean **white credibility band**
- Services cards become readable and clean
- Layout adapts on browser resize (no overlap)

## Rollback
Re-run the previous playbook that deployed the prior front page (27/28),
or restore from your checkpoint/manifest process.
