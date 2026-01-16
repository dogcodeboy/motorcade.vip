# Playbook 34 — Rollback Homepage First-Page Polish (PB33)

Reason:
PB33 introduced front-page and CSS changes that caused layout/asset regressions (overlapping badges/panel, broken service card images, and visual corruption).

What this playbook does:
- Restores `front-page.php` from the newest Ansible-created backup (`front-page.php.<timestamp>`)
- Removes the PB33 managed CSS block from `style.css`
- Reloads PHP-FPM

Constraints honored:
- No wp-admin edits
- Repo-managed + Ansible-applied only
- One playbook (rollback) to re-stabilize site

Run:
ansible-playbook -i ansible/inventories/prod/hosts.ini ansible/playbooks/34_rollback_homepage_first_page_polish.yml --ask-vault-pass

Expected:
Homepage returns to pre-PB33 stable state.
