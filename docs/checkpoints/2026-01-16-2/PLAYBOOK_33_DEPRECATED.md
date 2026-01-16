# Playbook 33 — DEPRECATED

Playbook 33 replaced `front-page.php` with a custom template that made assumptions about theme hooks and asset filenames.
This caused homepage layout/asset regressions (overlapping hero elements, broken service cards).

Status:
- **DEPRECATED** — Do not re-run.
- Rolled back by: **Playbook 34**
- Canonical safe replacement: **Playbook 35** (SAFE: minimal text replacements + CSS override block)

Use Instead:
- `ansible/playbooks/35_homepage_first_page_polish_safe.yml`
