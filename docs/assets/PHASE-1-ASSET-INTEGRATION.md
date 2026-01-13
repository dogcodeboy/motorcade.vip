# Phase 1 Asset Integration (WordPress)
Project: Motorcade (motorcade.vip)
Scope: Public Website + Baseline UI Shell (Phase 1)

This document explains how Phase 1 assets are consumed by the current theme/plugins
and defines the compatibility strategy to prevent drift.

-----------------------------------------------------------------------

## Current Components

- Theme: motorcade-trust-theme
- Plugins:
  - motorcade-content-injector (injects Gutenberg page templates)
  - motorcade-brand-media-injector (brand registry + media attachments + shortcodes)
  - motorcade-demo-installer (bootstraps plugins/pages/menus)

-----------------------------------------------------------------------

## Current “Hero” Asset Paths (Two Systems)

### A) Content Injector (Plugin-local assets)
- Hero images referenced as tokens:
  - {ASSET:hero-home.svg}
  - {ASSET:hero-executive.svg}
  - {ASSET:hero-transport.svg}
  - {ASSET:hero-consulting.svg}
- Resolved to:
  - plugin URL: plugins/<motorcade-content-injector>/assets/<file>

This system is self-contained and works without S3.

### B) Brand/Media Injector (Media Library attachments)
- Stores/uses hero + logo images as WordPress attachment IDs.
- Creates upload directory:
  - wp-content/uploads/motorcade/brand/
- Provides shortcodes:
  - [motorcade_logo]
  - [motorcade_hero page="home"]

This system supports long-term centralized branding.

-----------------------------------------------------------------------

## Phase 1 Policy (Maintaining Course)

- Canonical asset structure for Phase 1 is defined by:
  - docs/assets/PHASE-1-ASSET-SPEC.md
  - assets/assets-manifest.json
  - motorcade-assets/ folder tree

- For Phase 1 execution stability:
  - Content Injector hero SVGs are allowed as TEMPORARY placeholders.
  - Brand/Media Injector is the intended LONG-TERM source of truth for hero + logos.

Rationale:
- Centralizing hero/logo in Media Library makes backups, restore, and admin control clearer.
- Content Injector remains focused on content layouts, not brand state.

-----------------------------------------------------------------------

## Forward Compatibility Plan (Later Phases)

When Phase 1 asset generation is resumed:
1) Generated hero/background assets live under motorcade-assets/ (repo + S3 pack).
2) A controlled import/mapping step sets Brand/Media Injector hero/logo attachment IDs
   to the approved assets (Media Library).
3) Content Injector templates should be updated to reference Brand/Media Injector
   shortcodes (or a single shared hero URL), reducing duplicated hero pipelines.

No code changes are required in Phase 1 to preserve progress.
This plan becomes actionable when assets + playbooks 15–18 are resumed.

-----------------------------------------------------------------------

## Backup Implications (For Later Playbooks)

When implementing backups (playbook 18):
- Include WordPress uploads directory:
  - wp-content/uploads/motorcade/brand/
- Include repo/S3 asset pack:
  - motorcade-assets/
- Include canonical manifest:
  - assets/assets-manifest.json

-----------------------------------------------------------------------
