STEP 24/25 FIX — Correct host group + repo structure

What this ZIP contains
- motorcade.vip/ansible/playbooks/24_assets_images.yml
- motorcade.vip/ansible/playbooks/25_contact_form.yml

What changed
- hosts: motorcade (matches inventories/prod/hosts.ini in your repo)
- Playbook 24 deploys assets to:
    /var/www/motorcade/wp-content/uploads/motorcade/
  with nginx:nginx ownership (matches your earlier filesystem playbooks)

After you unzip and drag/drop one level above repo root
- Commit in GitKraken
- Run from repo root:
    cd ~/Repos/motorcade.vip
    ansible-playbook -i ansible/inventories/prod/hosts.ini ansible/playbooks/24_assets_images.yml
    ansible-playbook -i ansible/inventories/prod/hosts.ini ansible/playbooks/25_contact_form.yml
