# What We Tried (History)

This session series attempted multiple approaches before landing on the working solution (37c):

1. Narrowing/selectors-only CSS patches (prevent over-broad brandbar selectors from hiding logo)
2. Defensive “logo visibility override” blocks appended to `style.css`
3. Attempts to normalize brandbar / site identity conflicts
4. Multiple iterations of Playbook 37/37a/37b that failed due to:
   - inventory host pattern mismatch (skipped: no hosts matched)
   - Ansible module/action syntax errors (`archive` action resolution)

**37c resolved the Ansible errors and applied the authoritative CSS patch successfully.**
