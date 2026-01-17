# Playbook 36g — Header logo sizing + dark-section contrast + DPS footer

## What this fixes
- Prevents the header logo/wordmark (and any hero icons) from “exploding” in size due to CSS regressions.
- Restores readable text contrast in the **“Built for real-world risk”** dark section.
- Injects the required **Texas DPS Private Security license number** into the site footer.

## Required variable (legal requirement)
Set this **before running**:

- File: `ansible/group_vars/motorcade/main.yml`
- Add:

```yaml
dps_license_number: "B31011701"
```

(If you prefer per-environment, you can set it under `ansible/inventories/prod/group_vars/all.yml` instead.)

## Run
From repo root:

```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/36g_header_logo_footer_dps_contrast.yml \
  --private-key ~/.ssh/motorcade-key.pem
```

## Verify
- Homepage loads normally
- Hero icons are not oversized
- Dark “Built for real-world risk” section text is readable
- Footer shows: `Texas DPS Private Security License: ...`

## Rollback
The playbook creates timestamped backups next to the live files:
- `style.css.bak.<date>-<time>`
- `footer.php.bak.<date>-<time>`

Restore by copying a backup back into place.
