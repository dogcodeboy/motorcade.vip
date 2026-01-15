# Playbook 30 — Branding: Logo assets + Customizer toggle

**Purpose:** Ensure Motorcade branding is visible (logo + name) and give you a **Customizer toggle** to switch between a **badge** (shield) and a **wordmark** style.

## What it does
- Uploads branding PNGs from the repo into `wp-content/uploads/motorcade/branding/`
- Registers Customizer controls under **Appearance → Customize → Motorcade Branding**
- Adds a **Brand Bar** via `wp_body_open` so branding is visible even if the theme header does not render the WordPress Custom Logo
- Adds Ansible-managed CSS to size the logo properly on the top bar and keep things clean

## Run
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/30_branding_logo_toggle.yml
```

## Verify
1. Visit: https://motorcade.vip
2. You should see a **white brand bar** at the top with the Motorcade logo and company name.
3. WP Admin → **Appearance → Customize → Motorcade Branding**
   - Switch **Logo style** (Badge ↔ Wordmark)
   - Toggle **Show Brand Bar** if desired

## Notes
- All changes are wrapped in Ansible markers in `functions.php` and `style.css`.
- If you later replace the PNGs, rerun this playbook to redeploy and keep defaults aligned.
