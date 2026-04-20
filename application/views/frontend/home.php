<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
 * FILE: application/views/frontend/home.php
 */

$svcs = [
  ['01', 'Influencer Marketing',   '#F5C518', '🤳', 'Meticulous creator matching for your brand goals — micro to mega.'],
  ['02', 'Meme Marketing',         '#FF6432', '😂', 'Viral campaigns embedded into cultural conversations.'],
  ['03', 'Movie Promotions',       '#C860F0', '🎬', 'End-to-end promos from teaser reveal to box-office day.'],
  ['04', 'LinkedIn & X',           '#00D4FF', '💼', 'Strategic campaigns on professional & trending platforms.'],
  ['05', 'Celebrity Endorsement',  '#3DFF8F', '⭐', 'Curated partnerships that amplify brand conversions.'],
  ['06', 'Video Production',       '#F5C518', '🎥', 'Ads, promos, web series — concept to final cut.'],
  ['07', 'Movie Screenings',       '#FF6432', '🍿', 'Exclusive influencer events generating organic buzz.'],
  ['08', 'On-Ground Promos',       '#C860F0', '🎪', 'Real-world activations bridging digital & physical.'],
];
$holes = array_fill(0, 28, 1);

// Brand names for ticker (text fallback shown if img missing)
$brands_row1 = ['boAt', 'Fastrack', 'Masters\' Union', 'Myntra', 'OnePlus', 'Philips', 'Tata Motors', 'Netflix', 'Amazon Prime'];
$brands_row2 = ['Disney+', 'Dharma', 'YRF', 'Sony', 'T-Series', 'Warner Bros', 'Maddock Films', 'Zee5', 'Jio Cinema'];
$brands_both  = array_merge($brands_row1, $brands_row2);

// Duplicate for seamless scroll
$ticker_items = array_merge($brands_both, $brands_both);
?>

