# motorcade.vip

Infrastructure, automation, and operational documentation for the **Motorcade** website and platform.

This repository is the **authoritative source of truth** for how motorcade.vip is deployed, maintained, and recovered.

---

## 📌 Canonical Project State (Start Here)

If anything conflicts (including chat history), **these documents win**.

- **Latest checkpoint:**  
  `docs/checkpoints/2026-01-12/`

- **Phase 1 asset specification:**  
  `docs/assets/PHASE-1-ASSET-SPEC.md`

- **Phase 1 asset manifest:**  
  `assets/assets-manifest.json`

- **Canonical asset folder tree:**  
  `motorcade-assets/`

---

## 📸 Project Checkpoints

The authoritative project state is preserved in dated checkpoints.

- **Current:**  
  [`docs/checkpoints/2026-01-12`](docs/checkpoints/2026-01-12)

Use checkpoints when:
- Resuming work after downtime
- Validating configuration drift
- Auditing historical state

---

## 🛠 Maintenance Mode

Motorcade supports a **safe, nginx-level maintenance mode** that:

- Returns `503 Service Unavailable` to the public
- Keeps WordPress admin access available
- Does **not** modify WordPress core or plugins

➡ **How to use maintenance mode:**  
📄 [`docs/MAINTENANCE_MODE.md`](docs/MAINTENANCE_MODE.md)

---

## ⚙️ Provisioning & Automation

All provisioning, backup, restore, and operational automation lives under:

