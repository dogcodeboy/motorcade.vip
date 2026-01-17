# Commands Run Directly on the Server (not from Ansible)

These were executed manually over SSH during the session to create a rollback point before attempting additional theme changes.

## Theme backup (server-side)
```bash
sudo mkdir -p /var/backups/motorcade
sudo tar -czf /var/backups/motorcade/motorcade-trust-$(date +%Y%m%d-%H%M%S).tar.gz \
  /var/www/motorcade/wp-content/themes/motorcade-trust
```

## Verify backup contents (root-only)
```bash
sudo ls -lh /var/backups/motorcade
sudo tar -tzf /var/backups/motorcade/motorcade-trust-*.tar.gz | head
```

### Notes from the session
- Non-root listing/extract attempts failed with "Permission denied". Running the verification commands with `sudo` worked.
- One attempt used a wildcard that did not match (because the file name included a timestamp). Using `sudo tar -tzf /var/backups/motorcade/motorcade-trust-*.tar.gz` resolves this.
