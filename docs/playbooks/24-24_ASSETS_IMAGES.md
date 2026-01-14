# Playbook 24 — Assets / Images

## Purpose
Deploys the Motorcade image pack to WordPress so the theme can load hero + service images from:

`wp-content/uploads/motorcade/`

## Source of truth (repo)
Images live on the controller in this path:

`motorcade.vip/ansible/files/wp/assets/images/motorcade/`

## Run
From the repo root:

```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/24_assets_images.yml
```

## Notes
- The theme references images by filename (e.g. `hero-executive-protection.jpg`).
- If you want these files registered in **Media → Library**, set `mc_import_media: true` in the playbook.
