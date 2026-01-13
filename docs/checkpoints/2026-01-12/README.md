# Motorcade.vip — Canonical Project Checkpoint (2026-01-12)

This folder represents the **authoritative, canonical state** of the Motorcade.vip project as of **January 12, 2026**.

It exists to preserve:
- Architectural decisions
- Brand and psychology constraints
- Asset strategy
- Ops and employee portal scope
- Backup and disaster-recovery design
- Immediate next steps

This checkpoint is designed so that **any competent administrator or engineer** can understand the *why*, not just the *what*, and safely resume work without tribal knowledge.

---

## 📌 How to Use This Folder

If you are resuming work on this project:

1. **Read files in numeric order**
2. Treat these documents as **source-of-truth**
3. Do **not** override decisions unless explicitly superseded by a newer checkpoint
4. When major milestones are reached, create a **new dated checkpoint folder**

---

## 📂 Contents Overview

### `01-SESSION-STATE.md`
High-level summary of where the project stands, what is complete, what is paused, and what is intentionally deferred.

---

### `02-BRAND-CONSTRAINTS.md`
Non-negotiable brand, trust, and psychology decisions that drive:
- Visual design
- Language/tone
- UX expectations
- Security posture

These constraints explain *why* certain aesthetic and architectural choices were made.

---

### `03-PHASE-1-ASSETS.md`
Defines **Phase 1 asset generation**:
- UI icons
- Badges
- Backgrounds
- Dividers
- Ops / Employee portal visuals

No human likeness. No guards. No identity risk.  
Assets must visually match approved mockups.

---

### `04-OPS-PORTAL-SCOPE.md`
Scope definition for the internal operations portal:
- What it does
- What it explicitly does **not** do (yet)
- Guardrails to prevent scope creep

---

### `05-EMPLOYEE-PORTAL-SCOPE.md`
Scope definition for the employee-facing portal:
- Document handling
- Compliance visibility
- Minimal UI expectations
- Future extensibility boundaries

---

### `06-BACKUP-ARCHITECTURE.md`
Canonical backup and disaster-recovery design:
- Encrypted backups
- S3 + Google Drive mirroring
- Retention strategy
- Rebuild expectations

This ensures **server loss is recoverable without panic**.

---

### `07-ASSET-DELIVERY-PLAN.md`
Defines how assets move through the system:
- Canonical asset root
- S3 structure
- Google Drive mirroring
- Server deployment paths
- Documentation consistency

This document exists to keep **assets boring, predictable, and auditable**.

---

### `08-NEXT-STEPS.md`
Concrete, minimal next actions:
- What is paused
- What resumes next
- What information is still required
- What is explicitly *not* being guessed

---

## 🧭 Canonical Truths (Read This First)

- Playbooks **00–14f are complete**
- Server: **Amazon Linux 2023**
- Hosting: **AWS (no GoDaddy)**
- Assets live in **S3**, mirrored to **Google Drive**
- Backups are **encrypted and automated**
- `playall.yml` rebuilds the system in correct order
- This project prioritizes **trust, clarity, and survivability**

---

## 🔐 Why This Exists

This checkpoint prevents:
- Context loss from long chat sessions
- Re-litigation of settled decisions
- Architecture drift
- Brand erosion
- Fragile, undocumented systems

If ChatGPT history disappears, **this folder is enough**.

---

## 🗂️ Future Checkpoints

When major milestones complete (e.g., Phase 1 assets finalized, Playbooks 15–18 implemented), create a new folder:

