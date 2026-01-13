# Enterprise WordPress Integration Contract
Project: Motorcade (motorcade.vip)

Status: Authoritative Target Architecture  
Scope: Public Website + Baseline UI (Phase 1)  
Environment: AWS + Amazon Linux 2023  
Automation Authority: Ansible

This document defines the TARGET, enterprise-grade integration model for
the Motorcade WordPress site. It supersedes all prototype-era assumptions
made during earlier GoDaddy-based experimentation.

If existing themes or plugins conflict with this contract, THEY ARE TO BE
REWORKED, REPLACED, OR REMOVED.

-----------------------------------------------------------------------

## Core Principle

The website must be:
- Fully deployable via Ansible
- Deterministic on rebuild
- Environment-agnostic
- Free of manual admin panel dependencies

Human clicks are NOT a deployment strategy.

-----------------------------------------------------------------------

## Authoritative Sources of Truth

The system is governed by the following layers, in order:

1. Ansible playbooks (infrastructure + deployment)
2. Canonical documentation (checkpoints, specs, manifests)
3. WordPress database state (generated, never hand-crafted)
4. Theme and plugins (replaceable implementation details)

Themes and plugins are TOOLS, not authorities.

-----------------------------------------------------------------------

## Theme Architecture (Enterprise Target)

### Requirements
- Theme must be deployable entirely via Ansible
- No configuration that requires manual wp-admin interaction
- No hardcoded environment paths
- No bundled business logic

### Allowed Responsibilities
- Layout
- Typography
- Color system
- Template structure
- Hooks for injected content

### Forbidden Responsibilities
- Asset ownership
- Content creation
- Business logic
- Environment detection

### Deployment Model
- Theme installed via Ansible:
  - from repo artifact or zip
  - checksum verified
- Theme activated via Ansible
- Theme options set via:
  - wp-cli
  - or PHP constants injected from environment

-----------------------------------------------------------------------

## Plugin Architecture (Enterprise Target)

### Plugin Classification

Plugins fall into one of three categories:

#### 1) Infrastructure Plugins
Examples:
- caching
- security hardening
- logging

Rules:
- Installed and configured via Ansible
- No UI-driven configuration

#### 2) Content Provisioning Plugins
Purpose:
- Programmatically create pages, menus, blocks

Rules:
- Must be idempotent
- Must be safe to re-run
- Must NOT own assets
- Must NOT assume hosting provider

These replace the *prototype* “content injector” concept.

#### 3) Brand & Asset Resolution Plugins (Optional)
Purpose:
- Resolve approved assets into WordPress (Media Library)
- Provide stable shortcodes or blocks

Rules:
- Assets originate externally (S3 / repo)
- Plugin only maps IDs/URLs
- No embedded binaries

-----------------------------------------------------------------------

## Asset Resolution Model (Locked)

Assets DO NOT belong to:
- the theme
- arbitrary plugins

### Canonical Asset Sources
- Repo + S3 asset pack (`motorcade-assets/`)
- Manifest-driven (`assets/assets-manifest.json`)

### WordPress Usage
- Assets may be:
  - referenced directly by URL, or
  - imported into Media Library via automation
- Media Library is a *presentation layer*, not the source of truth

### Automation Requirement
- Asset import/mapping must be:
  - scriptable
  - repeatable
  - reversible

No manual uploads.

-----------------------------------------------------------------------

## Configuration Model

### Environment Configuration
- Stored outside WordPress DB when possible
- Injected via:
  - environment variables
  - Ansible templates
  - wp-config.php constants

### WordPress Options
- Set via wp-cli
- Never assumed to be hand-edited

This allows:
- blue/green rebuilds
- disaster recovery
- deterministic state

-----------------------------------------------------------------------

## Migration from Prototype Plugins (Policy)

Prototype plugins created during the GoDaddy phase:
- Are NOT authoritative
- May be modified or discarded
- Exist only to inform requirements

Migration strategy:
1. Identify required behavior (not code)
2. Re-implement behavior in:
   - Ansible tasks
   - enterprise-grade plugins
3. Remove prototype dependencies

Backward compatibility is NOT required if it blocks automation.

------------