<style>
  /* ══════════════════════════════════════════════════════════
     HERO
  ══════════════════════════════════════════════════════════ */
  .fc-hero {
    position: relative;
    z-index: 1;
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 100px 52px 80px;
    overflow: hidden;
  }

  .fc-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(245, 197, 24, .1);
    border: 1px solid rgba(245, 197, 24, .25);
    border-radius: 100px;
    padding: 8px 18px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--y);
    margin-bottom: 32px;
    opacity: 0;
    animation: fcsup .6s ease .3s forwards;
  }

  .fc-pulse {
    width: 8px;
    height: 8px;
    background: var(--y);
    border-radius: 50%;
    flex-shrink: 0;
    animation: fcping 1.6s ease-in-out infinite;
  }

  @keyframes fcping {

    0%,
    100% {
      transform: scale(1);
      opacity: 1;
    }

    50% {
      transform: scale(1.7);
      opacity: .4;
    }
  }

  .fch1 {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: clamp(58px, 11vw, 138px);
    line-height: .86;
    letter-spacing: -.04em;
    color: var(--cream);
    margin-bottom: 28px;
    opacity: 0;
    animation: fcsup 1s cubic-bezier(.16, 1, .3, 1) .5s forwards;
  }

  .fcsub {
    font-size: 17px;
    font-weight: 500;
    color: var(--muted);
    max-width: 440px;
    line-height: 1.78;
    margin-bottom: 44px;
    opacity: 0;
    animation: fcsup .7s ease .85s forwards;
  }

  .fcbtns {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    opacity: 0;
    animation: fcsup .6s ease 1.05s forwards;
  }

  .fcstats {
    margin-top: 72px;
    padding-top: 36px;
    border-top: 1px solid var(--border);
    display: flex;
    flex-wrap: wrap;
    gap: 52px;
    opacity: 0;
    animation: fcsup .6s ease 1.2s forwards;
  }

  .fcsn {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 52px;
    line-height: 1;
    letter-spacing: -.04em;
  }

  .fcsl {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--muted);
    margin-top: 7px;
  }

  .fc-shi {
    position: absolute;
    bottom: 32px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0;
    animation: fcsup .5s ease 1.6s forwards;
  }

  .fc-shl {
    width: 1px;
    height: 52px;
    background: linear-gradient(var(--y), transparent);
    animation: fcsl2 2.2s ease-in-out infinite;
  }

  @keyframes fcsl2 {

    0%,
    100% {
      opacity: .3;
      transform: scaleY(1)
    }

    50% {
      opacity: 1;
      transform: scaleY(1.15)
    }
  }

  @keyframes fcsup {
    from {
      opacity: 0;
      transform: translateY(36px)
    }

    to {
      opacity: 1;
      transform: none
    }
  }

  @keyframes fc-float {

    0%,
    100% {
      transform: translateY(0) rotate(0)
    }

    50% {
      transform: translateY(-14px) rotate(4deg)
    }
  }

  .fc-fs {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 30px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    opacity: .07;
    pointer-events: none;
  }

  .fc-fh {
    width: 13px;
    height: 10px;
    background: var(--y);
    border-radius: 2px;
    margin: 7px auto;
    flex-shrink: 0;
  }

  /* ══════════════════════════════════════════════════════════
     BRAND TICKER (horizontal + single image strip)
  ══════════════════════════════════════════════════════════ */
  .fc-brands-sec {
    padding: 56px 0;
    border-top: 1px solid rgba(255, 255, 255, .04);
    border-bottom: 1px solid rgba(255, 255, 255, .04);
    overflow: hidden;
    position: relative;
    z-index: 1;
    background: linear-gradient(180deg, rgba(8, 8, 16, 0) 0%, rgba(20, 20, 31, .55) 50%, rgba(8, 8, 16, 0) 100%);
  }

  .fc-brands-label {
    text-align: center;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .28em;
    text-transform: uppercase;
    color: rgba(107, 107, 128, .45);
    margin-bottom: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
  }

  .fc-brands-label::before,
  .fc-brands-label::after {
    content: '';
    flex: 1;
    max-width: 120px;
    height: 1px;
    background: rgba(107, 107, 128, .18);
  }

  /* Single sprite image ticker */
  .fc-brands-strip {
    overflow: hidden;
    position: relative;
  }

  .fc-brands-strip::before,
  .fc-brands-strip::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 80px;
    z-index: 2;
    pointer-events: none;
  }

  .fc-brands-strip::before {
    left: 0;
    background: linear-gradient(90deg, #080810, transparent);
  }

  .fc-brands-strip::after {
    right: 0;
    background: linear-gradient(-90deg, #080810, transparent);
  }

  .fc-brands-img-track {
    display: flex;
    gap: 0;
    width: max-content;
    animation: fc-brands-scroll 28s linear infinite;
  }

  .fc-brands-img-track:hover {
    animation-play-state: paused;
  }

  .fc-brands-img-track img {
    height: 52px;
    width: auto;
    object-fit: contain;
    filter: brightness(0) invert(1);
    opacity: .45;
    transition: opacity .3s;
    flex-shrink: 0;
    padding: 0 40px;
  }

  .fc-brands-img-track img:hover {
    opacity: .85;
  }

  @keyframes fc-brands-scroll {
    0% {
      transform: translateX(0);
    }

    100% {
      transform: translateX(-50%);
    }
  }

  /* Text fallback ticker (shown when image not present) */
  .fc-text-ticker {
    overflow: hidden;
    position: relative;
  }

  .fc-text-ticker::before,
  .fc-text-ticker::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 80px;
    z-index: 2;
    pointer-events: none;
  }

  .fc-text-ticker::before {
    left: 0;
    background: linear-gradient(90deg, #080810, transparent);
  }

  .fc-text-ticker::after {
    right: 0;
    background: linear-gradient(-90deg, #080810, transparent);
  }

  .fc-text-track {
    display: flex;
    align-items: center;
    gap: 0;
    white-space: nowrap;
    width: max-content;
    animation: fc-brands-scroll 32s linear infinite;
  }

  .fc-text-track:hover {
    animation-play-state: paused;
  }

  .fc-brand-chip {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 28px;
    margin: 0 4px;
    background: rgba(255, 255, 255, .025);
    border: 1px solid rgba(255, 255, 255, .06);
    border-radius: 100px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: .04em;
    color: rgba(237, 232, 223, .4);
    white-space: nowrap;
    transition: all .3s;
    cursor: default;
    flex-shrink: 0;
  }

  .fc-brand-chip:hover {
    border-color: rgba(245, 197, 24, .35);
    color: var(--y);
    background: rgba(245, 197, 24, .05);
  }

  .fc-brand-dot {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: var(--y);
    opacity: .4;
    flex-shrink: 0;
  }

  /* ══════════════════════════════════════════════════════════
     ABOUT
  ══════════════════════════════════════════════════════════ */
  .fcsec {
    padding: 120px 52px;
    position: relative;
    z-index: 1;
  }

  .fc-stc2 {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 36px 28px;
    transition: border-color .3s, transform .3s;
  }

  .fc-stc2:hover {
    border-color: rgba(245, 197, 24, .25);
    transform: translateY(-4px);
  }

  /* ══════════════════════════════════════════════════════════
     SERVICES — Redesigned grid cards
  ══════════════════════════════════════════════════════════ */
  .fc-svc-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
  }

  .fc-svc-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 18px;
    padding: 30px 26px;
    position: relative;
    overflow: hidden;
    cursor: default;
    transition: transform .45s cubic-bezier(.16, 1, .3, 1), border-color .3s, background .3s;
  }

  .fc-svc-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 18px;
    background: linear-gradient(135deg, currentColor, transparent);
    opacity: 0;
    transition: opacity .45s;
  }

  .fc-svc-card:hover {
    transform: translateY(-8px);
  }

  .fc-svc-card:hover::before {
    opacity: .06;
  }

  .fc-svc-card:hover .fc-svc-arrow {
    opacity: 1;
    transform: rotate(45deg) scale(1);
  }

  .fc-svc-card:hover .fc-svc-emoji {
    transform: scale(1.15) rotate(-5deg);
  }

  .fc-svc-card:hover .fc-svc-title {
    color: currentColor;
  }

  .fc-svc-num {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .22em;
    opacity: .28;
    display: block;
    margin-bottom: 18px;
    font-family: var(--font-d);
  }

  .fc-svc-emoji {
    font-size: 30px;
    display: block;
    margin-bottom: 14px;
    line-height: 1;
    transition: transform .4s cubic-bezier(.16, 1, .3, 1);
  }

  .fc-svc-title {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 19px;
    letter-spacing: -.01em;
    color: var(--cream);
    margin-bottom: 10px;
    line-height: 1.2;
    transition: color .3s;
  }

  .fc-svc-desc {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.65;
    font-weight: 500;
  }

  .fc-svc-arrow {
    position: absolute;
    top: 22px;
    right: 22px;
    width: 32px;
    height: 32px;
    border: 1.5px solid currentColor;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    opacity: .18;
    transition: opacity .35s, transform .4s cubic-bezier(.16, 1, .3, 1);
  }

  /* ══════════════════════════════════════════════════════════
     CAMPAIGNS
  ══════════════════════════════════════════════════════════ */
  .fc-cg {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .fc-cc2 {
    border-radius: 18px;
    overflow: hidden;
    background: var(--card);
    border: 1px solid var(--border);
    transition: transform .45s cubic-bezier(.16, 1, .3, 1), border-color .3s, box-shadow .3s;
  }

  .fc-cc2:hover {
    transform: translateY(-8px);
    border-color: rgba(245, 197, 24, .25);
    box-shadow: 0 28px 72px rgba(0, 0, 0, .45);
  }

  .fc-ci {
    height: 220px;
    overflow: hidden;
    position: relative;
  }

  .fc-ci img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .7s cubic-bezier(.16, 1, .3, 1);
  }

  .fc-cc2:hover .fc-ci img {
    transform: scale(1.08);
  }

  .fc-ctg {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(8, 8, 16, .84);
    backdrop-filter: blur(12px);
    padding: 5px 12px;
    border-radius: 100px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--y);
  }

  .fc-cbdy {
    padding: 24px;
  }

  .fc-ctt {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 20px;
    letter-spacing: -.02em;
    color: var(--cream);
    margin-bottom: 8px;
    line-height: 1.2;
    transition: color .25s;
  }

  .fc-cc2:hover .fc-ctt {
    color: var(--y);
  }

  .fc-cdsc {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.55;
  }

  .fc-clnk {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 16px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: rgba(245, 197, 24, .4);
    transition: color .25s, gap .25s;
  }

  .fc-cc2:hover .fc-clnk {
    color: var(--y);
    gap: 10px;
  }

  /* ══════════════════════════════════════════════════════════
     PROCESS
  ══════════════════════════════════════════════════════════ */
  .fc-pg {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
  }

  .fc-prc2 {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 36px 28px;
    position: relative;
    overflow: hidden;
    transition: border-color .35s, transform .35s;
  }

  .fc-prc2::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: currentColor;
    opacity: .35;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .5s cubic-bezier(.16, 1, .3, 1);
  }

  .fc-prc2:hover {
    transform: translateY(-5px);
    border-color: currentColor;
  }

  .fc-prc2:hover::before {
    transform: scaleX(1);
  }

  .fc-pn2 {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 68px;
    letter-spacing: -.06em;
    line-height: 1;
    opacity: .06;
    position: absolute;
    top: 12px;
    right: 20px;
  }

  /* ══════════════════════════════════════════════════════════
     CTA
  ══════════════════════════════════════════════════════════ */
  .fc-ctasec {
    position: relative;
    z-index: 1;
    padding: 100px 52px;
    overflow: hidden;
  }

  .fc-ctam {
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 80% at 20% 50%, rgba(245, 197, 24, .09) 0%, transparent 60%), radial-gradient(ellipse 50% 70% at 80% 50%, rgba(200, 96, 240, .08) 0%, transparent 55%);
    pointer-events: none;
  }

  .fc-ctag2 {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(255, 255, 255, .02) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .02) 1px, transparent 1px);
    background-size: 68px 68px;
  }

  /* ══════════════════════════════════════════════════════════
     RESPONSIVE
  ══════════════════════════════════════════════════════════ */
  @media(max-width:1200px) {
    .fc-svc-grid {
      grid-template-columns: repeat(2, 1fr) !important;
    }

    .fc-pg {
      grid-template-columns: repeat(2, 1fr) !important;
    }
  }

  @media(max-width:1024px) {

    .fc-hero,
    .fcsec {
      padding-left: 28px !important;
      padding-right: 28px !important;
    }

    .fc-cg {
      grid-template-columns: repeat(2, 1fr) !important;
    }
  }

  @media(max-width:768px) {
    .fc-hero {
      padding: 90px 18px 72px !important;
    }

    .fcsec {
      padding: 72px 18px !important;
    }

    .fcstats {
      gap: 28px;
    }

    .fcsn {
      font-size: 38px !important;
    }

    .fc-cg {
      grid-template-columns: 1fr !important;
    }

    .fc-svc-grid {
      grid-template-columns: 1fr 1fr !important;
    }

    .fc-pg {
      grid-template-columns: 1fr 1fr !important;
    }

    .about-gr {
      grid-template-columns: 1fr !important;
    }

    .stat-gr {
      grid-template-columns: 1fr 1fr !important;
    }

    .fc-ctasec {
      padding: 72px 18px !important;
    }
  }

  @media(max-width:520px) {
    .fc-svc-grid {
      grid-template-columns: 1fr !important;
    }

    .fc-pg {
      grid-template-columns: 1fr !important;
    }

    .fcbtns {
      flex-direction: column;
    }

    .fc-btn {
      width: 100%;
      justify-content: center !important;
    }
  }
