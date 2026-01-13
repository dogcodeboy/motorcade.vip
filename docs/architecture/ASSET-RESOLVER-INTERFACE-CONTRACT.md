# Asset Resolver Interface Contract
Project: Motorcade (motorcade.vip)

Status: Authoritative Contract  
Environment: AWS + Amazon Linux 2023  
Automation Authority: Ansible  
Scope: Public Website + Baseline UI (Phase 1)

This contract defines the enterprise-grade interface used by WordPress
(theme and content) to reference approved assets by STABLE IDs, not filenames.

It enables deterministic rebuilds, prevents prototype drift, and supports
future migration to S3/CloudFront without rewriting pages.

-----------------------------------------------------------------------

## Purpose

The Asset Resolver provides a stable way to render assets such as:
- hero backgrounds
- section backgrounds
- icons
- trust/compliance badges
- dividers and textures

Assets MUST be referenced by ID, not by hardcoded paths.

Primary source of asset identity:
- `assets/assets-manifest.json`

-----------------------------------------------------------------------

## Non-Negotiables

- No manual wp-admin “upload an image and paste URL”
- No theme-owned asset binaries as a source of truth
- No plugin-owned authoritative hero binaries as a source of truth
- No environment-specific paths embedded in content

If content references an asset, it references an ID.

-----------------------------------------------------------------------

## Canonical Asset Identity

Asset IDs originate from:
- `assets/assets-manifest.json` → `assets.*.*.id` fields

Example IDs:
- `bg.hero.primary`
- `bg.section.services`
- `icon.shield`
- `badge.licensed`
- `divider.light`

IDs must be stable across environments.

-----------------------------------------------------------------------

## Resolver Outputs (What the Interface Must Provide)

For any valid asset ID, the resolver must be able to return:

- A URL suitable for HTML/CSS usage
- Optional: a WordPress attachment ID (if imported)
- Optional: width/height metadata (if relevant)
- Optional: srcset/sizes for responsive backgrounds (Phase 2+)

Phase 1 requirement:
- Provide URL output deterministically

-----------------------------------------------------------------------

## Resolution Strategy (Enterprise Target)

The resolver supports one or more "backends":

### Backend A (Default Phase 1): Local Pack (Repo / Server)
- Assets are deployed to a deterministic folder on the server:
  - `motorcade-assets/` (relative to web root or uploads root)
- URLs are derived from a base URL + manifest path templates.

### Backend B (Optional): WordPress Media Library
- Approved assets are imported to WP Media Library by automation (Ansible/wp-cli).
- Resolver maps asset IDs → attachment IDs → attachment URLs.
- Media Library is a presentation layer, not the source of truth.

### Backend C (Future): S3/CloudFront
- Base URL points to CloudFront distribution.
- Asset paths follow the same manifest structure.
- Content does not change.

The backend selection MUST be configurable and automated.

-----------------------------------------------------------------------

## Configuration Contract

Configuration must be automated via Ansible and stored in one of:
- wp-config.php constants
- WordPress options set via wp-cli
- environment variables injected by systemd/nginx/php-fpm

Required configuration keys:

- `MOTORCADE_ASSET_BACKEND` (values: `local_pack`, `media_library`, `cloudfront`)
- `MOTORCADE_ASSET_BASE_URL` (example: `https://motorcade.vip/motorcade-assets`)
- `MOTORCADE_ASSET_MANIFEST_PATH` (default: `/assets/assets-manifest.json` OR baked into plugin)

Phase 1 minimum:
- backend + base URL

-----------------------------------------------------------------------

## Public Interface (Theme/Content Usage)

The resolver MUST provide one stable method of use that can appear in content.

### Option 1 (Preferred): Shortcode
- `[motorcade_asset id="bg.hero.primary"]`
- `[motorcade_asset id="icon.shield" alt="Shield"]`

### Option 2: Gutenberg Block (Phase 2+)
- `Motorcade Asset` block that accepts `id`

Phase 1 requires shortcodes at minimum.

Shortcode behavior:
- If asset found → render `<img>` or return URL depending on mode
- If asset missing → render safe fallback (no broken layout)

-----------------------------------------------------------------------

## Fallback & Failure Rules

If an asset ID cannot be resolved:
- Must NOT fatal error
- Must return a safe placeholder:
  - empty string OR
  - a minimal neutral divider/blank background OR
  - a generic icon

Additionally:
- Log an actionable warning (wp debug log)
- Provide a health check output for automation

-----------------------------------------------------------------------

## Health Check Interface (Automation Support)

The resolver must support an automated verification method, one of:
- wp-cli command (preferred): `wp motorcade assets verify`
- or an HTTP endpoint restricted to localhost
- or an admin-only tools page (not required in Phase 1)

Verification must:
- Validate manifest present/readable
- Validate base URL configured
- Optionally validate a small set of known IDs exist

Phase 1 minimum:
- verify manifest readable + base URL set + resolve 3 sample IDs

-----------------------------------------------------------------------

## Relationship to Playbooks 15–18 (Future)

When playbooks 15–17 resume:
- They will deploy the local asset pack and set:
  - `MOTORCADE_ASSET_BACKEND=local_pack`
  - `MOTORCADE_ASSET_BASE_URL=<computed>`
- They will run the resolver verification step.

When playbook 18 resumes:
- It will include:
  - the asset pack
  - the manifest
  - any imported attachment mapping state (if media_library backend enabled)

-----------------------------------------------------------------------

## Security & Integrity Requirements

- Manifest must be treated as immutable in production
- Optional integrity layer (Phase 2+):
  - checksums file validation before deploy
- Asset base URL must be whitelisted to prevent injection

-----------------------------------------------------------------------

## Enforcement

If any theme/plugin/content hardcodes asset paths or requires wp-admin manual uploads,
it violates this contract.

The contract wins.

-----------------------------------------------------------------------
