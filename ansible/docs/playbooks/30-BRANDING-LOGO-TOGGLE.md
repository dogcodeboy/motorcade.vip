# Playbook 30 — Branding: Logo Toggle in Theme Customizer

## What this does
Adds a **Theme Customizer** section: **Appearance → Customize → Motorcade Branding**, letting you:

- Upload a **Primary logo** (badge/shield)
- Upload an optional **Secondary logo** (wordmark)
- Toggle the header display:
  - **Badge only**
  - **Badge + wordmark**
- Adjust logo height (px)

It renders a lightweight, white **brand bar** at the top of the site (trust-forward, high readability) without requiring template rewrites.

## Why this matters (psychology)
Security buyers scan for identity cues fast. A consistent badge/wordmark in the header:

- anchors brand recognition on every page
- increases perceived legitimacy ("real company" signal)
- reduces cognitive load when evaluating credibility

The default bar is intentionally **white with subtle borders**—it reads as clean and professional, with dark accents reserved for CTAs.

## Files added by this playbook
- `ansible/playbooks/30_branding_logo_toggle.yml`

## How to run
From `ansible/`:

```bash
ansible-playbook -i inventories/prod/hosts.ini playbooks/30_branding_logo_toggle.yml
```

## After running
1. In WordPress Admin:
   - **Appearance → Customize → Motorcade Branding**
2. Upload:
   - Primary: your shield/badge
   - Secondary (optional): your wordmark
3. Toggle between modes and publish.

## Notes
- If you upload only a primary logo, the toggle still works (secondary just won’t display).
- If neither image is configured yet, the bar safely falls back to the site name so the header never looks blank.
