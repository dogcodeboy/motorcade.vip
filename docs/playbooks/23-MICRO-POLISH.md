# Playbook 23 — Micro Polish (Final Menu Fix)

## What this fixes
Your header menu exists, but its **menu NAME** is `primary` (lowercase).
Earlier playbook variants assumed the menu name was `Primary`, which caused failures.

This version:
- Looks up the menu ID by name: `primary`
- Clears duplicate items safely
- Re-adds the normalized menu items
- Assigns the menu to theme location `primary`
- Does **not** attempt to create menus (no conflicts)

## Run
```bash
cd ansible
ansible-playbook playbooks/23_micro_polish.yml
```

## Verify
WP Admin → Appearance → Menus:
- Menu name: `primary`
- Items: Home, Services, Executive Protection, About, Contact (each once)
