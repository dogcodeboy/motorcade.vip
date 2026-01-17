# Server-side commands run outside Ansible (record)

The goal was to create a server-side safety backup of the active theme before additional risky changes.

## Commands executed on EC2 (manual)
These were run via SSH on the instance as `ec2-user`:

```bash
sudo mkdir -p /var/backups/motorcade
sudo tar -czf /var/backups/motorcade/motorcade-trust-$(date +%Y%m%d-%H%M%S).tar.gz \
  /var/www/motorcade/wp-content/themes/motorcade-trust

sudo ls -lh /var/backups/motorcade/
sudo tar -tzf /var/backups/motorcade/motorcade-trust-*.tar.gz | head
```

## Notes
- A permission error occurred when attempting non-sudo `ls`/`tar` on `/var/backups/motorcade`.
- Using `sudo` for the verification commands resolved it.
- This backup is intended as the emergency rollback source if a theme update breaks the site.
