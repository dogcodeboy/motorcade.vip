# Playbook 27 — Frontend Presentation Wiring

## Purpose
Make the live homepage visually match the approved Motorcade mockup by ensuring the active theme actually **references** the deployed assets.

Playbook 26 ensures nginx can serve files.  
Playbook 27 ensures the theme **uses** them.

## What it changes
Theme wiring (no theme recreation):
- Deploys a managed `front-page.php` that:
  - renders a hero with background image
  - renders service cards with images
  - renders trust/about section with image
  - renders CTA band with image
  - preserves editable WP page content via `the_content()`
- Injects a minimal, managed CSS block into `style.css` (`MOTORCADE_PRESENTATION`)
- Injects a managed footer block for the Texas DPS license line (`MOTORCADE_DPS_LICENSE`)

Assets:
- Copies all repo assets under `ansible/files/wp/uploads/motorcade/` to:
  - `/var/www/motorcade/wp-content/uploads/motorcade/`
- Includes the earlier prototype “phase1” kit under:
  - `/wp-content/uploads/motorcade/phase1/`

## Texas DPS License
This playbook prints the DPS license line from a WP option:
- option key: `motorcade_texas_dps_license`

Set it with:
```bash
sudo -u nginx wp --path=/var/www/motorcade option update motorcade_texas_dps_license "YOUR_DPS_NUMBER"
```

Or set `texas_dps_license` in the playbook vars / group_vars and rerun.

## Run
```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/27_frontend_presentation.yml
```

## Verify (visual)
Open:
- https://motorcade.vip

You should see:
- Hero background image
- Four trust badges under the hero text
- Three services cards with images
- Trust/About section image
- CTA background image
- DPS license line in footer (once option is set)

If images still don’t render visually but direct URLs work:
- check you’re on the correct theme (`motorcade-trust`)
- hard-refresh browser cache
- check homepage is using the “Front page” template (WP uses `front-page.php` automatically if present)
