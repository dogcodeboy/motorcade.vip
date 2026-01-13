    Motorcade — Ansible Fix (roles_path + stdout_callback)

    What was broken
    - ansible/ansible.cfg set stdout_callback=yaml, but your Ansible install doesn't include the 'yaml' callback plugin.
    - ansible/ansible.cfg did not set roles_path, so Ansible couldn't find roles in ansible/roles when running playbooks in ansible/playbooks.

    What this fixes
    - Sets stdout_callback=default (compatible everywhere)
    - Sets roles_path=./roles so playbook roles resolve cleanly

    How to apply
    1) From your repo root:
       cp -v ansible/ansible.cfg ansible/ansible.cfg.bak

    2) Replace ansible/ansible.cfg with the one in this zip.

    3) Run Playbook 14g from the ansible directory:
       cd ansible
       ansible-playbook -i inventories/prod/hosts.ini playbooks/14g-maintenance-site.yml

    Diff
    --- ansible/ansible.cfg (old)
+++ ansible/ansible.cfg (new)
@@ -1,9 +1,17 @@
 [defaults]
 # Run playbooks from the ./ansible directory for deterministic relative paths.
+# Default inventory points at prod.example to prevent accidental production runs.
 inventory = inventories/prod.example/hosts.ini
 retry_files_enabled = False
 host_key_checking = True
-stdout_callback = yaml
+
+# Fix: the 'yaml' callback is not available in your current Ansible install.
+# Use 'default' for broad compatibility.
+stdout_callback = default
+
+# Fix: ensure roles in ./roles are discoverable when playbooks are in ./playbooks.
+roles_path = ./roles
+
 interpreter_python = auto_silent

 [ssh_connection]

