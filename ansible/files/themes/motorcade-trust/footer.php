<?php
/**
 * Footer template
 *
 * Includes a required Texas DPS license line.
 */
?>
<footer class="site-footer">
  <div class="container">
    <div class="footer-row">
      <div class="footer-col">
        <div class="footer-meta">
          <div class="footer-copy">&copy; <?php echo esc_html( date('Y') ); ?> Motorcade Solutions</div>
          <div class="footer-tagline">Calm, professional security services focused on planning, discretion, and disciplined execution.</div>
          <div class="footer-license">Texas DPS License: <?php echo esc_html( '{{ dps_license_number }}' ); ?></div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
