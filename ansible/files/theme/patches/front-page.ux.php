<?php
/**
 * Motorcade Trust — Front Page (UX Polish)
 * Managed by Ansible (Playbook 28). Do not edit directly on server.
 */
get_header();

$upload = wp_upload_dir();
$asset_base = trailingslashit($upload['baseurl']) . 'motorcade/';
$phase1 = $asset_base . 'phase1/';
?>

<main id="primary" class="mc-site">

  <!-- HERO -->
  <section class="mc-hero" style="background-image:
      linear-gradient(180deg, rgba(7,10,16,.88), rgba(7,10,16,.40)),
      url('<?php echo esc_url($asset_base . 'hero-executive-protection.jpg'); ?>');">
    <div class="mc-wrap">
      <div class="mc-hero__grid">
        <div class="mc-hero__content">
          <div class="mc-kicker">Motorcade Security Solutions</div>
          <h1 class="mc-hero__title">Calm, Professional Security When Risk Changes Fast</h1>
          <p class="mc-hero__subtitle">
            Executive protection, armed security, and rapid response across Texas — licensed, insured, and operations‑ready.
          </p>

          <div class="mc-hero__cta">
            <a class="mc-btn mc-btn--primary" href="/contact/">Request Coverage</a>
            <a class="mc-btn mc-btn--ghost" href="#services">Explore Services</a>
          </div>

          <div class="mc-badges" aria-label="Trust badges">
            <figure class="mc-badge">
              <img alt="Licensed & insured" src="<?php echo esc_url($phase1 . 'badges/svg/licensed-insured.svg'); ?>" loading="lazy">
              <figcaption>Licensed &amp; insured</figcaption>
            </figure>
            <figure class="mc-badge">
              <img alt="Background checked" src="<?php echo esc_url($phase1 . 'badges/svg/background-checked.svg'); ?>" loading="lazy">
              <figcaption>Background checked</figcaption>
            </figure>
            <figure class="mc-badge">
              <img alt="24/7 dispatch" src="<?php echo esc_url($phase1 . 'badges/svg/24-7-dispatch.svg'); ?>" loading="lazy">
              <figcaption>24/7 dispatch</figcaption>
            </figure>
            <figure class="mc-badge">
              <img alt="Rapid response" src="<?php echo esc_url($phase1 . 'badges/svg/rapid-response.svg'); ?>" loading="lazy">
              <figcaption>Rapid response</figcaption>
            </figure>
          </div>
        </div>

        <aside class="mc-hero__panel" aria-label="Quick request">
          <div class="mc-panel">
            <h2 class="mc-panel__title">Request a security assessment</h2>
            <p class="mc-panel__text">Tell us <strong>where</strong>, <strong>when</strong>, and the level of coverage you need. We respond with a clear plan and transparent pricing.</p>
            <ul class="mc-panel__list">
              <li><span class="mc-dot"></span>On‑demand or ongoing contracts</li>
              <li><span class="mc-dot"></span>Escalation and backup protocols</li>
              <li><span class="mc-dot"></span>Professional reporting when it matters</li>
            </ul>
            <a class="mc-btn mc-btn--primary mc-btn--block" href="/contact/">Start Request</a>
          </div>
        </aside>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="services" class="mc-section">
    <div class="mc-wrap">
      <header class="mc-section__header">
        <h2>Services built for real‑world risk</h2>
        <p>We match the right team to the mission — then adapt as conditions change.</p>
      </header>

      <div class="mc-grid">
        <article class="mc-card">
          <img src="<?php echo esc_url($asset_base . 'services-executive.jpg'); ?>" alt="Executive protection" loading="lazy">
          <div class="mc-card__body">
            <h3>Executive Protection</h3>
            <p>Discreet, proactive protection for principals, families, and travel — with calm command and clear comms.</p>
          </div>
        </article>

        <article class="mc-card">
          <img src="<?php echo esc_url($asset_base . 'services-site-security.jpg'); ?>" alt="Site and event security" loading="lazy">
          <div class="mc-card__body">
            <h3>Armed Security</h3>
            <p>Visible deterrence, access control, and incident response for businesses, venues, and special events.</p>
          </div>
        </article>

        <article class="mc-card">
          <img src="<?php echo esc_url($asset_base . 'services-transport.jpg'); ?>" alt="Armed transport and escort" loading="lazy">
          <div class="mc-card__body">
            <h3>Escort &amp; Transport</h3>
            <p>Secure escorts, route coordination, and rapid support for drivers, crews, and high‑value movements.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- PROCESS -->
  <section class="mc-section mc-section--muted">
    <div class="mc-wrap">
      <header class="mc-section__header">
        <h2>How it works</h2>
        <p>Simple on the surface. Professional underneath.</p>
      </header>

      <div class="mc-steps">
        <div class="mc-step">
          <div class="mc-step__icon"><img alt="" src="<?php echo esc_url($phase1 . 'icons/svg/clipboard.svg'); ?>" loading="lazy"></div>
          <h3>1) Request</h3>
          <p>Share location, timing, and what you’re protecting. We clarify requirements quickly.</p>
        </div>
        <div class="mc-step">
          <div class="mc-step__icon"><img alt="" src="<?php echo esc_url($phase1 . 'icons/svg/shield.svg'); ?>" loading="lazy"></div>
          <h3>2) Plan</h3>
          <p>We assign the right personnel, define escalation paths, and confirm comms.</p>
        </div>
        <div class="mc-step">
          <div class="mc-step__icon"><img alt="" src="<?php echo esc_url($phase1 . 'icons/svg/radio.svg'); ?>" loading="lazy"></div>
          <h3>3) Execute</h3>
          <p>On‑time arrival, steady presence, and documented reporting when needed.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TRUST / ABOUT -->
  <section class="mc-section">
    <div class="mc-wrap mc-split">
      <div class="mc-split__media">
        <img src="<?php echo esc_url($asset_base . 'about-team.jpg'); ?>" alt="Professional security team" loading="lazy">
      </div>
      <div class="mc-split__content">
        <h2>Trust is built by discipline</h2>
        <p>Professional communications. Measurable response. Calm execution under pressure — without drama.</p>
        <ul class="mc-list">
          <li>Clear escalation and backup protocols</li>
          <li>Shift overlap and structured handoff</li>
          <li>Client‑ready incident documentation</li>
          <li>Professional appearance and conduct</li>
        </ul>

        <div class="mc-inline-cta">
          <a class="mc-btn mc-btn--primary" href="/contact/">Talk to Dispatch</a>
          <a class="mc-btn mc-btn--ghost" href="/services/">View All Services</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA BAND -->
  <section class="mc-cta" style="background-image:
      linear-gradient(180deg, rgba(7,10,16,.92), rgba(7,10,16,.50)),
      url('<?php echo esc_url($asset_base . 'cta-contact.jpg'); ?>');">
    <div class="mc-wrap">
      <h2>Need coverage tonight or building a long‑term plan?</h2>
      <p>Tell us what you’re protecting, where, and when. We respond with a clear plan and transparent pricing.</p>
      <a class="mc-btn mc-btn--primary" href="/contact/">Request Coverage</a>
    </div>
  </section>

</main>

<?php get_footer(); ?>
