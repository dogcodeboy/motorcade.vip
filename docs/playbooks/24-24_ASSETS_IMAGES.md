# 24 — Assets Images

## Purpose
Deploy the Motorcade marketing image assets to the WordPress uploads directory **and** (optionally) make them usable by the theme.

This playbook copies images from the repo to the server at:

- `/var/www/motorcade/wp-content/uploads/motorcade/`

The **Motorcade Trust** theme will render images from this folder automatically, even if they are not imported into the Media Library. If you also import them into Media, the theme will prefer the Media Library URL.

## Inputs
Repo source (controller):

- `ansible/files/wp/assets/images/motorcade/` *(preferred)*
- or `ansible/files/wp/assets/motorcade-assets.zip` (if you keep the assets zipped and unzip first)

Server destination:

- `/var/www/motorcade/wp-content/uploads/motorcade/`

## Run
From `~/Repos/motorcade.vip/ansible`:

```bash
ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/24_assets_images.yml
```

## Notes
- This playbook is **idempotent**; re-running is safe.
- If you want the images to appear in WP Admin → Media, you must import them (WP does not auto-scan upload folders).
  - Example (on the server, as the web user):
    ```bash
    sudo -u nginx wp --path=/var/www/motorcade media import /var/www/motorcade/wp-content/uploads/motorcade/* --title-from-filename
    ```
