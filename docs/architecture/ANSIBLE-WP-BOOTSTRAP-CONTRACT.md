
The name is intentional and generic to support reuse.

-----------------------------------------------------------------------

## Required Capabilities

The role MUST be able to perform the following via automation:

### 1) Core WordPress Configuration
- Verify WordPress is installed
- Verify database connectivity
- Set site URL and home URL
- Set site title and tagline
- Configure timezone and locale
- Configure permalink structure

All settings applied via:
- wp-cli
- configuration templates

No UI interaction.

-----------------------------------------------------------------------

### 2) Theme Management
- Install theme from:
  - local artifact OR
  - approved remote source
- Verify checksum (if provided)
- Activate the theme
- Apply theme options via:
  - wp-cli options, or
  - constants injected via wp-config.php

Themes must not contain environment-specific logic.

-----------------------------------------------------------------------

### 3) Plugin Management
- Install required plugins
- Activate required plugins
- Disable/remove disallowed plugins
- Ensure plugin state matches declared configuration

Plugins must NOT install other plugins.

-----------------------------------------------------------------------

### 4) Page & Menu Provisioning
- Create required pages (idempotent)
- Create required menus
- Assign menus to theme locations
- Assign homepage and posts page

Page creation must:
- Avoid duplication
- Be safe on re-run
- Not depend on manual content edits

-----------------------------------------------------------------------

### 5) Baseline Content Injection (Allowed)
The role MAY:
- Insert placeholder blocks or layouts
- Insert shortcodes or block references

The role MUST NOT:
- Embed authoritative assets
- Generate or upload final imagery

-----------------------------------------------------------------------

### 6) Configuration Enforcement
- Set required WordPress options
- Disable features not allowed in enterprise mode
- Enforce filesystem permissions (uploads writable, core protected)

-----------------------------------------------------------------------

## Inputs (Contracted Variables)

The role MUST accept configuration via variables, including:

- `wp_site_url`
- `wp_home_url`
- `wp_site_title`
- `wp_theme_name`
- `wp_required_plugins[]`
- `wp_required_pages[]`
- `wp_required_menus[]`
- `wp_homepage_slug`
- `wp_permalink_structure`

Secrets must be sourced from Ansible Vault.

-----------------------------------------------------------------------

## Outputs (Guaranteed State)

After successful execution:

- WordPress is reachable
- Correct theme is active
- Required plugins are active
- Pages and menus exist exactly once
- Homepage is set correctly
- System is ready for asset resolution

No manual steps remain.

-----------------------------------------------------------------------

## Idempotency Requirements

- Re-running the role must NOT:
  - duplicate pages
  - reset content unexpectedly
  - break Media Library
  - override approved assets

State drift must be correctable by re-run.

-----------------------------------------------------------------------

## Failure Handling

On failure, the role must:
- Fail loudly
- Leave the system in a recoverable state
- Not partially apply irreversible changes

Logs must be actionable.

-----------------------------------------------------------------------

## Relationship to Other Contracts

This role operates under:
- ENTERPRISE-WP-INTEGRATION-CONTRACT.md
- PROTOTYPE-TO-ENTERPRISE-MIGRATION.md

It intentionally precedes:
- Asset Resolver implementation
- Playbooks 15–18

-----------------------------------------------------------------------

## Enforcement

Any theme, plugin, or process that requires wp-admin clicks
or manual intervention violates this contract.

The contract wins.

-----------------------------------------------------------------------
