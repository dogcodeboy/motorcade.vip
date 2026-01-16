# Playbook 36 (v2) — Homepage Render Assets + DPS License Footer

This package fixes the issues you saw (annotated placeholder images showing on the live site and duplicate/placeholder DPS license text) and makes the homepage match the approved render.

## What this changes
- Replaces the **hero + section images** with the *clean* (non-annotated) assets.
- Overwrites `front-page.php` with a render-matched, responsive layout.
- Injects a managed CSS block into `style.css` to match spacing, overlays, and card behavior.
- Fixes the footer license so **every page** shows:
  - `Texas DPS License: B31011701`
  - Removes the placeholder `ADD_LICENSE_IN_WP_ADMIN` text and stops duplication.

## Files installed on the server
- Theme assets → `wp-content/themes/motorcade-trust/assets/homepage/*`
- Front page template → `wp-content/themes/motorcade-trust/front-page.php`
- Theme CSS override (managed block) → `wp-content/themes/motorcade-trust/style.css`
- Footer patch → `wp-content/themes/motorcade-trust/footer.php`

Backups are created alongside each file with `.bak.<timestamp>`.

## How to deploy
1. **Unzip this package into your repo root** (`motorcade.vip/`). It contains paths that line up with the repo.
2. Run:

```bash
cd ~/Repos/motorcade.vip
ansible-playbook \
  -i ansible/inventories/prod/hosts.ini \
  ansible/playbooks/36_homepage_render_assets_and_footer_license.yml \
  --ask-vault-pass
```

## Quick verification checklist
- Home hero shows a clean photo (no "Header Hero (1)" text overlay)
- The three service cards have **cropped images** and consistent height (no giant icon strip)
- Footer shows **exactly one** license line:
  - `Texas DPS License: B31011701`

