<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>

<?php
  $turi = get_template_directory_uri();
  $img_hero = $turi . '/assets/images/HERO.png';
  $img_armed = $turi . '/assets/images/Armed-Security.png';
  $img_exec = $turi . '/assets/images/Executive-Protection.png';
  $img_rapid = $turi . '/assets/images/Rapid-Response.png';
?>

<div class="mc-home">
  <!-- HERO (canonical) -->
  <section class="mc-hero" aria-label="Motorcade hero">
    <div class="mc-hero-bg" style="background-image:url('<?php echo esc_url($img_hero); ?>');"></div>
    <div class="mc-hero-overlay" aria-hidden="true"></div>
    <div class="mc-hero-inner">
      <div class="mc-hero-kicker">MOTORCADE SOLUTIONS</div>
      <h1>Calm, Professional Security<br/>When Risk Changes Fast</h1>
      <p>Executive protection, armed security, and rapid response across Texas – licensed, insured, and operations-ready.</p>

      <div class="mc-hero-ctas">
        <a class="mc-btn mc-btn-pill" href="/contact/">Talk to Security</a>
        <a class="mc-btn mc-btn-pill mc-btn-dark" href="#what-we-handle">What We Handle</a>
      </div>

      <div class="mc-badges" aria-label="Trust badges">
        <div class="mc-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l8 4v6c0 5-3.5 9.4-8 10-4.5-.6-8-5-8-10V6l8-4z"/></svg>
          Licensed &amp; insured
        </div>
        <div class="mc-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v6l4 2"/></svg>
          24/7 dispatch
        </div>
        <div class="mc-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg>
          Rapid response
        </div>
      </div>
    </div>
  </section>

  <!-- REQUEST / ASSESSMENT -->
  <section class="mc-section-split" id="what-we-handle">
    <div class="mc-two-col">
      <div>
        <h2 class="mc-assess-title">Request a security assessment</h2>
        <p>Tell us where, when, and the level of coverage you need. We respond with a clear plan and transparent pricing.</p>

        <ul class="mc-checks">
          <li>
            <span class="mc-check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
            <span>On-demand or ongoing contracts</span>
          </li>
          <li>
            <span class="mc-check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
            <span>Escalation and backup protocols</span>
          </li>
          <li>
            <span class="mc-check" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
            <span>Professional reporting when it matters</span>
          </li>
        </ul>

        <div style="margin-top:14px;">
          <a class="mc-btn" href="/contact/">Start a conversation</a>
        </div>
      </div>

      <div class="mc-mini-cards" aria-label="Assessment highlights">
        <div class="mc-mini-card">
          <div class="mc-mini-img" style="background-image:url('<?php echo esc_url($img_armed); ?>');"></div>
          <div class="mc-mini-body">
            <div class="mc-mini-head">
              <div class="mc-mini-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l8 4v6c0 5-3.5 9.4-8 10-4.5-.6-8-5-8-10V6l8-4z"/></svg>
              </div>
              <div class="mc-mini-title">Licensed<br/>&amp; insured</div>
            </div>
            <p>Compliance-forward, documentation-ready operations</p>
          </div>
        </div>

        <div class="mc-mini-card">
          <div class="mc-mini-img" style="background-image:url('<?php echo esc_url($img_exec); ?>');"></div>
          <div class="mc-mini-body">
            <div class="mc-mini-head">
              <div class="mc-mini-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg>
              </div>
              <div class="mc-mini-title">Rapid<br/>response</div>
            </div>
            <p>Escalation paths when conditions change</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BUILT FOR REAL-WORLD RISK -->
  <section class="mc-dark" aria-label="Services">
    <h2>Built for real-world risk</h2>
    <p>We match the right team to the mission – then adapt as conditions change.</p>

    <div class="mc-service-grid">
      <article class="mc-service">
        <div class="mc-service-img" style="background-image:url('<?php echo esc_url($img_armed); ?>');"></div>
        <div class="mc-service-body">
          <h3 class="mc-service-title">
            <span class="mc-mini-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l8 4v6c0 5-3.5 9.4-8 10-4.5-.6-8-5-8-10V6l8-4z"/></svg></span>
            Armed Security
          </h3>
          <p>Visible deterrence and controlled access for facilities, events, and sites.</p>
          <a href="/services/">Learn more ..</a>
        </div>
      </article>

      <article class="mc-service">
        <div class="mc-service-img" style="background-image:url('<?php echo esc_url($img_exec); ?>');"></div>
        <div class="mc-service-body">
          <h3 class="mc-service-title">
            <span class="mc-mini-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a10 10 0 100 20 10 10 0 000-20z"/><path d="M12 6v6l4 2"/></svg></span>
            Executive Protection
          </h3>
          <p>Discreet close protection, route planning, and situational management.</p>
          <a href="/executive-protection/">Learn more ..</a>
        </div>
      </article>

      <article class="mc-service">
        <div class="mc-service-img" style="background-image:url('<?php echo esc_url($img_rapid); ?>');"></div>
        <div class="mc-service-body">
          <h3 class="mc-service-title">
            <span class="mc-mini-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg></span>
            Rapid Response
          </h3>
          <p>Fast escalation when incidents evolve — backup and coordination ready.</p>
          <a href="/services/">Learn more ..</a>
        </div>
      </article>
    </div>
  </section>
</div>

<?php get_footer(); ?>
