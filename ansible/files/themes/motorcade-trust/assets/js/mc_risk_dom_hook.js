/* Motorcade: Risk section DOM hook (36o)
   Purpose: add a stable `.mc-risk` class to the Gutenberg container that holds
   the "Built for real-world risk" section so CSS can target it reliably.
   Safety: NEVER applies to <body> or broad wrappers; only the nearest block container.
*/
(function () {
  function norm(s) {
    return (s || '').replace(/\s+/g, ' ').trim().toLowerCase();
  }

  function findHeading() {
    var nodes = document.querySelectorAll('h1,h2,h3');
    for (var i = 0; i < nodes.length; i++) {
      if (norm(nodes[i].textContent) === 'built for real-world risk') {
        return nodes[i];
      }
    }
    return null;
  }

  function nearestContainer(el) {
    var selectors = [
      '.wp-block-cover',
      '.wp-block-group',
      '.wp-block-columns',
      'section',
      'main'
    ];
    for (var i = 0; i < selectors.length; i++) {
      var c = el.closest(selectors[i]);
      if (c && c !== document.body && c !== document.documentElement) {
        // If we hit <main>, prefer a closer Gutenberg container inside it if possible.
        if (selectors[i] === 'main') {
          var inner = el.closest('.wp-block-cover, .wp-block-group, .wp-block-columns, section');
          if (inner && inner !== document.body && inner !== document.documentElement) {
            return inner;
          }
        }
        return c;
      }
    }
    return null;
  }

  function apply() {
    var h = findHeading();
    if (!h) return;
    var c = nearestContainer(h);
    if (!c) return;
    // Guardrail: do not apply to giant page wrappers.
    if (c.classList.contains('site') || c.classList.contains('site-content')) return;

    c.classList.add('mc-risk');
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', apply);
  } else {
    apply();
  }
})();
