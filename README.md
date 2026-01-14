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
ansible/


If you are resuming work or deploying changes, **start there**.

---

## 🧰 Operations & Maintenance

Key operational documentation:

- 🔧 **Maintenance Mode**  
  `docs/MAINTENANCE_MODE.md`

- 📸 **System Checkpoints**  
  `docs/checkpoints/`

- 💾 **Backups & Recovery**  
  - Playbook 16: `docs/playbooks/16-BACKUPS.md`  
  - Playbook 17: `docs/playbooks/17-RESTORE-DR.md`

Optional actions (such as enabling nightly backups) are clearly labeled inside the playbooks.

---

## 🧭 Working Rules

- This repo is **production-facing**
- Do not modify live systems without:
  - A corresponding playbook
  - A checkpoint reference
- When in doubt, restore from checkpoint before proceeding

---

**Motorcade Operations are designed to be:**
- Predictable
- Recoverable
- Auditable

