from PIL import Image, ImageFilter
from pathlib import Path

SRC = Path('/mnt/data/user-r1cc89efAIs8cwYE9sOhTn9R/14e0850d361e4230acc77eee13c92c15/mnt/data/motorcade_assets_v1')
OUT = Path('/mnt/data/pb36_v2/ansible/playbooks/files/wordpress/homepage_render_v2/assets')
OUT.mkdir(parents=True, exist_ok=True)

ITEMS = {
    'hero': ('hq1.png', 2400),
    'assessment_licensed': ('q1.png', 1400),
    'assessment_rapid': ('q2.png', 1400),
    'service_armed': ('q1.png', 1600),
    'service_exec': ('q4.png', 1600),
    'service_rapid': ('q2.png', 1600),
}

def upscale_to_width(im: Image.Image, width: int) -> Image.Image:
    if im.width >= width:
        return im
    ratio = width / im.width
    new_size = (width, int(im.height * ratio))
    im2 = im.resize(new_size, Image.LANCZOS)
    # mild sharpening after upscaling
    im2 = im2.filter(ImageFilter.UnsharpMask(radius=2, percent=130, threshold=3))
    return im2

for name, (src_file, target_w) in ITEMS.items():
    p = SRC / src_file
    im = Image.open(p).convert('RGB')
    im = upscale_to_width(im, target_w)
    # save PNG
    png_path = OUT / f'{name}.png'
    im.save(png_path, format='PNG', optimize=True)
    # save WEBP
    webp_path = OUT / f'{name}.webp'
    im.save(webp_path, format='WEBP', quality=88, method=6)
    print(name, '->', im.size)

# Simple SVG icons (chips + feature blocks)
icons = {
    'icon_licensed': """<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M12 22s-7-4.35-7-11a4 4 0 0 1 7-2 4 4 0 0 1 7 2c0 6.65-7 11-7 11z'/></svg>""",
    'icon_dispatch': """<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M12 6v6l4 2'/><circle cx='12' cy='12' r='9'/></svg>""",
    'icon_rapid': """<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M13 2L3 14h9l-1 8 10-12h-9l2-8z'/></svg>""",
    'icon_shield': """<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M12 2l7 4v6c0 5-3 9-7 10-4-1-7-5-7-10V6l7-4z'/></svg>""",
    'icon_exec': """<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'/><circle cx='12' cy='7' r='4'/></svg>""",
}

(OUT / 'icons').mkdir(exist_ok=True)
for k, svg in icons.items():
    (OUT / 'icons' / f'{k}.svg').write_text(svg)
print('Wrote SVG icons')
