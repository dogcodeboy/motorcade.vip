# Server-Side Commands Run Outside Ansible

The following commands were executed directly on the EC2 instance during the session (not via an Ansible playbook). These are captured here so the next session can account for them.

## Theme backup (created on-server)
Executed (as `ec2-user`, with `sudo`):

```bash
sudo mkdir -p /var/backups/motorcade
sudo tar -czf /var/backups/motorcade/motorcade-trust-$(date +%Y%m%d-%H%M%S).tar.gz \
  /var/www/motorcade/wp-content/themes/motorcade-trust
```

## Verification attempts
Initial attempts without `sudo` failed due to permissions. Successful verification used:

```bash
sudo ls -lh /var/backups/motorcade/
sudo tar -tzf /var/backups/motorcade/motorcade-trust-*.tar.gz | head
```

## Notes
- The archive is owned by `root:root` and the backup directory is `drwxr-xr-x`.
- Use `sudo` for listing and inspecting.