</style>

<!-- ══ HERO ══════════════════════════════════════════════ -->
<section class="fc-hero" role="banner" aria-labelledby="fc-hero-h">
  <div class="fc-fs" style="left:0"> <?php foreach ($holes as $h): ?><div class="fc-fh"></div><?php endforeach; ?>
  </div>
  <div class="fc-fs" style="right:0"> <?php foreach ($holes as $h): ?><div class="fc-fh"></div><?php endforeach; ?>
  </div>
  <div style="position:absolute;top:18%;right:10%;font-size:32px;opacity:.14;animation:fc-float 7s ease-in-out infinite;pointer-events:none"
    aria-hidden="true">🎬</div>
  <div style="position:absolute;top:55%;right:22%;font-size:24px;opacity:.12;animation:fc-float 5.5s ease-in-out 1s infinite;pointer-events:none"
    aria-hidden="true">🎞️</div>
  <div style="position:absolute;bottom:22%;right:7%;font-size:28px;opacity:.11;animation:fc-float 8s ease-in-out .5s infinite;pointer-events:none"
    aria-hidden="true">🍿</div>
  <div style="position:relative;z-index:2;width:100%;max-width:1380px;margin:0 auto">
    <div class="fc-hero-badge"><span class="fc-pulse"></span>India's Premier Entertainment Marketing Agency</div>
    <h1 class="fch1" id="fc-hero-h">SPICE<br>UP YOUR<br>
      <span
        style="background:linear-gradient(135deg,var(--y),var(--o));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">SOCIAL</span>&thinsp;<span
        style="background:linear-gradient(135deg,var(--p),var(--c));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">MEDIA</span>
    </h1>
    <p class="fcsub">
      <?= htmlspecialchars($settings['hero_subtext'] ?? 'One-stop solution for influencer marketing, meme campaigns, and viral content that powers 32% of all OTT releases.') ?>
    </p>
    <div class="fcbtns">
      <a href="#campaigns" class="fc-btn fc-btn-y" data-fc-cur="EXPLORE">SEE OUR WORK</a>
      <a href="<?= base_url('contact') ?>" class="fc-btn fc-btn-ghost" data-fc-cur="TALK">LET'S TALK &rarr;</a>
    </div>
    <div class="fcstats">
      <?php foreach ([[$settings['stat_campaigns'] ?? '300+', 'Campaigns', '--y'], ['32%', 'OTT Releases', '--o'], [$settings['stat_reach'] ?? '12M+', 'Reached', '--p'], [$settings['stat_movies'] ?? '150+', 'Movies', '--c']] as $st): ?>
        <div>
          <div class="fcsn" style="color:var(<?= $st[2] ?>)"><?= htmlspecialchars($st[0]) ?></div>
          <div class="fcsl"><?= $st[1] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="fc-shi" aria-hidden="true">
    <span
      style="font-size:9px;letter-spacing:.28em;text-transform:uppercase;color:rgba(237,232,223,.18);font-weight:700">Scroll</span>
    <div class="fc-shl"></div>
  </div>
