# motorcade.vip
Website + hosting repo for Motorcade (AWS / Amazon Linux 2023)

## ✅ Start Here (Canonical State)
Authoritative project state is preserved in dated checkpoints.

- **Latest checkpoint:** `docs/checkpoints/2026-01-12/`

If chat history conflicts with checkpoint docs, the checkpoint docs win.

---

## 🛠 Maintenance Mode (nginx-level)
Maintenance mode returns `503 Service Unavailable` for the public while keeping WordPress admin access available.

➡ How to use: `docs/MAINTENANCE_MODE.md`

---

## 🎨 WordPress Theme
Primary theme for restoring the site’s appearance:

- Theme: **Motorcade Trust** (`wp-content/themes/motorcade-trust`)

---

## 📦 Automation / Provisioning
See `ansible/` for provisioning and deployment playbooks.

If you are resuming work, start there.
