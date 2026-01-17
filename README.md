Motorcade - Playbook 36p (Restore header logo)

Problem
- Header logo/badge missing from the navigation bar.
- This typically happens when the theme is relying on WordPress "Custom Logo" being set, or when the fallback badge asset is missing on the server.

Fix
- Deploy a header.php that includes a safe fallback logo (uses the theme badge if no WP custom logo is set).
- Upload the badge file to the theme at:
  - wp-content/themes/motorcade-trust/assets/images/brand/motorcade-badge-64.png
- Inject a tiny CSS block to keep the logo visible and sized correctly.

Run
```bash
cd ~/Repos/motorcade.vip
unzip -o ~/Downloads/motorcade-playbook36p-restore-header-logo.zip
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/36p_header_logo_restore.yml \
  --private-key ~/.ssh/motorcade-key.pem
```

Notes
- If your browser is caching aggressively, do a hard refresh: Ctrl+F5.
- This playbook is idempotent. Re-running is safe.
