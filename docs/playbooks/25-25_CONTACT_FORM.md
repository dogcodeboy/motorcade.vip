# 25 — Contact Form

## Purpose
Wire the lead-capture/contact surface so visitors can request a quote and you can receive/track inquiries.

> Current implementation: placeholder task + structure only.

## Expected behavior
- A visible CTA on the site to request a quote
- A Contact page with form fields (name, email, phone, service type, details)
- Submissions should either:
  - email the admin address, and/or
  - write into a DB table / CRM pipeline
- Anti-spam (honeypot + rate limiting + nonce)

## Run
From `~/Repos/motorcade.vip/ansible`:

```bash
ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/25_contact_form.yml
```

## Next implementation steps (when you’re ready)
- Choose the mechanism:
  - WP plugin (WPForms / Gravity / Contact Form 7) + SMTP
  - Custom lightweight plugin endpoint + SMTP
- Then update this playbook to install/configure the chosen path.
