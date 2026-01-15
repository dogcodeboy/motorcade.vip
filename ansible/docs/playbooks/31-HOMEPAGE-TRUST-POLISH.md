# Playbook 31 — Homepage Trust & Psychological Polish (Phase 1)

This playbook begins Playbook 31 by fixing two high-visibility trust breakers that were identified after Playbook 30:

1) **Site Icon (favicon / app icon)** was not set to Motorcade branding (still default / incorrect).  
2) **Header wordmark / logo** was not being used by the theme header because `has_custom_logo()` remained false.

## Constraints

- No wp-admin changes
- No manual uploads
- Repo-managed + Ansible-applied only

## What this playbook does (Phase 1)

- Copies the canonical repo branding assets to:
  - `/wp-content/uploads/motorcade/branding/`
- Ensures the assets exist in the **Media Library** (wp-cli import if missing)
- Sets:
  - `custom_logo` theme mod → `motorcade-header-logo.png`
  - `site_icon` option → `motorcade-badge-256.png`

Result: WordPress header will render the correct logo via `the_custom_logo()` and the browser tab/site icon will be correct.

## Files Added

- `ansible/playbooks/31_homepage_trust_polish.yml`
- `docs/playbooks/31-HOMEPAGE-TRUST-POLISH.md`
- `ansible/docs/playbooks/31-HOMEPAGE-TRUST-POLISH.md`

## Run

From `ansible/`:

```bash
ansible-playbook -i inventory/hosts.yml playbooks/31_homepage_trust_polish.yml
```

## Notes

- This is **Phase 1** only: brand icon + header logo correctness.
- The broader homepage spacing / lightness / hierarchy work will continue in subsequent Playbook 31 increments.


## Branding assets

This playbook expects repo-managed branding assets at:
`ansible/files/wp/assets/images/motorcade/branding/`

It will copy them into WordPress uploads and (via wp-cli) set:
- Custom header logo (theme_mod `custom_logo`)
- Site Icon (option `site_icon`)
