# Known Issues (as of 2026-01-14b)

## P0 — Frontend images do not render
Symptoms:
- Images appear in WP Admin Media Library
- Frontend shows broken images / missing images

Primary likely causes:
1) Nginx routing static uploads through PHP or denying file reads
2) SELinux contexts blocking nginx/php-fpm from reading uploads
3) Files missing on disk for the referenced URL (404), or perms incorrect

Resolution path:
- Apply Playbook 26 (adds explicit nginx locations + SELinux contexts + perms)
- If still broken, capture exact status for a real image URL:
  - `curl -I https://motorcade.vip/wp-content/uploads/...`
  - 403 => check SELinux/audit + nginx deny rules
  - 404 => file path mismatch or missing files
  - 200 but still broken => mixed-content/CSP (rare)

## P0 — Texas DPS license not shown in footer
Expected:
- Footer includes: `Texas DPS License No. B31011701`

Likely causes:
- motorcade-trust theme not active
- different theme/template is rendering
- footer overridden by a plugin/builder

Playbook 26 forces activation of `motorcade-trust` and validates that the deployed theme footer contains the license string.
