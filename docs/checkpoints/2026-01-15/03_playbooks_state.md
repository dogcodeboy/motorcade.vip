# Playbooks State — 2026-01-15

## Important: exact filenames

The repo uses underscores in playbook names.

Working files:

- `playbooks/29_brand_logo.yml`
- `playbooks/30_branding_logo_toggle.yml`
- `playbooks/31_homepage_trust_polish.yml`

## Correct command pattern

Run from the **preferred Ansible root**:

```bash
cd /home/codeboy/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/29_brand_logo.yml
ansible-playbook -i inventories/prod/hosts.ini playbooks/30_branding_logo_toggle.yml
```

## Avoid this common failure

Commands like these will fail in the current repo:

- `ansible-playbook ... playbooks/29-*.yml`
- `ansible-playbook ... playbooks/29-branding-assets.yml`

Because those filenames do not exist.
