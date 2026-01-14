# Motorcade Maintenance Mode

## 🔧 Turn maintenance ON
```bash
sudo touch /etc/nginx/motorcade_maintenance_on
sudo systemctl reload nginx
```

## ✅ Turn maintenance OFF
```bash
sudo rm -f /etc/nginx/motorcade_maintenance_on
sudo systemctl reload nginx
```

---

Maintenance Mode is implemented at the **nginx level**.

- Public traffic receives **HTTP 503**
- A custom maintenance page is shown
- `/wp-admin` and `/wp-login.php` remain accessible
- No WordPress files or deployments are affected
