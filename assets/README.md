# Assets (Motorcade)

This folder contains the canonical asset manifest and supporting notes.

## Files
- `assets-manifest.json`
  - Phase-specific, machine-readable contract for what assets must exist
  - Paths are relative to the canonical asset root: `motorcade-assets/`
  - Derived from:
    - `docs/assets/PHASE-1-ASSET-SPEC.md`
    - checkpoint docs in `docs/checkpoints/`

## Where the actual binaries live (later)
Phase 1 is currently scoped to specification + manifest only.
Asset generation and deployment are intentionally paused.

When resumed:
- GitHub stores: manifest + small assets (icons/badges) as appropriate
- S3 stores: full binary asset packs
- Drive mirrors: human-friendly archive

## Naming & stability
Do not rename existing IDs or paths without updating:
- the manifest
- the theme/plugin wiring
- the deployment playbooks (15–17, planned)
