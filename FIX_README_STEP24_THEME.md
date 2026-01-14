# Step 24 Patch (Theme + Assets + Playbooks)

This patch adds:
- `ansible/playbooks/24_assets_images.yml` (deploy images to uploads/motorcade)
- `ansible/files/wp/assets/images/motorcade/*.jpg` (image pack)
- `ansible/files/wp/themes/motorcade-trust-theme.zip` (theme updated to load images from uploads/motorcade)
- `docs/playbooks/*` docs for steps 24–25

## Apply
Extract into: `/home/codeboy/Repos`

After extract, run:

```bash
cd ~/Repos/motorcade.vip/ansible
ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/24_assets_images.yml
```

Then ensure WordPress is using the updated theme zip (deployed via your theme playbook or installed in WP Admin):
- **Appearance → Themes** → activate **Motorcade Trust**
- If you use a static homepage, set it under **Settings → Reading**.
