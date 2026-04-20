<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $s          = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
  $site_title = $s['site_title'] ?? 'FilmyCurry';
  $site_desc  = $s['hero_subtext'] ?? "India's premier influencer & meme marketing agency.";
  $uri        = isset($data['_uri']) ? $data['_uri'] : uri_string();
  $pg_title   = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title . ' — Spice Up Your Social Media';
  $logo_url   = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';
  ?>
  <title><?= htmlspecialchars($pg_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
  <meta name="robots" content="index, follow">
  <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="canonical" href="<?= base_url(uri_string()) ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/fc-global.css') ?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            fc: {
              y: '#F5C518',
              o: '#FF6432',
              p: '#C860F0',
              c: '#00D4FF',
              g: '#3DFF8F',
              bg: '#080810',
              ink: '#10101C',
              card: '#14141F',
              cream: '#EDE8DF',
              muted: '#6B6B80'
            }
          }
        }
      }
    }
  </script>
</head>

<body>

  <div id="fc-bg" aria-hidden="true">
    <div class="fc-orb fc-orb-1"></div>
    <div class="fc-orb fc-orb-2"></div>
    <div class="fc-orb fc-orb-3"></div>
    <div class="fc-orb fc-orb-4"></div>
  </div>

  <div id="fc-cursor" aria-hidden="true"></div>
  <div id="fc-cursor-ring" aria-hidden="true"></div>
  <div id="fc-cursor-label" aria-hidden="true"></div>
  <div id="fc-progress" aria-hidden="true"></div>

  <nav id="fc-nav" role="navigation" aria-label="Main navigation">
    <a href="<?= base_url() ?>" class="fc-logo" aria-label="<?= htmlspecialchars($site_title) ?> Home">
      <?php if ($logo_url): ?>
        <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:34px">
      <?php else: ?>
        FILMY<span class="accent">CURRY</span>
      <?php endif; ?>
    </a>
    <div class="fc-nav-links">
      <a href="<?= base_url() ?>"
        class="fc-nav-link <?= ($uri === '' || $uri === '/') ? 'active' : '' ?>">Home</a>
      <a href="<?= base_url('about') ?>"
        class="fc-nav-link <?= strpos($uri, 'about') !== FALSE ? 'active' : '' ?>">About</a>
      <a href="<?= base_url('work') ?>"
        class="fc-nav-link <?= strpos($uri, 'work') !== FALSE ? 'active' : '' ?>">Our Work</a>
      <a href="<?= base_url('contact') ?>" class="fc-nav-cta">Let's Talk ↗</a>
    </div>
    <button id="fc-hbg" aria-label="Toggle menu" aria-expanded="false">
      <span class="fc-hb" id="fc-hb1"></span>
      <span class="fc-hb" id="fc-hb2"></span>
      <span class="fc-hb" id="fc-hb3"></span>
    </button>
  </nav>

  <div id="fc-mob" role="dialog" aria-modal="true" aria-label="Navigation">
    <a href="<?= base_url() ?>" class="fc-mob-link">HOME</a>
    <a href="<?= base_url('about') ?>" class="fc-mob-link">ABOUT</a>
    <a href="<?= base_url('work') ?>" class="fc-mob-link">OUR WORK</a>
    <a href="<?= base_url('contact') ?>" class="fc-mob-link" style="color:var(--y)">LET'S TALK</a>
    <div style="margin-top:48px;padding-top:28px;border-top:1px solid var(--border)">
      <p style="font-size:15px;font-weight:600;color:var(--muted);margin-bottom:6px">
        <?= htmlspecialchars($s['site_email'] ?? '') ?></p>
      <p style="font-size:15px;font-weight:600;color:var(--muted)"><?= htmlspecialchars($s['site_phone'] ?? '') ?>
      </p>
    </div>
  </div>

  <main role="main"><?= $content ?></main>

  <footer class="fc-footer" aria-label="Site footer">
    <div class="fc-max">
      <div class="footer-cols"
        style="display:grid;grid-template-columns:1.3fr 1fr 1fr 1fr;gap:48px;margin-bottom:56px">
        <div>
          <div class="fc-footer-logo">FILMY<span class="fc-grad-text-1">CURRY</span></div>
          <p style="font-size:14px;color:var(--muted);line-height:1.8;max-width:264px;font-weight:500">India's
            premier influencer & meme marketing agency. Powering 32% of all OTT releases.</p>
          <div style="display:flex;gap:10px;margin-top:24px">
            <a href="#" aria-label="LinkedIn" class="fc-social">In</a>
            <a href="#" aria-label="Instagram" class="fc-social">Ig</a>
            <a href="#" aria-label="X" class="fc-social">X</a>
          </div>
        </div>
        <div>
          <p class="fc-footer-label">Navigate</p>
          <a href="<?= base_url() ?>" class="fc-footer-link">Home</a>
          <a href="<?= base_url('about') ?>" class="fc-footer-link">About</a>
          <a href="<?= base_url('work') ?>" class="fc-footer-link">Our Work</a>
          <a href="<?= base_url('contact') ?>" class="fc-footer-link">Contact</a>
        </div>
        <div>
          <p class="fc-footer-label">Services</p>
          <?php foreach (['Influencer Marketing', 'Meme Marketing', 'Movie Promotions', 'Video Production'] as $sv): ?>
            <span class="fc-footer-link" style="cursor:default"><?= $sv ?></span>
          <?php endforeach; ?>
        </div>
        <div>
          <p class="fc-footer-label">Contact</p>
          <a href="mailto:<?= htmlspecialchars($s['site_email'] ?? '') ?>"
            class="fc-footer-link"><?= htmlspecialchars($s['site_email'] ?? 'contact@filmycurry.com') ?></a>
          <a href="tel:<?= htmlspecialchars($s['site_phone'] ?? '') ?>"
            class="fc-footer-link"><?= htmlspecialchars($s['site_phone'] ?? '+91 9990802115') ?></a>
          <span class="fc-footer-link"
            style="cursor:default"><?= htmlspecialchars($s['site_address'] ?? 'India') ?></span>
        </div>
      </div>
      <div
        style="border-top:1px solid var(--border);padding-top:24px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <p style="font-size:12px;color:rgba(237,232,223,.18);font-weight:500">© <?= date('Y') ?>
          <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
        <p style="font-size:12px;color:rgba(237,232,223,.18);font-weight:500">Made with 🎬 in India</p>
      </div>
    </div>
  </footer>

  <style>
    @media(max-width:1024px) {
      .footer-cols {
        grid-template-columns: 1fr 1fr !important
      }
    }

    @media(max-width:640px) {
      .footer-cols {
        grid-template-columns: 1fr !important
      }
    }
  </style>
  <script src="<?= base_url('assets/js/fc-global.js') ?>"></script>
</body>

</html>