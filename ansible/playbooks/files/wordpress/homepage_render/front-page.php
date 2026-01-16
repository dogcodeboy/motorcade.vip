<?php
/**
 * Motorcade Trust Theme — Custom Home (render-matched)
 *
 * Managed by Ansible Playbook 36.
 * Safe to re-run.
 */
get_header();

$asset_base = trailingslashit(get_stylesheet_directory_uri()) . 'assets/img/homepage_render/';
?>

<main id="primary" class="site-main mc-home">

  <section class="mc-hero" style="background-image:url('<?php echo esc_url($asset_base . 'hero.png'); ?>');">
    <div class="mc-hero__overlay" aria-hidden="true"></div>
    <div class="mc-hero__inner">
      <div class="mc-hero__content">
        <p class="mc-hero__eyebrow">Motorcade Security Solutions</p>
        <h1 class="mc-hero__title">Calm, Professional Security<br/>When Risk Changes Fast</h1>
        <p class="mc-hero__sub">
          Executive protection, armed security, and rapid response across Texas — licensed, insured, and operations-ready.
        </p>

        <div class="mc-hero__cta">
          <a class="mc-btn mc-btn--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Talk to Security</a>
          <a class="mc-btn mc-btn--ghost" href="#what-we-handle">What We Handle</a>
        </div>

        <div class="mc-hero__pills" role="list">
          <div class="mc-pill" role="listitem">
            <span class="mc-pill__icon mc-pill__icon--licensed" aria-hidden="true"></span>
            <span>Licensed &amp; insured</span>
          </div>
          <div class="mc-pill" role="listitem">
            <span class="mc-pill__icon mc-pill__icon--dispatch" aria-hidden="true"></span>
            <span>24/7 dispatch</span>
          </div>
          <div class="mc-pill" role="listitem">
            <span class="mc-pill__icon mc-pill__icon--rapid" aria-hidden="true"></span>
            <span>Rapid response</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mc-request" id="request">
    <div class="mc-container mc-request__grid">
      <div class="mc-request__copy">
        <h2>Request a security assessment</h2>
        <p>Tell us where, when, and the level of coverage you need. We respond with a clear plan and transparent pricing.</p>
        <ul class="mc-checklist">
          <li>On-demand or ongoing contracts</li>
          <li>Escalation and backup protocols</li>
          <li>Professional reporting when it matters</li>
        </ul>
        <a class="mc-btn mc-btn--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Start a conversation</a>
      </div>

      <div class="mc-request__cards">
        <article class="mc-card">
          <div class="mc-card__img" style="background-image:url('<?php echo esc_url($asset_base . 'card_licensed.png'); ?>');"></div>
          <div class="mc-card__body">
            <div class="mc-card__icon" aria-hidden="true"></div>
            <h3>Licensed &amp; insured</h3>
            <p>Compliance-forward, documentation-ready operations.</p>
          </div>
        </article>

        <article class="mc-card">
          <div class="mc-card__img" style="background-image:url('<?php echo esc_url($asset_base . 'card_rapid.png'); ?>');"></div>
          <div class="mc-card__body">
            <div class="mc-card__icon mc-card__icon--bolt" aria-hidden="true"></div>
            <h3>Rapid response</h3>
            <p>Escalation paths when conditions change.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="mc-risk" id="what-we-handle">
    <div class="mc-risk__bg" style="background-image:url('<?php echo esc_url($asset_base . 'section_risk_bg.png'); ?>');" aria-hidden="true"></div>
    <div class="mc-risk__overlay" aria-hidden="true"></div>

    <div class="mc-container">
      <div class="mc-risk__head">
        <span class="mc-badge">Operational Readiness</span>
        <h2>Built for real-world risk</h2>
        <p>We match the right team to the mission — then adapt as conditions change.</p>
      </div>

      <div class="mc-services">
        <article class="mc-service">
          <div class="mc-service__img" style="background-image:url('<?php echo esc_url($asset_base . 'service_armed.png'); ?>');"></div>
          <div class="mc-service__body">
            <h3>Armed Security</h3>
            <p>Visible deterrence and controlled access for facilities, events, and sites.</p>
            <a href="<?php echo esc_url(home_url('/services/')); ?>">Learn more →</a>
          </div>
        </article>

        <article class="mc-service">
          <div class="mc-service__img" style="background-image:url('<?php echo esc_url($asset_base . 'service_executive.png'); ?>');"></div>
          <div class="mc-service__body">
            <h3>Executive Protection</h3>
            <p>Discreet close protection, route planning, and situational management.</p>
            <a href="<?php echo esc_url(home_url('/executive-protection/')); ?>">Learn more →</a>
          </div>
        </article>

        <article class="mc-service">
          <div class="mc-service__img" style="background-image:url('<?php echo esc_url($asset_base . 'service_rapid.png'); ?>');"></div>
          <div class="mc-service__body">
            <h3>Rapid Response</h3>
            <p>Fast escalation when incidents evolve — backup and coordination ready.</p>
            <a href="<?php echo esc_url(home_url('/services/')); ?>">Learn more →</a>
          </div>
        </article>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
