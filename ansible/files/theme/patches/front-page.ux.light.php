<?php
/**
 * Motorcade Trust Theme — Front Page (UX Light + Responsive)
 * Managed by Ansible (Playbook 28b). Do not edit manually.
 */
get_header();
?>

<main class="mc-page">

  <!-- HERO (dark, controlled) -->
  <section class="mc-hero" aria-label="Motorcade hero">
    <div class="mc-hero__inner">
      <p class="mc-eyebrow">MOTORCADE SECURITY SOLUTIONS</p>
      <h1 class="mc-h1">Calm, Professional Security<br>When Risk Changes Fast</h1>
      <p class="mc-subhead">
        Executive protection, armed security, and rapid response across Texas — licensed, insured, and operations-ready.
      </p>

      <div class="mc-ctaRow">
        <a class="mc-btn mc-btn--primary" href="/contact">Request Coverage</a>
        <a class="mc-btn mc-btn--ghost" href="/services">Explore Services</a>
      </div>

      <div class="mc-hero__meta">
        <div class="mc-chip">Licensed &amp; insured</div>
        <div class="mc-chip">24/7 dispatch</div>
        <div class="mc-chip">Rapid response</div>
      </div>
    </div>
  </section>

  <!-- TRUST BAND (white) -->
  <section class="mc-section mc-section--trust" aria-label="Trust signals">
    <div class="mc-container">
      <div class="mc-trustGrid">
        <div class="mc-trustCard">
          <div class="mc-trustIcon" aria-hidden="true">
            <img src="/wp-content/uploads/motorcade/phase1/badges/svg/licensed-insured.svg" alt="">
          </div>
          <div>
            <div class="mc-trustTitle">Licensed &amp; insured</div>
            <div class="mc-trustDesc">Compliance-forward, documentation-ready operations.</div>
          </div>
        </div>

        <div class="mc-trustCard">
          <div class="mc-trustIcon" aria-hidden="true">
            <img src="/wp-content/uploads/motorcade/phase1/badges/svg/background-checked.svg" alt="">
          </div>
          <div>
            <div class="mc-trustTitle">Background checked</div>
            <div class="mc-trustDesc">Vetted personnel matched to the mission.</div>
          </div>
        </div>

        <div class="mc-trustCard">
          <div class="mc-trustIcon" aria-hidden="true">
            <img src="/wp-content/uploads/motorcade/phase1/badges/svg/rapid-response.svg" alt="">
          </div>
          <div>
            <div class="mc-trustTitle">Rapid response</div>
            <div class="mc-trustDesc">Escalation paths when conditions change.</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- REQUEST SECTION (white) -->
  <section class="mc-section" aria-label="Request an assessment">
    <div class="mc-container mc-twoCol">
      <div>
        <h2 class="mc-h2">Request a security assessment</h2>
        <p class="mc-lead">
          Tell us where, when, and the level of coverage you need. We respond with a clear plan and transparent pricing.
        </p>
        <ul class="mc-bullets">
          <li>On-demand or ongoing contracts</li>
          <li>Escalation and backup protocols</li>
          <li>Professional reporting when it matters</li>
        </ul>
        <a class="mc-btn mc-btn--primary" href="/contact">Start Request</a>
      </div>

      <div class="mc-sideCard" aria-label="Operational readiness">
        <div class="mc-sideCard__top">
          <div class="mc-sideBadge">Operational Readiness</div>
          <h3 class="mc-h3">Built for real-world risk</h3>
          <p class="mc-muted">
            We match the right team to the mission — then adapt as conditions change.
          </p>
        </div>
        <div class="mc-sideCard__img" aria-hidden="true">
          <img src="/wp-content/uploads/motorcade/hero-executive-protection.jpg" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES (white, crisp) -->
  <section class="mc-section mc-section--services" aria-label="Services">
    <div class="mc-container">
      <h2 class="mc-h2">Services built for real‑world risk</h2>
      <p class="mc-lead mc-lead--narrow">Professional coverage that scales from discreet to high‑visibility.</p>

      <div class="mc-cardGrid">
        <article class="mc-card">
          <div class="mc-card__icon" aria-hidden="true">
            <img src="/wp-content/uploads/motorcade/phase1/icons/svg/shield.svg" alt="">
          </div>
          <h3 class="mc-card__title">Armed Security</h3>
          <p class="mc-card__text">Visible deterrence and controlled access for facilities, events, and sites.</p>
          <a class="mc-link" href="/services">Learn more →</a>
        </article>

        <article class="mc-card">
          <div class="mc-card__icon" aria-hidden="true">
            <img src="/wp-content/uploads/motorcade/phase1/icons/svg/handshake.svg" alt="">
          </div>
          <h3 class="mc-card__title">Executive Protection</h3>
          <p class="mc-card__text">Discreet close protection, route planning, and situational management.</p>
          <a class="mc-link" href="/executive-protection">Learn more →</a>
        </article>

        <article class="mc-card">
          <div class="mc-card__icon" aria-hidden="true">
            <img src="/wp-content/uploads/motorcade/phase1/icons/svg/radio.svg" alt="">
          </div>
          <h3 class="mc-card__title">Rapid Response</h3>
          <p class="mc-card__text">Fast escalation when incidents evolve — backup and coordination ready.</p>
          <a class="mc-link" href="/services">Learn more →</a>
        </article>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
