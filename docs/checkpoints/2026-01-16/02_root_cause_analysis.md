# Root Cause Analysis — Risk Section Readability

## What was happening
- The "Built for real-world risk" section is built with **Gutenberg blocks**.
- Earlier playbooks injected CSS that targeted a class selector (for example `.mc-risk`).
- The live markup coming from the page content did **not** include that class, so those CSS rules were present in `style.css` but effectively matched nothing.

## The fix that worked
We switched to a two-part, low-risk approach:
1) Add a **tiny DOM hook** JS that finds the Gutenberg container that contains the heading text "Built for real-world risk" and adds a stable class (`mc-risk`) to the correct wrapper.
2) Inject CSS scoped under `.mc-risk` to apply safer foreground colors, subtle shadows, and a light glass overlay only inside that section.

## What caused the "giant icons" regression
One of the earlier attempts overwrote or replaced large theme CSS blocks rather than doing a small scoped injection. That unintentionally changed global icon sizing and other shared theme styles.

## Related issue to keep in mind
Inventory/group naming: your inventory has a group named `motorcade_web` (underscore). If a playbook or run uses `motorcade-web` (hyphen), Ansible prints "no hosts matched" and nothing runs.
