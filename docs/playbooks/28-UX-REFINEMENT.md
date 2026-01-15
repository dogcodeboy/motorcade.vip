# Playbook 28 — UX & Psychological Alignment

**Playbook file:** `ansible/playbooks/28_ux_refinement.yml`

## Purpose
Playbook 27 proved the pipeline works (theme renders assets and sections). Playbook 28 refines the homepage so it communicates the *intended psychology*:

- Calm authority (not aggressive)
- Clear trust signals early
- Low cognitive load and deliberate visual rhythm
- Strong, professional conversion path (Request Coverage → Contact)

This is a **presentation-only polish pass**.

## What it changes
- Replaces `wp-content/themes/motorcade-trust/front-page.php` with a refined template (`front-page.ux.php`).
- Appends a managed CSS override block to `wp-content/themes/motorcade-trust/style.css`.

## What it does not change
- No nginx configuration
- No WordPress options/content changes
- No manual uploads
- No theme recreation

## Managed markers
In `style.css`, Playbook 28 appends:

- `/* BEGIN MOTORCADE_UX_POLISH */` … `/* END MOTORCADE_UX_POLISH */`

This makes rollback safe and idempotent.

## How to run
From the repo:

```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/28_ux_refinement.yml
```

## Verification checklist
1. Open homepage: `https://motorcade.vip`
2. Hero reads cleanly:
   - One headline hierarchy (no competing ghost text)
   - Subtitle readable on desktop + mobile
3. Trust row looks “credential-like”:
   - Even sizing and spacing
   - No broken icons
4. Services feel finished:
   - Card spacing and titles feel professional
   - Images crop cleanly
5. Page rhythm:
   - Sections have breathing room
   - No “black wall” fatigue

## Rollback
To rollback the CSS changes only, remove the block between:

- `/* BEGIN MOTORCADE_UX_POLISH */` … `/* END MOTORCADE_UX_POLISH */`

To rollback the homepage template, restore the backup created by Ansible when it copied `front-page.php`.

