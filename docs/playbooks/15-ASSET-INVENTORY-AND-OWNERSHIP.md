PLAYBOOK 15 — ASSET INVENTORY & OWNERSHIP

Project: motorcade.vip
Platform: AWS EC2 (Amazon Linux 2023)
Status: Site LIVE
Checkpoint Baseline: 2026-01-12

1. Purpose

This playbook establishes a clear, authoritative inventory of all production assets required to:

Keep the site online

Prevent accidental deletion or overwrite

Prepare for backups, restores, and future deployments

Eliminate “mystery files” and ownership confusion

This is not a backup playbook.
This is asset awareness and control.

2. Asset Ownership Model (Non-Negotiable)

All assets fall into one of four ownership classes:

Class	Description	May Be Modified
System	OS, nginx, php-fpm	Only intentionally
Application	WordPress core	Rarely
Content	Themes, uploads, plugins	Yes
Ops	Scripts, docs, playbooks	Yes

Anything not mapped to a class is unauthorized drift.

3. Canonical Directory Map (Production)
3.1 System (DO NOT MODIFY CASUALLY)
/etc/nginx/
/etc/nginx/conf.d/
/etc/nginx/snippets/
/etc/php-fpm.d/
/etc/systemd/system/


Ownership:

User: root

Group: root

Purpose:

nginx virtual hosts

maintenance mode logic

PHP runtime config

3.2 Application (WordPress Core)
/var/www/motorcade/
├── wp-admin/
├── wp-includes/
├── wp-login.php
├── wp-settings.php
├── wp-config.php


Ownership:

User: nginx (or ec2-user if already set — do not flip mid-flight)

Group: nginx

Rules:

Core files are never edited directly

Only updated via WordPress update mechanism or controlled replace

3.3 Content (Primary Change Surface)
/var/www/motorcade/wp-content/
├── themes/
│   └── motorcade/          ← REQUIRED custom theme (Phase 2)
├── plugins/
├── uploads/
│   ├── 2024/
│   ├── 2025/
│   └── 2026/


Ownership:

User: nginx

Group: nginx

Rules:

Themes/plugins are the only allowed PHP edits

uploads/ is data, never code

3.4 Maintenance Assets
/var/www/motorcade/maintenance/
├── index.html
├── assets/
│   ├── css/
│   └── img/


Control Flag:

/etc/nginx/motorcade_maintenance_on


Rules:

Static HTML only

No PHP

Served directly by nginx

3.5 Ops / Docs / Repo Assets
repo root/
├── docs/
│   ├── playbooks/
│   ├── checkpoints/
│   └── MAINTENANCE_MODE.md
├── ops/
│   └── ansible/


Rules:

Repo is source of truth

Server is runtime only

4. Asset Inventory Commands (Run Once)

These commands document reality.
They do not modify anything.

4.1 Capture Web Root Inventory
sudo find /var/www/motorcade -maxdepth 3 -type d
sudo find /var/www/motorcade -maxdepth 2 -type f

4.2 Capture Ownership Snapshot
sudo ls -lah /var/www/motorcade
sudo ls -lah /var/www/motorcade/wp-content

4.3 Capture nginx Asset References
sudo grep -R "root " /etc/nginx
sudo grep -R "maintenance" /etc/nginx


Save outputs only if needed. No uploads required now.

5. Drift Prevention Rules

Effective immediately:

❌ No edits directly in /wp-admin or /wp-includes

❌ No SCP uploads into random directories

❌ No temporary test files left behind

❌ No second WordPress installs

All changes go through:

wp-content (themes/plugins)

maintenance directory

documented playbooks

6. Readiness Gate (Pass/Fail)

You are cleared to proceed if:

Site loads normally when maintenance flag is absent

Maintenance page loads when flag is present

wp-content exists and is writable

No mystery directories under /var/www/motorcade

If all true → PASS

7. Output of This Playbook

When Playbook 15 is complete, we now have:

A known-good asset map

Clear ownership boundaries

A safe surface for theme deployment

A stable base for backups (Playbook 16)

No visible changes to the site occur in this playbook.

8. Next Playbook

➡ Playbook 16 — Backup Strategy (Files + Database)
We will create recoverability without downtime.
