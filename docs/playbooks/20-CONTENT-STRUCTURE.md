# Playbook 20 — Content & Structure

This playbook creates a **client-ready baseline** for motorcade.vip by injecting WordPress pages and wiring navigation using **WP-CLI**.

## What it does

- Ensures these pages exist (by slug):
  - `home` (front page)
  - `services`
  - `executive-protection`
  - `about`
  - `contact`
  - `security-assessment` (created for CTAs; not in top nav yet)

- Creates a primary menu named `primary`
- Adds Home/Services/Executive Protection/About/Contact to the menu
- Attempts to assign the menu to the theme’s primary menu location (if available)
- Sets WordPress front page to **Home**
- Does **not** change infrastructure, nginx, PHP, or WordPress core.

## Files added by this playbook

- `ansible/playbooks/20_content_structure.yml`
- `ansible/files/wp/content/*.md`
- `docs/playbooks/20-CONTENT-STRUCTURE.md`

## How to run

From the repo root:

```bash
cd ansible
ansible-playbook playbooks/20_content_structure.yml
```

### Optional: overwrite content on every run

By default, the playbook **creates missing pages** but does **not overwrite** content if you later edit pages in WP Admin.

To force content overwrite:

```bash
cd ansible
ansible-playbook playbooks/20_content_structure.yml -e force_content=true
```

## Notes / guardrails

- No backups are enabled (by design).
- No assets are deployed here.
- This is the first “presentation layer” automation pass—content can be refined later without touching infra.
