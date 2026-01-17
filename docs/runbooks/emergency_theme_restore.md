# Emergency Theme Backup & Restore (Motorcade WordPress Theme)

This runbook provides a **hard rollback guarantee** for the active WordPress theme directory on the EC2 host.

Theme path on the server:
- `/var/www/motorcade/wp-content/themes/motorcade-trust`

## A) Create a timestamped server-side backup (tar.gz)
Run on the EC2 instance:

```bash
sudo mkdir -p /var/backups/motorcade
sudo tar -czf /var/backups/motorcade/motorcade-trust-$(date +%Y%m%d-%H%M%S).tar.gz \
  /var/www/motorcade/wp-content/themes/motorcade-trust
```

Verify:
```bash
sudo ls -lh /var/backups/motorcade
sudo tar -tzf /var/backups/motorcade/motorcade-trust-*.tar.gz | head
```

## B) Restore the theme from a backup
Pick the backup file you want to roll back to, then:

```bash
# Example backup file; replace with your actual file name
BK=/var/backups/motorcade/motorcade-trust-YYYYMMDD-HHMMSS.tar.gz

# Safety: keep the current theme as a "broken" backup before restoring
sudo mv /var/www/motorcade/wp-content/themes/motorcade-trust \
  /var/www/motorcade/wp-content/themes/motorcade-trust.broken.$(date +%Y%m%d-%H%M%S)

# Restore
sudo tar -xzf "$BK" -C /
```

Reload services (best-effort):
```bash
sudo systemctl reload php-fpm || true
sudo systemctl reload nginx || true
```

## Notes
- The archive is created with the full path structure; restoring with `-C /` puts files back where they belong.
- If you use a different web root, adjust paths accordingly.
