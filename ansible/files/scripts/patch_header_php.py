#!/usr/bin/env python3
"""Patch a WordPress theme header.php to consolidate branding inline with navigation.

Idempotent behavior:
- If the marker 'MOTORCADE_PLAYBOOK_32' exists, no changes are made.

Heuristics (safe, best-effort):
1) Ensure there is exactly one inline logo call near the primary nav menu.
2) Remove (comment out) other occurrences of the_custom_logo()/get_custom_logo() output
   to suppress duplicate Site Identity rendering.

This avoids wp-admin changes and keeps everything file-based + Ansible-managed.
"""

from __future__ import annotations

import re
import sys
from pathlib import Path

MARKER_BEGIN = "<!-- MOTORCADE_PLAYBOOK_32: BEGIN INLINE BRANDING -->"
MARKER_END = "<!-- MOTORCADE_PLAYBOOK_32: END INLINE BRANDING -->"

INLINE_BLOCK = "\n".join(
    [
        MARKER_BEGIN,
        "<?php if ( function_exists('the_custom_logo') && has_custom_logo() ) : ?>",
        "  <div class=\"motorcade-brand-inline\"><?php the_custom_logo(); ?></div>",
        "<?php endif; ?>",
        MARKER_END,
    ]
)


def read_text(p: Path) -> str:
    return p.read_text(encoding="utf-8", errors="replace")


def write_text(p: Path, s: str) -> None:
    p.write_text(s, encoding="utf-8")


def already_patched(s: str) -> bool:
    return "MOTORCADE_PLAYBOOK_32" in s


def remove_other_logo_calls(s: str) -> str:
    """Comment out logo output calls, except inside our inline block."""

    # Protect our inserted block from later replacements.
    protected = []

    def _protect(m: re.Match) -> str:
        protected.append(m.group(0))
        return f"__MOTORCADE_BLOCK_{len(protected)-1}__"

    s2 = re.sub(
        re.escape(MARKER_BEGIN) + r".*?" + re.escape(MARKER_END),
        _protect,
        s,
        flags=re.DOTALL,
    )

    # Comment out direct calls to the_custom_logo();
    s2 = re.sub(
        r"(?<!/)\bthe_custom_logo\s*\(\s*\)\s*;",
        "/* removed by Playbook 32: duplicate logo */",
        s2,
    )

    # Replace echo get_custom_logo(); patterns.
    s2 = re.sub(
        r"echo\s+get_custom_logo\s*\(\s*\)\s*;",
        "/* removed by Playbook 32: duplicate logo */",
        s2,
    )

    # Restore protected block.
    for i, block in enumerate(protected):
        s2 = s2.replace(f"__MOTORCADE_BLOCK_{i}__", block)

    return s2


def insert_inline_block_near_nav(s: str) -> str:
    """Insert INLINE_BLOCK as close as possible to wp_nav_menu call."""

    # Find the first wp_nav_menu(...) call.
    m = re.search(r"\bwp_nav_menu\s*\(", s)
    if not m:
        # If we can't find a nav, we still patch by inserting block near <header>.
        hm = re.search(r"<header\b[^>]*>", s, flags=re.IGNORECASE)
        if hm:
            idx = hm.end()
            return s[:idx] + "\n" + INLINE_BLOCK + s[idx:]
        # No good anchor; append at top with a warning comment.
        return (
            "<?php /* MOTORCADE_PLAYBOOK_32: wp_nav_menu not found; inserted at file top */ ?>\n"
            + INLINE_BLOCK
            + "\n"
            + s
        )

    # Walk backwards to find a containing element open tag before the menu.
    before = s[: m.start()]
    # Prefer inserting inside a <nav ...> if one exists immediately before.
    nav_open = list(re.finditer(r"<nav\b[^>]*>", before, flags=re.IGNORECASE))
    if nav_open:
        idx = nav_open[-1].end()
        return s[:idx] + "\n" + INLINE_BLOCK + s[idx:]

    # Otherwise, insert right before the wp_nav_menu call.
    idx = m.start()
    return s[:idx] + INLINE_BLOCK + "\n" + s[idx:]


def main() -> int:
    if len(sys.argv) != 3:
        print("Usage: patch_header_php.py <input_header.php> <output_header.php>")
        return 2

    src = Path(sys.argv[1])
    dst = Path(sys.argv[2])

    s = read_text(src)

    if already_patched(s):
        write_text(dst, s)
        print("NOOP: already contains MOTORCADE_PLAYBOOK_32")
        return 0

    # Insert inline branding block
    s2 = insert_inline_block_near_nav(s)

    # Add a stable marker token so we can detect idempotence.
    if "MOTORCADE_PLAYBOOK_32" not in s2:
        s2 = s2.replace(
            MARKER_BEGIN,
            "<!-- MOTORCADE_PLAYBOOK_32 -->\n" + MARKER_BEGIN,
            1,
        )

    # Remove other logo call sites to prevent duplicates
    s2 = remove_other_logo_calls(s2)

    write_text(dst, s2)
    print("PATCHED")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
