# Playbook 22 — Theme Presentation Update

## Purpose
Updates the `motorcade-trust` WordPress theme to match the intended mockup look:
- Clean header/nav layout
- Button styling for CTAs
- Consistent spacing/typography
- Front-page template support (`front-page.php`)
- Registers `primary` menu location so Playbook 20 menu assignment works

## Files
- Theme bundle: `ansible/files/wp/themes/motorcade-trust-theme.zip`
- Playbook: `ansible/playbooks/22_theme_presentation_update.yml`

## Run
```bash
cd ansible
ansible-playbook playbooks/22_theme_presentation_update.yml
```

## Verify
- Homepage hero spacing and buttons render cleanly
- Primary menu appears in header
- No raw markdown symbols (`#`) appear (handled by Playbook 21)
