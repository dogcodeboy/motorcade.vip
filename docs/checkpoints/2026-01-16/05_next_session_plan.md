# Next Session Plan (finish the header logo without breaking the site)

## 0) Confirm rollback safety (must-do)
1) Ensure at least one `/var/backups/motorcade/motorcade-trust-*.tar.gz` exists.
2) Confirm it lists expected files:
   - `motorcade-trust/style.css`
   - `motorcade-trust/functions.php`
   - `motorcade-trust/header.php`

## 1) Fix the logo via minimal, additive changes
Goal: restore the header logo using one of these safe methods:

### Preferred method
- Use WordPress "Custom Logo" (if set) and ensure header template prints it.
- Provide a fallback to a theme asset **without** changing global CSS.

### If we must patch theme files
- Patch **only** `header.php` and/or a tiny CSS block, with idempotent markers.
- Never replace the whole `style.css`.

## 2) Resolve the two recurring operational failure modes
- **Host pattern mismatch:** fix `-l` / inventory group naming so playbooks actually run.
- **Controller file path issues:** ensure playbooks source assets from `{{ playbook_dir }}/../files/...` (repo-canonical), not relative to `ansible/playbooks`.

## 3) Quick verification checks
- Hard-refresh the site (Ctrl+F5).
- Confirm:
  - risk cards readable
  - icons not oversized
  - header logo visible