</section>

<!-- ══ BRAND TICKER ══════════════════════════════════════ -->
<section class="fc-brands-sec" aria-label="Brand partners">
  <div style="max-width:1380px;margin:0 auto;padding:0 52px">
    <div class="fc-brands-label">Trusted By India's Biggest Names</div>
  </div>

  <?php
  // Check if the brands sprite image exists
  $brands_sprite = FCPATH . 'assets/images/brands.png';
  $brands_sprite_exists = file_exists($brands_sprite);
  ?>

  <?php if ($brands_sprite_exists): ?>
    <!-- Single image strip ticker -->
    <div class="fc-brands-strip">
      <div class="fc-brands-img-track">
        <!-- Duplicate for seamless loop -->
        <img src="<?= base_url('assets/images/brands.png') ?>" alt="Our brand partners"
          style="height:52px;width:auto;max-width:none;padding:0 40px;flex-shrink:0;">
        <img src="<?= base_url('assets/images/brands.png') ?>" alt="Our brand partners"
          style="height:52px;width:auto;max-width:none;padding:0 40px;flex-shrink:0;" aria-hidden="true">
      </div>
    </div>
  <?php else: ?>
    <!-- Text fallback ticker -->
    <div class="fc-text-ticker">
      <div class="fc-text-track">
        <?php foreach ($ticker_items as $brand): ?>
          <span class="fc-brand-chip"><span class="fc-brand-dot"></span><?= htmlspecialchars($brand) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</section>

