/* Motorcade Trust Theme — DOM enhancements

   Purpose:
   - Gutenberg markup varies between WP versions and editor patterns.
   - CSS fixes need a stable hook.
   - Find the section that contains the heading "Built for real-world risk" and add class "mc-risk".

   Safety:
   - No dependencies.
   - Only adds a CSS class if not already present.
*/

(function () {
  function normalize(s) {
    return (s || '').replace(/\s+/g, ' ').trim().toLowerCase();
  }

  function closestBlockContainer(el) {
    // Prefer Gutenberg block containers that typically wrap a section.
    var candidates = [
      '.wp-block-cover',
      '.wp-block-group',
      '.wp-block-columns',
      '.wp-block-media-text',
      '.wp-block-template-part'
    ];

    for (var i = 0; i < candidates.length; i++) {
      var found = el.closest(candidates[i]);
      if (found) return found;
    }
    return null;
  }

  function applyRiskHook() {
    var target = 'built for real-world risk';
    var headings = document.querySelectorAll('h1, h2, h3, h4');

    for (var i = 0; i < headings.length; i++) {
      var h = headings[i];
      if (normalize(h.textContent) !== target) continue;

      var section = closestBlockContainer(h);
      if (!section) continue;

      if (!section.classList.contains('mc-risk')) {
        section.classList.add('mc-risk');
      }

      // Also add a hint class on the body for debugging / scoping if needed.
      if (!document.body.classList.contains('mc-has-risk')) {
        document.body.classList.add('mc-has-risk');
      }

      // Only need the first match.
      break;
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', applyRiskHook);
  } else {
    applyRiskHook();
  }
})();
