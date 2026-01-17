# Playbooks and Artifacts Produced (Session)

A number of iterative 36x patches were generated while chasing two issues: risk-section readability and header logo restore.

## What mattered by the end
- **Risk section readability (working):** implemented via a **scoped CSS + small DOM hook JS** approach ("safe inject") so we don't overwrite whole theme files.
- **Header logo restore (not yet applied successfully):** pending because earlier attempts failed due to Ansible path resolution and/or inventory host-pattern mismatches.

## The two most important failure modes to avoid
1) **Full-file overwrites** of theme files (can trigger the "giant icons" regression).
2) Running `ansible-playbook` with a host pattern that does not exist (example warning: `Could not match supplied host pattern, ignoring: motorcade-web`).
