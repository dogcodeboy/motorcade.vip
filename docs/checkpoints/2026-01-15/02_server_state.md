# Server State Notes — 2026-01-15

## Theme

- `motorcade-trust` is active.
- `twentytwentyfive` is installed but inactive.

## Branding assets

Branding assets are present on the server at:

- `/var/www/motorcade/wp-content/uploads/motorcade/branding/`

This includes multiple sizes of badge, header-combo variants, and wordmarks.

## Observed WP-CLI warnings

Running `wp theme list --path=/var/www/motorcade` shows warnings about constants already defined.

These appear **non-fatal** but should be tracked if they begin affecting WP-CLI behavior.
