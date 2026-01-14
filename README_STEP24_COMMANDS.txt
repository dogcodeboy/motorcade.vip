STEP 24 — Run Commands (with Vault Prompt)

From repo root:

  cd ~/Repos/motorcade.vip/ansible

Run Step 24 (assets):

  ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/24_assets_images.yml

Run Step 25 (contact placeholder):

  ansible-playbook -i inventories/prod/hosts.ini --ask-vault-pass playbooks/25_contact_form.yml

Tip: If you want to view inventory/groups and it previously errored about vault,
add --ask-vault-pass:

  ansible-inventory -i inventories/prod/hosts.ini --ask-vault-pass --list | head