<!-- ══ ABOUT ══════════════════════════════════════════════ -->
<section class="fcsec" aria-labelledby="fc-about-h">
  <div style="max-width:1380px;margin:0 auto">
    <div class="about-gr"
      style="display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center;margin-bottom:72px">
      <div>
        <p class="fc-tag fc-rv" style="color:var(--y);margin-bottom:20px">Who We Are</p>
        <h2 id="fc-about-h" class="fc-h2 fc-rv fc-d1" style="margin-bottom:28px">WE MAKE<br>BRANDS<br><span
            style="background:linear-gradient(135deg,var(--p),var(--c));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">GO
            VIRAL</span></h2>
        <p class="fc-rv fc-d2"
          style="font-size:16px;color:var(--muted);line-height:1.88;max-width:480px;font-weight:500">
          <?= htmlspecialchars($settings['about_text'] ?? 'FilmyCurry is an influencer marketing agency driving high-impact campaigns for brands and production houses across entertainment, culture, and commerce.') ?>
        </p>
        <a href="<?= base_url('about') ?>" class="fc-btn fc-btn-y fc-rv fc-d3"
          style="margin-top:36px;display:inline-flex">OUR STORY &rarr;</a>
      </div>
      <div class="fc-rv fc-d2"
        style="background:var(--card);border:1px solid var(--border);border-radius:24px;overflow:hidden;height:360px;position:relative">
        <img src="<?= base_url('assets/images/background.png') ?>" alt="FilmyCurry"
          style="width:100%;height:100%;object-fit:cover;opacity:.65" loading="lazy"
          onerror="this.style.display='none'">
        <div
          style="position:absolute;inset:0;background:linear-gradient(to top,var(--card) 0%,transparent 55%)">
        </div>
        <div style="position:absolute;bottom:28px;left:28px">
          <p
            style="font-size:11px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--y);margin-bottom:6px">
            Powered by</p>
          <p style="font-size:22px;font-family:var(--font-d);font-weight:700;letter-spacing:-.02em">Creative
            Culture 🎬</p>
        </div>
        <div
          style="position:absolute;top:24px;right:24px;background:rgba(8,8,16,.75);backdrop-filter:blur(16px);border:1px solid rgba(245,197,24,.2);border-radius:12px;padding:16px 20px">
          <p style="font-size:28px;font-family:var(--font-d);font-weight:700;color:var(--y)">32%</p>
          <p
            style="font-size:10px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted)">
            OTT Releases</p>
        </div>
      </div>
    </div>
    <div class="stat-gr fc-rv fc-d2" style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px">
      <?php foreach ([[$settings['stat_campaigns'] ?? '300+', 'Campaigns', 'Delivered', '--y'], ['32%', 'OTT Releases', 'Of all India', '--o'], [$settings['stat_reach'] ?? '12M+', 'Reach', 'Unique touchpoints', '--p'], [$settings['stat_screenings'] ?? '70+', 'Screenings', 'Events run', '--c']] as $bi): ?>
        <div class="fc-stc2">
          <div
            style="font-family:var(--font-d);font-weight:700;font-size:clamp(36px,5vw,56px);letter-spacing:-.04em;color:var(<?= $bi[3] ?>)">
            <?= htmlspecialchars($bi[0]) ?></div>
          <div style="font-family:var(--font-d);font-weight:700;font-size:16px;color:var(--cream);margin-top:6px">
            <?= $bi[1] ?></div>
          <div style="font-size:12px;color:var(--muted);font-weight:600;margin-top:4px"><?= $bi[2] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ SERVICES ═══════════════════════════════════════════ -->
