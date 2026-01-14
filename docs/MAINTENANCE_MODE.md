# Motorcade Maintenance Mode

## 🚨 Quick Toggle (Production)

### Enable maintenance
```bash
sudo touch /etc/nginx/motorcade_maintenance_on
sudo nginx -t && sudo systemctl reload nginx

# Motorcade Maintenance Mode

This document explains how to safely enable and disable **Maintenance Mode**
for the Motorcade platform.

Maintenance Mode is implemented at the **nginx level** and:
- Returns **HTTP 503** to public traffic
- Displays a custom maintenance page
- Keeps `/wp-admin` and `/wp-login.php` accessible
- Does **not** break deployments or WordPress internals

---

## 🔁 How Maintenance Mode Works

Maintenance mode is controlled by the presence of a **flag file**:

/etc/nginx/motorcade_maintenance_on
