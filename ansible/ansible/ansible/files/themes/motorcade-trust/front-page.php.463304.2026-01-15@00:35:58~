<?php
/**
 * Motorcade Trust — Front Page
 * Managed by Ansible (Playbook 27). Do not edit directly on server.
 */
get_header();

$upload = wp_upload_dir();
$asset_base = trailingslashit($upload['baseurl']) . 'motorcade/';
$phase1 = $asset_base . 'phase1/';
?>

<main id="primary" class="mc-site">

  <!-- HERO -->
  <section class="mc-hero" style="background-image:
      linear-gradient(180deg, rgba(7,10,16,.85), rgba(7,10,16,.55)),
      url('<?php echo esc_url($asset_base . 'hero-executive-protection.jpg'); ?>');">
    <div class="mc-wrap">
      <div class="mc-hero__content">
        <div class="mc-kicker">Motorcade Security Solutions</div>
        <h1 class="mc-hero__title">Professional Armed Security, Executive Protection, and Rapid Response</h1>
        <p class="mc-hero__subtitle">Licensed, insured, and operations‑ready across Texas. Clear communication. On‑time arrival. Verified professionals.</p>
        <div class="mc-hero__cta">
          <a class="mc-btn mc-btn--primary" href="/contact/">Request Coverage</a>
          <a class="mc-btn mc-btn--ghost" href="#services">View Services</a>
        </div>

        <div class="mc-badges" aria-label="Trust badges">
          <img class="mc-badge" alt="Licensed & insured" src="<?php echo esc_url($phase1 . 'badges/svg/licensed-insured.svg'); ?>" loading="lazy">
          <img class="mc-badge" alt="Rapid response" src="<?php echo esc_url($phase1 . 'badges/svg/rapid-response.svg'); ?>" loading="lazy">
          <img class="mc-badge" alt="Background checked" src="<?php echo esc_url($phase1 . 'badges/svg/background-checked.svg'); ?>" loading="lazy">
          <img class="mc-badge" alt="Texas compliant" src="<?php echo esc_url($phase1 . 'badges/svg/texas-compliant.svg'); ?>" loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="services" class="mc-section">
    <div class="mc-wrap">
      <header class="mc-section__header">
        <h2>Security Services Built for Real‑World Risk</h2>
        <p>On‑demand coverage or ongoing contracts. We match the right team to the mission, with escalation paths when conditions change.</p>
      </header>

      <div class="mc-grid">
        <article class="mc-card">
          <img src="<?php echo esc_url($asset_base . 'services-executive.jpg'); ?>" alt="Executive protection" loading="lazy">
          <div class="mc-card__body">
            <h3>Executive Protection</h3>
            <p>Discreet protection for principals, families, and high‑value travel with proactive threat awareness.</p>
          </div>
        </article>

        <article class="mc-card">
          <img src="<?php echo esc_url($asset_base . 'services-transport.jpg'); ?>" alt="Armed transport & escort" loading="lazy">
          <div class="mc-card__body">
            <h3>Armed Transport & Escort</h3>
            <p>Secure vehicle escorts, route coordination, and rapid support for drivers and crews.</p>
          </div>
        </article>

        <article class="mc-card">
          <img src="<?php echo esc_url($asset_base . 'services-site-security.jpg'); ?>" alt="Site & event security" loading="lazy">
          <div class="mc-card__body">
            <h3>Site & Event Security</h3>
            <p>Visible deterrence, access control, and incident reporting for venues, businesses, and special events.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- TRUST / ABOUT -->
  <section class="mc-section mc-section--muted">
    <div class="mc-wrap mc-split">
      <div class="mc-split__media">
        <img src="<?php echo esc_url($asset_base . 'about-team.jpg'); ?>" alt="Professional security team" loading="lazy">
      </div>
      <div class="mc-split__content">
        <h2>Trust, Accountability, and Clear Command</h2>
        <p>We operate with documented procedures, professional communications, and measurable response. Our team is built for calm execution under pressure.</p>
        <ul class="mc-list">
          <li>Professional appearance and conduct</li>
          <li>Clear escalation and backup protocols</li>
          <li>Shift overlap and handoff discipline</li>
          <li>Incident documentation when it matters</li>
        </ul>

        <div class="mc-inline-cta">
          <a class="mc-btn mc-btn--primary" href="/contact/">Talk to Dispatch</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA BAND -->
  <section class="mc-cta" style="background-image:
      linear-gradient(180deg, rgba(7,10,16,.88), rgba(7,10,16,.55)),
      url('<?php echo esc_url($asset_base . 'cta-contact.jpg'); ?>');">
    <div class="mc-wrap">
      <h2>Need coverage tonight or building a long‑term plan?</h2>
      <p>Tell us what you’re protecting, where, and when. We’ll respond with a clear plan and transparent pricing.</p>
      <a class="mc-btn mc-btn--primary" href="/contact/">Request Coverage</a>
    </div>
  </section>

  <!-- PAGE CONTENT (editable in WP Admin) -->
  <section class="mc-section">
    <div class="mc-wrap mc-content">
      <?php
      while ( have_posts() ) :
        the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>