<section class="fcsec" style="background:var(--ink)" aria-labelledby="fc-svc-h">
  <div style="max-width:1380px;margin:0 auto">
    <div
      style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:52px;flex-wrap:wrap;gap:24px">
      <div>
        <p class="fc-tag fc-rv" style="color:var(--o);margin-bottom:20px">What We Do</p>
        <h2 id="fc-svc-h" class="fc-h2 fc-rv fc-d1">OUR<br><span
            style="background:linear-gradient(135deg,var(--y),var(--o));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">SERVICES</span>
        </h2>
      </div>
      <a href="<?= base_url('contact') ?>" class="fc-btn fc-btn-ghost fc-rv fc-d2">WORK WITH US</a>
    </div>
    <div class="fc-svc-grid">
      <?php foreach ($svcs as $i => $sv): $dd = 'fc-d' . (($i % 4) + 1); ?>
        <div class="fc-svc-card fc-rv <?= $dd ?>" style="color:<?= $sv[2] ?>">
          <span class="fc-svc-num"><?= $sv[0] ?></span>
          <span class="fc-svc-emoji"><?= $sv[3] ?></span>
          <h3 class="fc-svc-title"><?= $sv[1] ?></h3>
          <p class="fc-svc-desc"><?= $sv[4] ?></p>
          <div class="fc-svc-arrow">&#8599;</div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ CAMPAIGNS ══════════════════════════════════════════ -->
