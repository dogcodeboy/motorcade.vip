# Emergency Theme Backup & Restore (Motorcade)

This document describes how to safely back up and restore the active
`motorcade-trust` WordPress theme entirely server-side.

## Backup
sudo mkdir -p /var/backups/motorcade
sudo tar -czf /var/backups/motorcade/motorcade-trust-$(date +%Y%m%d-%H%M%S).tar.gz \
  /var/www/motorcade/wp-content/themes/motorcade-trust

## Restore
sudo tar -xzf /var/backups/motorcade/motorcade-trust-YYYYMMDD-HHMMSS.tar.gz \
  -C /var/www/motorcade/wp-content/themes/
