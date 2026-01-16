# Playbook 33 — Homepage First-Page Psychological Polish

Purpose:
Polish only the first visible page of the homepage to align with trust-first, conversation-led psychology.

Key Outcomes:
- Hero primary CTA set to: **Talk to Security**
- Hero secondary CTA set to: **What We Handle**
- Trust indicators reframed as assumptions (Licensed & insured / Vetted personnel / Escalation-ready)
- Assessment panel de-emphasized (copy softened + ghost button)

Constraints:
- No header/nav changes
- No new sections
- No layout experimentation
- Repo-managed + Ansible applied only

Apply:
ansible-playbook -i ansible/inventories/prod/hosts.ini ansible/playbooks/33_homepage_first_page_polish.yml --ask-vault-pass

Status:
Ready.
