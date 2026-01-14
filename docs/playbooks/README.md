# Playbooks Index

Quick links to operational playbooks and their documentation (links are **relative** so they work on GitHub).

## Core build (00–14g)

| # | Ansible playbook | Documentation |
|---:|---|---|
| 00 | `../../ansible/playbooks/00-bootstrap.yml` | `00-00-BOOTSTRAP.md` |
| 01 | `../../ansible/playbooks/01-packages.yml` | `01-01-PACKAGES.md` |
| 02 | `../../ansible/playbooks/02-services.yml` | `02-02-SERVICES.md` |
| 03 | `../../ansible/playbooks/03-nginx.yml` | `03-03-NGINX.md` |
| 04 | `../../ansible/playbooks/04-php-test.yml` | `04-04-PHP-TEST.md` |
| 05 | `../../ansible/playbooks/05-remove-php-test.yml` | `05-05-REMOVE-PHP-TEST.md` |
| 06 | `../../ansible/playbooks/06-db-deps.yml` | `06-06-DB-DEPS.md` |
| 07 | `../../ansible/playbooks/07-database.yml` | `07-07-DATABASE.md` |
| 08 | `../../ansible/playbooks/08-wordpress-install.yml` | `08-08-WORDPRESS-INSTALL.md` |
| 09 | `../../ansible/playbooks/09-wp-config.yml` | `09-09-WP-CONFIG.md` |
| 09.5 | `../../ansible/playbooks/09.5-wp-cli.yml` | `09.5-09-5-WP-CLI.md` |
| 10 | `../../ansible/playbooks/10-wp-core-install.yml` | `10-10-WP-CORE-INSTALL.md` |
| 11 | `../../ansible/playbooks/11-nginx-ssl.yml` | `11-11-NGINX-SSL.md` |
| 12 | `../../ansible/playbooks/12-wp-filesystem.yml` | `12-12-WP-FILESYSTEM.md` |
| 13 | `../../ansible/playbooks/13-wp-limits.yml` | `13-13-WP-LIMITS.md` |
| 14 | `../../ansible/playbooks/14-all.yml` | `14-14-ALL.md` |
| 14a | `../../ansible/playbooks/14a-php-baseline.yml` | `14a-14A-PHP-BASELINE.md` |
| 14b | `../../ansible/playbooks/14b-wp-imagick-preflight.yml` | `14b-14B-WP-IMAGICK-PREFLIGHT.md` |
| 14c | `../../ansible/playbooks/14c-wp-imagick-imagemagick.yml` | `14c-14C-WP-IMAGICK-IMAGEMAGICK.md` |
| 14d | `../../ansible/playbooks/14d-wp-imagick-phpext.yml` | `14d-14D-WP-IMAGICK-PHPEXT.md` |
| 14e | `../../ansible/playbooks/14e-wp-imagick-clean.yml` | `14e-14E-WP-IMAGICK-CLEAN.md` |
| 14f | `../../ansible/playbooks/14f-wp-imagick-default.yml` | `14f-14F-WP-IMAGICK-DEFAULT.md` |
| 14g | `../../ansible/playbooks/14g-maintenance-site.yml` | `14g-14G-MAINTENANCE-SITE.md` |
| 14g (disable) | `../../ansible/playbooks/14g-maintenance-disable.yml` | `14g-14G-MAINTENANCE-DISABLE.md` |

## Operations (15–19)

| # | Ansible playbook | Documentation |
|---:|---|---|
| 15 | `../../ansible/playbooks/15_asset_inventory.yml` | `15-ASSET-INVENTORY-AND-OWNERSHIP.md` |
| 16 | `../../ansible/playbooks/16_backups.yml` | `16-BACKUPS.md` |
| 17 | `../../ansible/playbooks/17_restore_dr.yml` | `17-RESTORE-DR.md` |
| 18 | `../../ansible/playbooks/18_ops_handoff.yml` | `18-OPS-HANDOFF.md` |
| 19 | `../../ansible/playbooks/19_theme_plugins_assets.yml` | `19-THEME-PLUGINS-ASSETS.md` |

## Post-provisioning (20+)

Docs may exist ahead of playbooks; implementers should verify the playbook file exists under `ansible/playbooks/`.

- 20 — `20-CONTENT-STRUCTURE.md` (playbook may be pending)
