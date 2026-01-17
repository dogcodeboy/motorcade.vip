# Next Steps (start here next session)

## 1) Fix the header logo (without breaking the site)
Current problem: the header logo area is blank.

### Critical guardrails
- **Do not overwrite full theme files** unless you are restoring from a known-good backup.
- Always create (or confirm) a server-side theme tar.gz backup before touching `header.php`/`functions.php`/`style.css`.

### What likely went wrong in the last run
The last playbook attempt showed:
- `skipping: no hosts matched` and/or `Could not match supplied host pattern` warnings.
- Inventory groups include `[motorcade_web]` but some commands referenced `motorcade-web` (dash vs underscore). Use the group name that exists.

### Recommended next-session run pattern
From the repo root:
```bash
cd ~/Repos/motorcade.vip
unzip -o ~/Downloads/<ZIP_NAME_FROM_NEXT_SESSION>.zip
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/<PLAYBOOK>.yml \
  --private-key ~/.ssh/motorcade-key.pem \
  -l motorcade_web-01
```

That forces a single known host and avoids group mismatch.

## 2) Verify the risk-section fix remains stable
Hard refresh the homepage (Ctrl+F5) and confirm:
- Card titles/body text remain readable.
- No new CSS regressions.

## 3) Commit + push
After validating, commit the checkpoint docs and any corrected playbook assets.
