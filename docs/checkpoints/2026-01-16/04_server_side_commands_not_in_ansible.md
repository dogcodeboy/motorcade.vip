# Server-side commands executed outside Ansible

These commands were run (or attempted) directly on the EC2 instance during this session.

## Theme backup creation (successful)
```bash
sudo mkdir -p /var/backups/motorcade
sudo tar -czf /var/backups/motorcade/motorcade-trust-$(date +%Y%m%d-%H%M%S).tar.gz \
  /var/www/motorcade/wp-content/themes/motorcade-trust
```

## Backup verification
The non-privileged `ls -lh /var/backups/motorcade` and `tar -tzf ...` initially failed due to permissions. Verification worked when run with `sudo`:

```bash
sudo ls -lh /var/backups/motorcade
sudo tar -tzf /var/backups/motorcade/motorcade-trust-*.tar.gz | head
```

## Notes
- The backup directory was created with root ownership; this is fine for emergency restore, but day-to-day listing requires `sudo`.
