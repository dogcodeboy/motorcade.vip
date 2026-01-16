# Playbook 35 — Homepage First-Page Polish (SAFE)

Why:
PB33 broke the site by replacing `front-page.php` with assumptions about assets and layout. Rollback (PB34) restored stability.

What PB35 does (safe approach):
- **Does not replace templates**
- Performs minimal **string replacements** on the existing, working `front-page.php`:
  - "Request Coverage" → "Talk to Security"
  - "Explore Services" / "View Services" → "What We Handle"
  - "Start Request" → "Start a conversation"
  - "Talk to Dispatch" → "Talk to Security"
- Adds minimal CSS overrides via managed `blockinfile` marker in `style.css`

Constraints honored:
- No wp-admin edits
- Repo-managed + Ansible-applied only
- Scope limited to homepage first-page polish

Run:
ansible-playbook -i ansible/inventories/prod/hosts.ini ansible/playbooks/35_homepage_first_page_polish_safe.yml --ask-vault-pass

Rollback:
Remove PB35 CSS block by setting blockinfile state=absent using the marker `MOTORCADE_HOME_FIRST_PAGE_POLISH_PB35`.
Template changes are simple text replacements; restore from theme file backups if needed.
