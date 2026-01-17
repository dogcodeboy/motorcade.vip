# Playbook 36g — Header logo sizing + dark-section contrast + DPS footer

## What this does
- Prevents the **header logo** from ever rendering huge (forces max-height + keeps it within the header row).
- Fixes **text contrast** in the “Built for real‑world risk” dark section (and its cards) so copy is readable.
- Injects your **Texas DPS license number** into the footer (legal requirement).

## Required config (one-time)
Set your DPS number in **one** of these locations:

### Option A (recommended): group_vars
Edit:
- `ansible/group_vars/motorcade/main.yml`

Add:
```yml
# Texas DPS Private Security License Number (required for footer)
dps_license_number: "B31011701"
```

### Option B: inventory group_vars
Edit:
- `ansible/inventories/prod/group_vars/all.yml`

Add the same key/value.

## Run
From repo root:
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/36g_header_logo_footer_dps_contrast.yml \
  --private-key ~/.ssh/motorcade-key.pem
```

## If you see “no hosts matched”
Your inventory group is `motorcade_web` (underscore), not `motorcade-web` (dash).
This playbook already targets `motorcade_web`, so that warning should go away.

