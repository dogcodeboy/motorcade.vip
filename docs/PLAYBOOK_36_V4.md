# Playbook 36 (V4) — Homepage Render + DPS License Footer

This package fixes PB36 so the homepage matches the approved render and remains responsive.

## What it changes

- Deploys a custom `front-page.php` (render-matched layout).
- Deploys `assets/homepage_render_v2.css` and loads it from the template.
- Copies the render image assets into the theme.
- Injects a DPS license line into the footer that only shows when you set a value.

## Files added/overwritten in the repo

- `ansible/playbooks/36_homepage_render_assets_and_footer_license.yml`
- `ansible/playbooks/files/wordpress/homepage_render_v2/**`

## How to run

From the repo root:

```bash
# Unzip this package on top of the repo
unzip -o ~/Downloads/playbook_36_homepage_render_assets_and_footer_license_v4.zip -d .

# Run the playbook
ansible-playbook \
  -i ansible/inventories/prod/hosts.ini \
  ansible/playbooks/36_homepage_render_assets_and_footer_license.yml \
  --ask-vault-pass
```

## Setting the DPS license number

Set `dps_license_number` in your inventory (recommended in `ansible/inventories/prod/group_vars/all.yml` or the host vars file):

```yaml
dps_license_number: "YOUR_DPS_LICENSE_NUMBER"
```

If you do not set it, the footer will not show a placeholder.

## Notes

- Image assets are deployed to: `<theme>/assets/homepage/assets/`.
- If your active theme directory name is different than `trust`, update `theme_dir` in the playbook vars accordingly.
