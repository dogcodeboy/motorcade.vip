<?php
/**
 * Motorcade Trust Theme - Custom Front Page
 * Render-matched, responsive home layout.
 */
get_header();
$theme_uri = get_template_directory_uri();
$asset_base = $theme_uri . '/assets/homepage/assets';

// Load the render-matched CSS explicitly so the layout does not depend on theme enqueue behavior.
$css_href = $theme_uri . '/assets/homepage_render_v2.css';
echo '<link rel="stylesheet" href="' . esc_url( $css_href ) . '?v=' . intval( @filemtime( get_template_directory() . '/assets/homepage_render_v2.css' ) ) . '">';
?>

<main id="primary" class="site-main mc-home">

  <section class="mc-hero" aria-label="Hero">
    <div class="mc-hero__bg" style="background-image: url('<?php echo esc_url($asset_base . '/hero.webp'); ?>');"></div>
    <div class="mc-hero__inner">
      <div class="mc-hero__card">
        <div class="mc-hero__kicker">Motorcade Security Solutions</div>
        <h1 class="mc-hero__title">Calm, Professional Security<br/>When Risk Changes Fast</h1>
        <p class="mc-hero__sub">Executive protection, armed security, and rapid response across Texas — licensed, insured, and operations-ready.</p>
        <div class="mc-hero__ctas">
          <a class="mc-btn mc-btn--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Talk to Security</a>
          <a class="mc-btn mc-btn--ghost" href="#services">What We Handle</a>
        </div>
        <div class="mc-hero__chips" role="list">
          <span class="mc-chip" role="listitem"><span class="mc-chip__icon" aria-hidden="true">♥</span> Licensed &amp; insured</span>
          <span class="mc-chip" role="listitem"><span class="mc-chip__icon" aria-hidden="true">⏱</span> 24/7 dispatch</span>
          <span class="mc-chip" role="listitem"><span class="mc-chip__icon" aria-hidden="true">⚡</span> Rapid response</span>
        </div>
      </div>
    </div>
  </section>

  <section class="mc-section mc-assessment" id="assessment" aria-label="Assessment">
    <div class="mc-container mc-assessment__grid">
      <div class="mc-assessment__copy">
        <h2>Request a security assessment</h2>
        <p>Tell us where, when, and the level of coverage you need. We respond with a clear plan and transparent pricing.</p>
        <ul class="mc-checklist">
          <li>On-demand or ongoing contracts</li>
          <li>Escalation and backup protocols</li>
          <li>Professional reporting when it matters</li>
        </ul>
        <a class="mc-btn mc-btn--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Start a conversation</a>
      </div>

      <div class="mc-assessment__cards" aria-label="Highlights">
        <article class="mc-mini">
          <div class="mc-mini__img">
            <img src="<?php echo esc_url($asset_base . '/assessment_licensed.webp'); ?>" alt="Licensed and insured" loading="lazy" />
          </div>
          <div class="mc-mini__body">
            <div class="mc-mini__title">
              <span class="mc-mini__badge" aria-hidden="true">▣</span>
              Licensed &amp; insured
            </div>
            <div class="mc-mini__text">Compliance-forward, documentation-ready operations.</div>
          </div>
        </article>

        <article class="mc-mini">
          <div class="mc-mini__img">
            <img src="<?php echo esc_url($asset_base . '/assessment_rapid.webp'); ?>" alt="Rapid response" loading="lazy" />
          </div>
          <div class="mc-mini__body">
            <div class="mc-mini__title">
              <span class="mc-mini__badge" aria-hidden="true">⚡</span>
              Rapid response
            </div>
            <div class="mc-mini__text">Escalation paths when conditions change.</div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="mc-section mc-risk" id="services" aria-label="Services">
    <div class="mc-risk__bg" style="background-image: url('<?php echo esc_url($asset_base . '/risk_exec.webp'); ?>');"></div>
    <div class="mc-container">
      <div class="mc-risk__header">
        <div class="mc-pill">OPERATIONAL READINESS</div>
        <h2>Built for real-world risk</h2>
        <p>We match the right team to the mission — then adapt as conditions change.</p>
      </div>

      <div class="mc-cards">
        <article class="mc-card">
          <div class="mc-card__media"><img src="<?php echo esc_url($asset_base . '/service_armed.webp'); ?>" alt="Armed Security" loading="lazy" /></div>
          <div class="mc-card__content">
            <div class="mc-card__title">Armed Security</div>
            <div class="mc-card__text">Visible deterrence and controlled access for facilities, events, and sites.</div>
            <a class="mc-card__link" href="<?php echo esc_url(home_url('/services/')); ?>">Learn more →</a>
          </div>
        </article>

        <article class="mc-card">
          <div class="mc-card__media"><img src="<?php echo esc_url($asset_base . '/service_exec.png'); ?>" alt="Executive Protection" loading="lazy" /></div>
          <div class="mc-card__content">
            <div class="mc-card__title">Executive Protection</div>
            <div class="mc-card__text">Discreet close protection, route planning, and situational management.</div>
            <a class="mc-card__link" href="<?php echo esc_url(home_url('/executive-protection/')); ?>">Learn more →</a>
          </div>
        </article>

        <article class="mc-card">
          <div class="mc-card__media"><img src="<?php echo esc_url($asset_base . '/risk_armed.webp'); ?>" alt="Rapid Response" loading="lazy" /></div>
          <div class="mc-card__content">
            <div class="mc-card__title">Rapid Response</div>
            <div class="mc-card__text">Fast escalation when incidents evolve — backup and coordination ready.</div>
            <a class="mc-card__link" href="<?php echo esc_url(home_url('/services/')); ?>">Learn more →</a>
          </div>
        </article>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();
