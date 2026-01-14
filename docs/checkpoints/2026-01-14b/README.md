# CHECKPOINT — 2026-01-14b (FULL)

This checkpoint is the **current authoritative snapshot** for continuing work on motorcade.vip **without overwriting**
previous checkpoints:

- Previous historical checkpoint (do not overwrite): `docs/checkpoints/2026-01-12/`
- Latest prior checkpoint: `docs/checkpoints/2026-01-14/` (was incomplete/placeholder in repo snapshot)

## Canonical objective (next)
1) **Fix frontend image rendering** (Media Library has images, but frontend does not render them).
2) **Restore Texas DPS license number in footer** (user-confirmed still missing on live site).

## Key change in this checkpoint
- Adds **Playbook 26**: `ansible/playbooks/26_frontend_media_and_footer_fix.yml`
- Populates the repo-local asset source directory used by Playbook 24:
  `ansible/files/wp/uploads/motorcade/*` is now filled from `assets/images/motorcade/*`
- Updates Playbook 11 SSL vhost generator to include static/uploads locations (prevents images being routed to PHP).

## Apply
From repo root (controller):
```bash
cd ansible
ansible-playbook -i inventories/prod/hosts.ini playbooks/26_frontend_media_and_footer_fix.yml
```

## Verification
- Pick a Media Library image URL and run:
```bash
curl -I "https://motorcade.vip/wp-content/uploads/YYYY/MM/<file>"
```
Expect: `200` (or `304`) and `Content-Type: image/*`

- Confirm footer shows:
`Texas DPS License No. B31011701`

See `known-issues.md` for the decision tree if the HTTP status is 403/404.
