# Playbook 21 — Content & Presentation Polish (Overwrite Page Content)

## Purpose
Converts the site from raw markdown-like text into properly formatted WordPress-rendered HTML by overwriting the core page contents with styled, theme-friendly HTML.

## What it does
- Uploads formatted content files from `ansible/files/wp/content/` to `/tmp/motorcade-wp-content/`
- Uses WP-CLI to overwrite `post_content` for:
  - home, services, executive-protection, about, contact, security-assessment

## Run
```bash
cd ansible
ansible-playbook playbooks/21_content_polish.yml
```

## Notes
- This is intentionally an overwrite playbook to replace the raw “# heading” artifacts.
- No plugins and no page builders.
