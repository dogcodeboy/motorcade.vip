# Playbook 37 — Header Logo Lockdown + Live Theme Backup

**Goal:** make the header logo _unstoppable_ (defensive overrides) and create a server‑side backup of the live theme once the patch is applied.

This playbook is intended to prevent regressions introduced by later styling/image playbooks (e.g., an overly broad `.mc-brandbar + .mc-brand { display: none !important; }` rule that can hide the header brand container including the logo).

## What it changes

- **Backs up** theme files:
  - `.../motorcade-trust/style.css`
  - `.../motorcade-trust/header.php`
- **Removes / neutralizes** known risky selector patterns that can hide the header logo.
- **Appends a defensive CSS block** (marked `MC PATCH 37`) that:
  - forces `.custom-logo-link` and logo `<img>` to be visible
  - forces the brand container to remain visible
  - optionally adds a subtle header bottom border for “framing”
- **Creates a server-side backup** tarball of the live theme in:
  - `/home/ec2-user/backups/motorcade/motorcade-trust.<timestamp>.tar.gz`

## Run

From repo **ansible/** directory:

```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/37_header_logo_lockdown.yml --ask-vault-pass
```

## Verify

1. Hard refresh: **Ctrl+Shift+R**
2. Confirm logo is visible in the header across:
   - Desktop + mobile
   - Light/Dark (if applicable)

If the logo still does not appear after this playbook:
- The issue is almost certainly **markup not present** in `header.php` or the logo URL is wrong.
  - Run Playbook **36p5** (header markup fix) first, then rerun this Playbook 37.

## Notes

- This playbook is intentionally **defensive**: it favors visibility and brand consistency over theme defaults.
- If you later rework header layout, keep the `MC PATCH 37` block but adjust its selectors rather than removing it.
