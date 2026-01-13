# Playbooks 15–18 Contract (Enterprise)
Project: Motorcade (motorcade.vip)

Status: Authoritative Contract  
Environment: AWS + Amazon Linux 2023  
Automation Authority: Ansible

This contract defines the purpose and acceptance criteria for playbooks 15–18.
Implementation must align with the Phase 1 enterprise contract stack.

Governing docs:
- docs/architecture/ANSIBLE-WP-BOOTSTRAP-CONTRACT.md
- docs/architecture/ASSET-RESOLVER-INTERFACE-CONTRACT.md
- docs/architecture/CONTENT-PROVISIONING-SPEC.md
- assets/assets-manifest.json

-----------------------------------------------------------------------

## Playbook 15 — Theme/Plugin Deployment (Deterministic)
Goal:
- Install/activate theme
- Install/activate required plugins
- Enforce plugin list (remove disallowed)

Must:
- Use checksums for artifacts when available
- Be safe to re-run
- Not require wp-admin clicks

Acceptance:
- wp theme status shows correct theme active
- wp plugin status matches declared list
- site renders without errors

-----------------------------------------------------------------------

## Playbook 16 — Site Bootstrap & Content Provisioning
Goal:
- Apply WP settings (permalinks, homepage)
- Provision pages and menus per spec

Must:
- Be idempotent (no duplicate pages/menus)
- Use resolver IDs (no asset URLs in content)

Acceptance:
- Required pages exist once
- Menus exist/assigned
- Homepage set correctly

-----------------------------------------------------------------------

## Playbook 17 — Asset Resolver Wiring & Verification (Scaffolding)
Goal:
- Set asset resolver backend and base URL
- Validate manifest readability
- Verify resolution of sample IDs

Must:
- Not require final binaries
- Use safe placeholders/fallbacks

Acceptance:
- Resolver configured (options/constants set)
- Verification step passes for:
  - manifest readable
  - base URL set
  - resolve at least 3 IDs (even if placeholder mode)

-----------------------------------------------------------------------

## Playbook 18 — Backups (Deferred Until After 15–17 Stable)
Goal:
- Encrypted backups to S3 (authoritative)
- Optional Drive mirror
- Restore-friendly packaging

Includes:
- WP uploads (including motorcade brand folder if used)
- WP database dump
- repo snapshot metadata (optional)
- asset pack if deployed

Acceptance:
- Backup runs unattended
- Restore procedure documented and tested

-----------------------------------------------------------------------

## Sequencing Policy

- Implement 15–17 first and stabilize.
- Only then implement 18.
- Asset binary generation may occur in parallel ONLY after 17 wiring is stable.

-----------------------------------------------------------------------