<?php if (!empty($posts)): ?>
  <section class="fcsec" id="campaigns" aria-labelledby="fc-camp-h">
    <div style="max-width:1380px;margin:0 auto">
      <p class="fc-tag fc-rv" style="color:var(--p);margin-bottom:20px">Case Studies</p>
      <h2 id="fc-camp-h" class="fc-h2 fc-rv fc-d1" style="margin-bottom:56px">BLOCKBUSTER<br><span
          style="background:linear-gradient(135deg,var(--p),var(--c));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">CAMPAIGNS</span>
      </h2>
      <div class="fc-cg">
        <?php foreach ($posts as $i => $p): $dd = 'fc-d' . (($i % 3) + 1); ?>
          <a href="<?= base_url('post/' . $p['slug']) ?>" style="text-decoration:none;display:block"
            data-fc-cur="VIEW">
            <article class="fc-cc2 fc-rv <?= $dd ?>">
              <div class="fc-ci">
                <?php if ($p['image']): ?><img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>"
                    alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
                <?php else: ?><div
                    style="height:220px;background:linear-gradient(135deg,#16161f,#080810);display:flex;align-items:center;justify-content:center">
                    <span
                      style="font-family:var(--font-d);font-weight:700;font-size:60px;color:rgba(245,197,24,.07)">FC</span>
                  </div><?php endif; ?>
                <div class="fc-ctg"><?= htmlspecialchars($p['author']) ?></div>
              </div>
              <div class="fc-cbdy">
                <h3 class="fc-ctt"><?= htmlspecialchars($p['title']) ?></h3>
                <p class="fc-cdsc"><?= htmlspecialchars(substr($p['description'], 0, 90)) ?>...</p>
                <div class="fc-clnk">VIEW CAMPAIGN <span>&rarr;</span></div>
              </div>
            </article>
          </a>
        <?php endforeach; ?>
      </div>
      <div style="text-align:center;margin-top:52px" class="fc-rv">
        <a href="<?= base_url('work') ?>" class="fc-btn fc-btn-ghost">VIEW ALL CAMPAIGNS</a>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- ══ PROCESS ════════════════════════════════════════════ -->
<section class="fcsec" style="background:var(--ink)" aria-labelledby="fc-proc-h">
  <div style="max-width:1380px;margin:0 auto">
    <p class="fc-tag fc-rv" style="color:var(--c);margin-bottom:20px">How We Work</p>
    <h2 id="fc-proc-h" class="fc-h2 fc-rv fc-d1" style="margin-bottom:52px">THE<br><span
        style="background:linear-gradient(135deg,var(--c),var(--g));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">PROCESS</span>
    </h2>
    <div class="fc-pg">
      <?php foreach ([['🎯', 'Strategy', 'Deep-dive into brand goals, audience, and cultural context.', '--y'], ['🌐', 'Network', 'Match with perfect influencers, meme pages, and content creators.', '--o'], ['🚀', 'Execute', 'Launch precision campaigns with real-time monitoring.', '--p'], ['📈', 'Scale', 'Analyze, optimize, and scale what\'s working for maximum ROI.', '--c']] as $i => $ps): $dd = 'fc-d' . ($i + 1); ?>
        <div class="fc-prc2 fc-rv <?= $dd ?>" style="color:var(<?= $ps[3] ?>)">
          <div class="fc-pn2"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
          <div style="font-size:32px;margin-bottom:16px"><?= $ps[0] ?></div>
          <h3
            style="font-family:var(--font-d);font-weight:700;font-size:22px;letter-spacing:-.02em;margin-bottom:10px">
            <?= $ps[1] ?></h3>
          <p style="font-size:14px;color:var(--muted);line-height:1.65;font-weight:500"><?= $ps[2] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ CTA ════════════════════════════════════════════════ -->
<section class="fc-ctasec" aria-label="Call to action">
  <div class="fc-ctam"></div>
  <div class="fc-ctag2"></div>
  <div style="position:relative;z-index:1;max-width:1380px;margin:0 auto;text-align:center">
    <p class="fc-tag fc-rv" style="color:var(--g);justify-content:center;margin:0 auto 24px">Ready to go viral?</p>
    <h2 class="fc-h2 fc-rv fc-d1" style="margin-bottom:40px">LET'S BUILD<br>SOMETHING<br><span
        style="background:linear-gradient(135deg,var(--g),var(--c));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">VIRAL</span>
    </h2>
    <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap" class="fc-rv fc-d2">
      <a href="<?= base_url('contact') ?>" class="fc-btn fc-btn-y" style="font-size:16px;padding:18px 44px"
        data-fc-cur="GO">START A CAMPAIGN</a>
      <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com') ?>"
        class="fc-btn fc-btn-ghost" style="font-size:16px;padding:17px 40px">EMAIL US</a>
    </div>
    <p class="fc-rv fc-d3" style="margin-top:28px;font-size:14px;color:var(--muted);font-weight:600">
      <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?> &nbsp;&middot;&nbsp;
      <?= htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com') ?>
    </p>
  </div>
</section>