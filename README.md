## 📌 Project Checkpoints (Authoritative State Tracking)

This repository uses **formal checkpoints** to preserve working state, prevent regressions,
and allow safe session handoffs when changes become complex (themes, Ansible, infrastructure).

⚠️ **Always read the latest checkpoint before making changes.**

### ✅ Latest Checkpoint (ACTIVE)
**📂 docs/checkpoints/2026-01-16/**  
Status:
- Site ONLINE and stable
- Gutenberg risk section fixed and locked
- Header/logo issue isolated and unresolved by design
- Emergency rollback archive verified
- Safe handoff created before logo repair to prevent regressions

➡️ This is the **current source of truth**.

---

### Previous Checkpoints
- **docs/checkpoints/2026-01-12/**  
  Initial stabilization, early theme + Ansible groundwork

---

### Rules
- One playbook per session unless fixes must be coupled
- Always checkpoint before visual or theme changes
- Never apply global CSS for section-specific fixes
- Header/logo fixes must be isolated to `header.php` only


## Ops Runbooks
- **Emergency Theme Backup/Restore** (server-side hard rollback): [docs/runbooks/emergency_theme_restore.md](docs/runbooks/emergency_theme_restore.md)

## Reference
- [Server & Repo Paths](docs/reference/server-paths.md)

## Emergency Operations

- 🔒 **Emergency Theme Backup & Restore**  
  See `docs/ops/emergency-theme-restore.md` for the server-side rollback procedure.
