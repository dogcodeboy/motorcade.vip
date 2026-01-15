# Server Paths Reference (Motorcade)

Purpose: single authoritative reference for important on-server directory paths.

Rules:
- Append-only when adding new knowledge.
- Prefer exact paths confirmed on the server.
- If a path changes, add a new entry with date and keep the old entry for history.

## WordPress

- WordPress root: `/var/www/motorcade`
- wp-content: `/var/www/motorcade/wp-content`
- Themes directory: `/var/www/motorcade/wp-content/themes`
- Active Motorcade theme (as of 2026-01-15): `/var/www/motorcade/wp-content/themes/motorcade-trust`

## Common Theme Files

- Theme CSS: `/var/www/motorcade/wp-content/themes/motorcade-trust/style.css`
- Theme header template (typical): `/var/www/motorcade/wp-content/themes/motorcade-trust/header.php`
- Theme functions file (typical): `/var/www/motorcade/wp-content/themes/motorcade-trust/functions.php`

## Nginx / PHP-FPM (typical for this stack)

- Nginx conf.d: `/etc/nginx/conf.d`
- Nginx main config: `/etc/nginx/nginx.conf`
- PHP-FPM service name: `php-fpm`
- PHP-FPM socket (often): `/run/php-fpm/www.sock`

## Logs (common locations)

- Nginx access log (typical): `/var/log/nginx/access.log`
- Nginx error log (typical): `/var/log/nginx/error.log`
- PHP-FPM error log location varies by config (check `/etc/php-fpm.d/www.conf` and journald).

## Ansible Repo Conventions

- Repo root: `motorcade.vip/`
- Playbooks: `motorcade.vip/ansible/playbooks/`
- Checkpoints: `motorcade.vip/docs/checkpoints/`

