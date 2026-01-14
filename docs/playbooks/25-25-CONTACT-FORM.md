# 25 — Contact / Lead Capture Wiring (Placeholder)

## Purpose
This playbook is currently a **stub** so the playbook numbering and repo structure stay consistent while the final contact/lead-capture implementation is decided.

Right now it **does not make site changes** beyond a debug message.

## What it will eventually do
Once implemented, this playbook should:

- Install/activate the chosen contact form plugin (or configure a custom endpoint)
- Create/update the Contact + Security Assessment forms
- Wire CTA buttons/links to the correct form routes
- Configure notification targets (email and/or webhook)
- Add spam protection (honeypot/recaptcha where appropriate)
- Ensure form submissions are stored (DB) and exported (email/CRM pipeline)

## Current behavior
- Runs facts gathering
- Prints a placeholder message:
  “Step 25 will wire the contact + security assessment form endpoints and CTA links.”

## Run
From the `ansible/` directory at repo root:

```bash
ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/25_contact_form.yml
```

## Next
When you’re ready to implement Step 25 for real, decide which path you want:

- **WP-native** (plugin like Fluent Forms / Gravity / Contact Form 7)
- **Headless endpoint** (FastAPI/NestJS API + WP frontend posts to API)
- **Hybrid** (WP form plugin -> webhook -> backend pipeline)

Then we replace the placeholder tasks with a real, idempotent install + config sequence.
