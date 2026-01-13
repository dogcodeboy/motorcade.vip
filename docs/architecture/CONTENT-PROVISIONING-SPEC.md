# Content Provisioning Specification (Enterprise)
Project: Motorcade (motorcade.vip)

Status: Authoritative Spec  
Environment: AWS + Amazon Linux 2023  
Automation Authority: Ansible  
Scope: Public Website + Baseline UI (Phase 1)

This spec defines the canonical public website structure that must be
provisioned deterministically by automation (Ansible + wp-cli or a minimal
idempotent provisioner).

No wp-admin manual setup is allowed.

Asset references MUST use the Asset Resolver interface (manifest IDs),
not hardcoded URLs.

Governing contracts:
- ENTERPRISE-WP-INTEGRATION-CONTRACT.md
- ANSIBLE-WP-BOOTSTRAP-CONTRACT.md
- ASSET-RESOLVER-INTERFACE-CONTRACT.md

-----------------------------------------------------------------------

## Provisioning Method (Policy)

Allowed implementation approaches:
A) wp-cli driven provisioning from a structured spec (preferred)
B) a minimal idempotent “Content Provisioner” plugin (acceptable)

Either approach must be:
- idempotent
- safe to re-run
- deterministic

-----------------------------------------------------------------------

## Required Pages (Phase 1)

All pages must exist once and only once.

### 1) Home
- slug: `home`
- title: `Motorcade`
- set as: Front Page (homepage)
- contains sections in this order:
  1. Hero (background: `bg.hero.primary`)
  2. Services overview (background: `bg.section.services`)
  3. Trust/Compliance (background: `bg.section.trust`)
  4. Call-to-Action (background: `bg.section.cta`)
  5. Footer (background: `bg.section.footer`)

### 2) Services
- slug: `services`
- title: `Services`
- contains:
  - service cards (no people imagery)
  - trust badges block

### 3) About
- slug: `about`
- title: `About`
- contains:
  - mission/values copy
  - no founder hero placement
  - founder/co-founder bios allowed only in designated bio sections (policy from brand constraints)

### 4) Contact
- slug: `contact`
- title: `Contact`
- contains:
  - contact form embed/shortcode placeholder
  - email + phone placeholders
  - service area text

### 5) Privacy Policy
- slug: `privacy-policy`
- title: `Privacy Policy`
- may be auto-generated via WordPress, but must exist and be linked in footer

### 6) Terms of Service
- slug: `terms`
- title: `Terms`
- must exist and be linked in footer

-----------------------------------------------------------------------

## Required Navigation Menus (Phase 1)

### Primary Menu
- name: `Primary`
- location: `primary`
- items (in order):
  - Home → /home
  - Services → /services
  - About → /about
  - Contact → /contact

### Footer Menu
- name: `Footer`
- location: `footer`
- items:
  - Privacy Policy → /privacy-policy
  - Terms → /terms

-----------------------------------------------------------------------

## Required Site Settings (Phase 1)

- Site title: `Motorcade`
- Tagline: optional (can be blank)
- Permalinks: `/%postname%/`
- Timezone: America/Chicago (or server default, but must be set deterministically)
- Blog posts page: optional (not required in Phase 1)

-----------------------------------------------------------------------

## Required Blocks/Shortcodes (Phase 1)

All asset usage must be via resolver.

Required shortcode usage patterns:
- Backgrounds:
  - `[motorcade_asset id="bg.hero.primary" mode="background"]`
- Icons:
  - `[motorcade_asset id="icon.shield" mode="img" alt="Protection"]`
- Badges:
  - `[motorcade_asset id="badge.licensed" mode="img" alt="Licensed"]`

If `mode="background"` is not implemented yet, content may store the asset ID
as a data attribute for later rendering, but MUST NOT hardcode URLs.

-----------------------------------------------------------------------

## Content Guardrails (Phase 1)

- No ops/employee portal pages created
- No guard imagery
- No team gallery
- No founder hero visuals
- No claims of scale not supported by reality

All content must align with:
- Brand constraints
- Decision psychology

-----------------------------------------------------------------------

## Acceptance Criteria

Provisioning is considered correct when:

- All required pages exist once
- Menus exist, are assigned, and contain correct items/order
- Homepage is set
- No wp-admin clicks are required to reach this state
- Asset references use resolver IDs (not URLs)

-----------------------------------------------------------------------
 
