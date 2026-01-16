  </div>
</main>

<footer class="mc-footer">
  <div class="mc-container" style="display:flex;gap:12px;flex-wrap:wrap;align-items:flex-start;justify-content:space-between;">
    <div>
      <div>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?></div>
      <div class="mc-footer-note">Calm, professional security services focused on planning, discretion, and disciplined execution.</div>
    </div>
    <div>
      <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'container' => false,
          'fallback_cb' => '__return_false',
          'items_wrap' => '<span>%3$s</span>',
          'depth' => 1,
        ));
      ?>
    </div>
  </div>
  <!-- Footer is intentionally minimal on the public site. -->
</footer>

<?php wp_footer(); ?>
</body>
</html>
