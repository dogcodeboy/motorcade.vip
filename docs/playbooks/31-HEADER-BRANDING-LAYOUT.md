# Playbook 31 — Header and Branding Layout Consolidation (motorcade-trust)

## What this playbook does
This playbook appends scoped, non-destructive CSS to the active theme stylesheet:

- Server path: `/var/www/motorcade/wp-content/themes/motorcade-trust/style.css`
- Method: `blockinfile` with clear markers

The CSS targets the **actual rendered header DOM** (observed via `curl`) including `.mc-header`, `.mc-nav`, and `.mc-ctas`.

## Psychology-first header decision
To maximize trust and attract higher-quality inbound business, the header should present **one primary action**.

This playbook hides the secondary header CTA:
- `.mc-header .mc-ctas .mc-btn-ghost` ("Request an Assessment")

The remaining CTA ("Talk to Security") stays as the single primary header action.

## How to run
From repo root:

```bash
ansible-playbook -i ansible/inventories/prod/hosts.ini ansible/playbooks/31_header_branding_layout.yml --ask-vault-pass
```

## Verification
On the server:

```bash
sudo grep -n "MOTORCADE PLAYBOOK 31 HEADER CTA CLEANUP" /var/www/motorcade/wp-content/themes/motorcade-trust/style.css | head
```
