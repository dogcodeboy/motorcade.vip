<?php
/**
 * Motorcade Trust — Front Page (First-Page Psychological Polish)
 * Managed by Ansible (Playbook 33). Do not edit directly on server.
 *
 * Intent:
 * - Conversation-first primary CTA ("Talk to Security")
 * - Remove transactional pressure in hero + panel
 * - Trust indicators reframed as assumptions
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

          <div class="mc-hero__cta" aria-label="Primary actions">
            <a class="mc-btn mc-btn--primary" href="/contact/">Talk to Security</a>
            <a class="mc-btn mc-btn--ghost" href="#services">What We Handle</a>
          </div>

          <div class="mc-badges" aria-label="Trust indicators">
            <figure class="mc-badge">
              <img alt="Licensed and insured" src="<?php echo esc_url($phase1 . 'badges/svg/licensed-insured.svg'); ?>" loading="lazy">
              <figcaption>Licensed &amp; insured</figcaption>
            </figure>
            <figure class="mc-badge">
              <img alt="Vetted personnel" src="<?php echo esc_url($phase1 . 'badges/svg/background-checked.svg'); ?>" loading="lazy">
              <figcaption>Vetted personnel</figcaption>
            </figure>
            <figure class="mc-badge">
              <img alt="Escalation ready" src="<?php echo esc_url($phase1 . 'badges/svg/rapid-response.svg'); ?>" loading="lazy">
              <figcaption>Escalation‑ready</figcaption>
            </figure>
          </div>
        </div>

        <aside class="mc-hero__panel" aria-label="Optional request">
          <div class="mc-panel mc-panel--soft">
            <h2 class="mc-panel__title">Request a security assessment</h2>
            <p class="mc-panel__text">
              If you already know your timeline or coverage needs, we can walk through options and outline a clear plan.
            </p>
            <ul class="mc-panel__list">
              <li><span class="mc-dot"></span>On‑demand or ongoing contracts</li>
              <li><span class="mc-dot"></span>Escalation and backup protocols</li>
              <li><span class="mc-dot"></span>Professional reporting when it matters</li>
            </ul>
            <a class="mc-btn mc-btn--ghost mc-btn--block" href="/contact/">Start a conversation</a>
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
            <h3>Rapid Response</h3>
            <p>Fast escalation when incidents evolve — backup and coordination ready.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
