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

  <style>
    /* ── FILM/MEME BACKGROUND ICONS ─────────────────────── */
    .fc-bg-icons {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden;
    }

    .fc-bg-icon {
      position: absolute;
      font-size: 28px;
      opacity: 0.045;
      animation: fc-icon-float 8s ease-in-out infinite;
      user-select: none;
      filter: grayscale(1) brightness(2);
    }

    .fc-bg-icon:nth-child(1) {
      top: 5%;
      left: 3%;
      font-size: 22px;
      animation-delay: 0s;
      animation-duration: 9s;
    }

    .fc-bg-icon:nth-child(2) {
      top: 12%;
      left: 18%;
      font-size: 18px;
      animation-delay: 1.2s;
      animation-duration: 7s;
    }

    .fc-bg-icon:nth-child(3) {
      top: 8%;
      left: 42%;
      font-size: 26px;
      animation-delay: 0.5s;
      animation-duration: 11s;
    }

    .fc-bg-icon:nth-child(4) {
      top: 6%;
      left: 68%;
      font-size: 20px;
      animation-delay: 2s;
      animation-duration: 8s;
    }

    .fc-bg-icon:nth-child(5) {
      top: 4%;
      left: 88%;
      font-size: 24px;
      animation-delay: 0.8s;
      animation-duration: 10s;
    }

    .fc-bg-icon:nth-child(6) {
      top: 22%;
      left: 7%;
      font-size: 20px;
      animation-delay: 3s;
      animation-duration: 9s;
    }

    .fc-bg-icon:nth-child(7) {
      top: 28%;
      left: 32%;
      font-size: 16px;
      animation-delay: 1.5s;
      animation-duration: 12s;
    }

    .fc-bg-icon:nth-child(8) {
      top: 25%;
      left: 55%;
      font-size: 22px;
      animation-delay: 0.3s;
      animation-duration: 8s;
    }

    .fc-bg-icon:nth-child(9) {
      top: 20%;
      left: 78%;
      font-size: 18px;
      animation-delay: 2.5s;
      animation-duration: 7s;
    }

    .fc-bg-icon:nth-child(10) {
      top: 20%;
      left: 95%;
      font-size: 20px;
      animation-delay: 1s;
      animation-duration: 10s;
    }

    .fc-bg-icon:nth-child(11) {
      top: 42%;
      left: 1%;
      font-size: 24px;
      animation-delay: 4s;
      animation-duration: 9s;
    }

    .fc-bg-icon:nth-child(12) {
      top: 45%;
      left: 14%;
      font-size: 16px;
      animation-delay: 1.8s;
      animation-duration: 11s;
    }

    .fc-bg-icon:nth-child(13) {
      top: 40%;
      left: 48%;
      font-size: 20px;
      animation-delay: 0.6s;
      animation-duration: 8s;
    }

    .fc-bg-icon:nth-child(14) {
      top: 38%;
      left: 72%;
      font-size: 18px;
      animation-delay: 3.2s;
      animation-duration: 9s;
    }

    .fc-bg-icon:nth-child(15) {
      top: 44%;
      left: 92%;
      font-size: 22px;
      animation-delay: 1.4s;
      animation-duration: 7s;
    }

    .fc-bg-icon:nth-child(16) {
      top: 60%;
      left: 5%;
      font-size: 18px;
      animation-delay: 2.2s;
      animation-duration: 10s;
    }

    .fc-bg-icon:nth-child(17) {
      top: 65%;
      left: 25%;
      font-size: 22px;
      animation-delay: 0.9s;
      animation-duration: 8s;
    }

    .fc-bg-icon:nth-child(18) {
      top: 58%;
      left: 60%;
      font-size: 16px;
      animation-delay: 3.5s;
      animation-duration: 12s;
    }

    .fc-bg-icon:nth-child(19) {
      top: 62%;
      left: 82%;
      font-size: 20px;
      animation-delay: 1.1s;
      animation-duration: 9s;
    }

    .fc-bg-icon:nth-child(20) {
      top: 72%;
      left: 38%;
      font-size: 24px;
      animation-delay: 2.8s;
      animation-duration: 7s;
    }

    .fc-bg-icon:nth-child(21) {
      top: 78%;
      left: 8%;
      font-size: 18px;
      animation-delay: 0.4s;
      animation-duration: 11s;
    }

    .fc-bg-icon:nth-child(22) {
      top: 82%;
      left: 50%;
      font-size: 20px;
      animation-delay: 1.7s;
      animation-duration: 8s;
    }

    .fc-bg-icon:nth-child(23) {
      top: 80%;
      left: 70%;
      font-size: 16px;
      animation-delay: 3.8s;
      animation-duration: 10s;
    }

    .fc-bg-icon:nth-child(24) {
      top: 88%;
      left: 22%;
      font-size: 22px;
      animation-delay: 0.7s;
      animation-duration: 9s;
    }

    .fc-bg-icon:nth-child(25) {
      top: 92%;
      left: 88%;
      font-size: 18px;
      animation-delay: 2.3s;
      animation-duration: 7s;
    }

    @keyframes fc-icon-float {

      0%,
      100% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.045;
      }

      33% {
        transform: translateY(-12px) rotate(3deg);
        opacity: 0.065;
      }

      66% {
        transform: translateY(-6px) rotate(-2deg);
        opacity: 0.035;
      }
    }

    /* ── LAYOUT FIXES & RESPONSIVE BASE ─────────────────── */
    :root {
      --y: #F5C518;
      --o: #FF6432;
      --p: #C860F0;
      --c: #00D4FF;
      --g: #3DFF8F;
      --bg: #080810;
      --ink: #10101C;
      --card: #14141F;
      --cream: #EDE8DF;
      --muted: #6B6B80;
      --border: #1E1E2E;
      --font-d: 'Bebas Neue', 'Cabinet Grotesk', Impact, sans-serif;
      --font-b: 'Inter', system-ui, sans-serif;
    }

    /* ── NAV ─────────────────────────────────────────────── */
    #fc-nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 200;
      padding: 0 52px;
      height: 72px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: all .4s ease;
    }

    #fc-nav.pinned {
      background: rgba(8, 8, 16, .96);
      backdrop-filter: blur(24px);
      border-bottom: 1px solid rgba(255, 255, 255, .04);
      height: 60px;
    }

    .fc-logo {
      font-family: var(--font-d);
      font-size: 24px;
      letter-spacing: .06em;
      color: var(--cream);
      text-decoration: none;
    }

    .fc-logo .accent {
      color: var(--y);
    }

    .fc-nav-links {
      display: flex;
      align-items: center;
      gap: 32px;
    }

    .fc-nav-link {
      font-size: 13px;
      font-weight: 600;
      color: rgba(237, 232, 223, .5);
      text-decoration: none;
      letter-spacing: .03em;
      transition: color .2s;
      position: relative;
    }

    .fc-nav-link:hover,
    .fc-nav-link.active {
      color: var(--cream);
    }

    .fc-nav-link::after {
      content: '';
      position: absolute;
      bottom: -3px;
      left: 0;
      width: 0;
      height: 1px;
      background: var(--y);
      transition: width .35s cubic-bezier(.16, 1, .3, 1);
    }

    .fc-nav-link:hover::after,
    .fc-nav-link.active::after {
      width: 100%;
    }

    .fc-nav-cta {
      background: var(--y);
      color: #080810;
      font-family: var(--font-d);
      font-size: 14px;
      letter-spacing: .08em;
      padding: 9px 22px;
      border-radius: 4px;
      text-decoration: none;
      transition: transform .2s, filter .2s;
    }

    .fc-nav-cta:hover {
      transform: translateY(-2px);
      filter: brightness(1.1);
    }

    /* ── HAMBURGER ───────────────────────────────────────── */
    #fc-hbg {
      display: none;
      background: none;
      border: none;
      cursor: pointer;
      flex-direction: column;
      gap: 5px;
      padding: 8px;
    }

    .fc-hb {
      display: block;
      width: 22px;
      height: 1.5px;
      background: var(--cream);
      transition: all .3s cubic-bezier(.16, 1, .3, 1);
    }

    /* ── MOBILE MENU ─────────────────────────────────────── */
    #fc-mob {
      position: fixed;
      inset: 0;
      z-index: 180;
      background: var(--bg);
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;
      padding: 0 36px;
      gap: 6px;
      opacity: 0;
      pointer-events: none;
      transition: opacity .35s;
    }

    #fc-mob.open {
      opacity: 1;
      pointer-events: all;
    }

    .fc-mob-link {
      font-family: var(--font-d);
      font-size: clamp(40px, 10vw, 68px);
      color: rgba(237, 232, 223, .12);
      text-decoration: none;
      line-height: 1.05;
      transition: color .25s, transform .3s;
      display: block;
    }

    .fc-mob-link:hover {
      color: var(--y);
      transform: translateX(10px);
    }

    /* ── CURSOR ──────────────────────────────────────────── */
    #fc-cursor {
      width: 10px;
      height: 10px;
      background: var(--y);
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform .1s;
      mix-blend-mode: difference;
    }

    #fc-cursor-ring {
      width: 38px;
      height: 38px;
      border: 1.5px solid rgba(245, 197, 24, .5);
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      transition: width .3s cubic-bezier(.16, 1, .3, 1), height .3s cubic-bezier(.16, 1, .3, 1), opacity .3s;
    }

    #fc-cursor-label {
      position: fixed;
      pointer-events: none;
      z-index: 9997;
      font-size: 9px;
      font-weight: 800;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: var(--y);
      transform: translate(-50%, 24px);
      opacity: 0;
      transition: opacity .2s;
      white-space: nowrap;
    }

    /* ── SCROLL PROGRESS ─────────────────────────────────── */
    #fc-progress {
      position: fixed;
      top: 0;
      left: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--y), var(--o), var(--p));
      z-index: 300;
      width: 0%;
      transition: width .08s linear;
    }

    /* ── FOOTER ──────────────────────────────────────────── */
    .fc-footer {
      background: #050510;
      border-top: 1px solid var(--border);
      padding: 80px 52px 40px;
      position: relative;
      z-index: 1;
    }

    .fc-footer-logo {
      font-family: var(--font-d);
      font-size: 28px;
      letter-spacing: .06em;
      margin-bottom: 16px;
      color: var(--cream);
    }

    .fc-footer-label {
      font-size: 9px;
      font-weight: 700;
      letter-spacing: .22em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 18px;
      display: block;
    }

    .fc-footer-link {
      display: block;
      font-size: 14px;
      color: rgba(237, 232, 223, .42);
      font-weight: 500;
      margin-bottom: 12px;
      text-decoration: none;
      transition: color .2s;
    }

    .fc-footer-link:hover {
      color: var(--y);
    }

    .fc-social {
      width: 36px;
      height: 36px;
      border: 1px solid rgba(255, 255, 255, .08);
      border-radius: 4px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: 700;
      color: var(--muted);
      text-decoration: none;
      transition: all .2s;
    }

    .fc-social:hover {
      border-color: var(--y);
      color: var(--y);
    }

    .fc-max {
      max-width: 1380px;
      margin: 0 auto;
    }

    .fc-grad-text-1 {
      background: linear-gradient(135deg, var(--y), var(--o));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* ── ORBS ────────────────────────────────────────────── */
    #fc-bg {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden;
    }

    .fc-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(120px);
      opacity: .06;
      animation: fc-orb-drift 18s ease-in-out infinite;
    }

    .fc-orb-1 {
      width: 600px;
      height: 600px;
      background: var(--y);
      top: -200px;
      left: -100px;
      animation-delay: 0s;
    }

    .fc-orb-2 {
      width: 500px;
      height: 500px;
      background: var(--p);
      top: 30%;
      right: -150px;
      animation-delay: 4s;
    }

    .fc-orb-3 {
      width: 400px;
      height: 400px;
      background: var(--c);
      bottom: 10%;
      left: 30%;
      animation-delay: 8s;
    }

    .fc-orb-4 {
      width: 300px;
      height: 300px;
      background: var(--o);
      bottom: -100px;
      right: 20%;
      animation-delay: 12s;
    }

    @keyframes fc-orb-drift {

      0%,
      100% {
        transform: translate(0, 0) scale(1);
      }

      33% {
        transform: translate(30px, -20px) scale(1.05);
      }

      66% {
        transform: translate(-20px, 15px) scale(.95);
      }
    }

    /* ── TAG COMPONENT ───────────────────────────────────── */
    .fc-tag {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-size: 9px;
      font-weight: 700;
      letter-spacing: .26em;
      text-transform: uppercase;
    }

    .fc-tag::before {
      content: '';
      width: 22px;
      height: 1px;
      background: currentColor;
    }

    /* ── HEADINGS ────────────────────────────────────────── */
    .fc-h2 {
      font-family: var(--font-d);
      font-weight: 700;
      font-size: clamp(52px, 9vw, 110px);
      line-height: .88;
      letter-spacing: -.02em;
      color: var(--cream);
    }

    /* ── BUTTONS ─────────────────────────────────────────── */
    .fc-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: var(--font-d);
      letter-spacing: .08em;
      border-radius: 4px;
      text-decoration: none;
      transition: transform .2s, box-shadow .2s, filter .2s;
    }

    .fc-btn-y {
      background: linear-gradient(135deg, var(--y), var(--o));
      color: #080810;
      font-size: 15px;
      padding: 13px 30px;
    }

    .fc-btn-y:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 32px rgba(245, 197, 24, .28);
    }

    .fc-btn-ghost {
      border: 1.5px solid rgba(237, 232, 223, .18);
      color: var(--cream);
      font-size: 15px;
      padding: 12px 28px;
    }

    .fc-btn-ghost:hover {
      border-color: var(--y);
      color: var(--y);
    }

    /* ── REVEAL ANIMATIONS ───────────────────────────────── */
    .fc-rv {
      opacity: 0;
      transform: translateY(36px);
      transition: opacity .85s cubic-bezier(.16, 1, .3, 1), transform .85s cubic-bezier(.16, 1, .3, 1);
    }

    .fc-rv.fc-in {
      opacity: 1;
      transform: none;
    }

    .fc-d1 {
      transition-delay: .08s !important;
    }

    .fc-d2 {
      transition-delay: .16s !important;
    }

    .fc-d3 {
      transition-delay: .24s !important;
    }

    .fc-d4 {
      transition-delay: .32s !important;
    }

    .fc-d5 {
      transition-delay: .40s !important;
    }

    /* ── BRAND TICKER ────────────────────────────────────── */
    .fc-logo-ticker-section {
      padding: 48px 0;
      border-top: 1px solid rgba(255, 255, 255, .04);
      border-bottom: 1px solid rgba(255, 255, 255, .04);
      overflow: hidden;
      background: linear-gradient(180deg, rgba(8, 8, 16, 0) 0%, rgba(20, 20, 31, .6) 50%, rgba(8, 8, 16, 0) 100%);
    }

    .fc-logo-ticker-label {
      text-align: center;
      font-size: 9px;
      font-weight: 700;
      letter-spacing: .28em;
      text-transform: uppercase;
      color: rgba(107, 107, 128, .5);
      margin-bottom: 32px;
    }

    .fc-ticker-outer {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      height: 260px;
    }

    .fc-ticker-col {
      display: flex;
      flex-direction: column;
      gap: 12px;
      animation: fc-ticker-up 18s linear infinite;
    }

    .fc-ticker-col.rev {
      animation: fc-ticker-down 22s linear infinite;
    }

    @keyframes fc-ticker-up {
      0% {
        transform: translateY(0)
      }

      100% {
        transform: translateY(-50%)
      }
    }

    @keyframes fc-ticker-down {
      0% {
        transform: translateY(-50%)
      }

      100% {
        transform: translateY(0)
      }
    }

    .fc-logo-item {
      background: rgba(255, 255, 255, .03);
      border: 1px solid rgba(255, 255, 255, .05);
      border-radius: 10px;
      padding: 16px 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 64px;
      transition: border-color .3s, background .3s;
      flex-shrink: 0;
    }

    .fc-logo-item:hover {
      border-color: rgba(245, 197, 24, .25);
      background: rgba(245, 197, 24, .03);
    }

    .fc-logo-item img {
      max-height: 32px;
      max-width: 100%;
      object-fit: contain;
      filter: brightness(0) invert(1);
      opacity: .55;
      transition: opacity .3s;
    }

    .fc-logo-item:hover img {
      opacity: .9;
    }

    .fc-logo-item-text {
      font-size: 12px;
      font-weight: 700;
      color: rgba(237, 232, 223, .35);
      letter-spacing: .08em;
      text-align: center;
    }

    /* ── RESPONSIVE ──────────────────────────────────────── */
    @media (max-width: 1024px) {
      #fc-nav {
        padding: 0 28px;
      }

      .fc-footer {
        padding: 64px 28px 32px;
      }

      .fc-ticker-outer {
        grid-template-columns: repeat(2, 1fr);
        height: 200px;
      }
    }

    @media (max-width: 768px) {
      #fc-nav {
        padding: 0 18px;
        height: 62px;
      }

      #fc-hbg {
        display: flex;
      }

      .fc-nav-links {
        display: none;
      }

      .fc-footer {
        padding: 52px 18px 28px;
      }

      .fc-footer-cols {
        grid-template-columns: 1fr 1fr !important;
      }

      .fc-bg-icon {
        font-size: 16px !important;
      }

      .fc-ticker-outer {
        grid-template-columns: repeat(2, 1fr);
        height: 180px;
      }
    }

    @media (max-width: 480px) {
      .fc-footer-cols {
        grid-template-columns: 1fr !important;
      }

      .fc-ticker-outer {
        grid-template-columns: 1fr 1fr;
        height: 160px;
      }
    }
  </style>
</head>

<body>
  <!-- Film/Meme themed background icons -->
  <div class="fc-bg-icons" aria-hidden="true">
    <span class="fc-bg-icon">🎬</span>
    <span class="fc-bg-icon">😂</span>
    <span class="fc-bg-icon">🎞️</span>
    <span class="fc-bg-icon">🍿</span>
    <span class="fc-bg-icon">🎭</span>
    <span class="fc-bg-icon">📽️</span>
    <span class="fc-bg-icon">🤣</span>
    <span class="fc-bg-icon">🎪</span>
    <span class="fc-bg-icon">🎥</span>
    <span class="fc-bg-icon">💬</span>
    <span class="fc-bg-icon">🎬</span>
    <span class="fc-bg-icon">😆</span>
    <span class="fc-bg-icon">🎞️</span>
    <span class="fc-bg-icon">📢</span>
    <span class="fc-bg-icon">🎭</span>
    <span class="fc-bg-icon">🍿</span>
    <span class="fc-bg-icon">😂</span>
    <span class="fc-bg-icon">🎬</span>
    <span class="fc-bg-icon">📽️</span>
    <span class="fc-bg-icon">🤌</span>
    <span class="fc-bg-icon">🎥</span>
    <span class="fc-bg-icon">💥</span>
    <span class="fc-bg-icon">🎞️</span>
    <span class="fc-bg-icon">😎</span>
    <span class="fc-bg-icon">🌟</span>
  </div>

  <!-- Ambient orbs -->
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

  <!-- NAVBAR -->
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

  <!-- MOBILE MENU -->
  <div id="fc-mob" role="dialog" aria-modal="true" aria-label="Navigation">
    <a href="<?= base_url() ?>" class="fc-mob-link">HOME</a>
    <a href="<?= base_url('about') ?>" class="fc-mob-link">ABOUT</a>
    <a href="<?= base_url('work') ?>" class="fc-mob-link">OUR WORK</a>
    <a href="<?= base_url('contact') ?>" class="fc-mob-link" style="color:var(--y)">LET'S TALK</a>
    <div style="margin-top:48px;padding-top:28px;border-top:1px solid var(--border)">
      <p style="font-size:14px;font-weight:600;color:var(--muted);margin-bottom:6px">
        <?= htmlspecialchars($s['site_email'] ?? '') ?></p>
      <p style="font-size:14px;font-weight:600;color:var(--muted)"><?= htmlspecialchars($s['site_phone'] ?? '') ?>
      </p>
    </div>
  </div>

  <main role="main" style="position:relative;z-index:1"><?= $content ?></main>

  <!-- FOOTER -->
  <footer class="fc-footer" aria-label="Site footer">
    <div class="fc-max">
      <div class="fc-footer-cols"
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
          <span class="fc-footer-label">Navigate</span>
          <a href="<?= base_url() ?>" class="fc-footer-link">Home</a>
          <a href="<?= base_url('about') ?>" class="fc-footer-link">About</a>
          <a href="<?= base_url('work') ?>" class="fc-footer-link">Our Work</a>
          <a href="<?= base_url('contact') ?>" class="fc-footer-link">Contact</a>
        </div>
        <div>
          <span class="fc-footer-label">Services</span>
          <?php foreach (['Influencer Marketing', 'Meme Marketing', 'Movie Promotions', 'Video Production'] as $sv): ?>
            <span class="fc-footer-link" style="cursor:default"><?= $sv ?></span>
          <?php endforeach; ?>
        </div>
        <div>
          <span class="fc-footer-label">Contact</span>
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

  <script src="<?= base_url('assets/js/fc-global.js') ?>"></script>
  <script>
    // ── Cursor ────────────────────────────────────────────
    const cur = document.getElementById('fc-cursor');
    const ring = document.getElementById('fc-cursor-ring');
    const clbl = document.getElementById('fc-cursor-label');
    let mx = 0,
      my = 0,
      rx = 0,
      ry = 0;
    document.addEventListener('mousemove', e => {
      mx = e.clientX;
      my = e.clientY;
      cur.style.left = mx + 'px';
      cur.style.top = my + 'px';
      clbl.style.left = mx + 'px';
      clbl.style.top = my + 'px';
    });
    (function loop() {
      rx += (mx - rx) * .1;
      ry += (my - ry) * .1;
      ring.style.left = rx + 'px';
      ring.style.top = ry + 'px';
      requestAnimationFrame(loop);
    })();
    document.querySelectorAll('[data-fc-cur]').forEach(el => {
      el.addEventListener('mouseenter', () => {
        ring.style.width = '64px';
        ring.style.height = '64px';
        ring.style.opacity = '1';
        cur.style.transform = 'translate(-50%,-50%) scale(0)';
        clbl.style.opacity = '1';
        clbl.textContent = el.dataset.fcCur;
      });
      el.addEventListener('mouseleave', () => {
        ring.style.width = '38px';
        ring.style.height = '38px';
        ring.style.opacity = '.5';
        cur.style.transform = 'translate(-50%,-50%) scale(1)';
        clbl.style.opacity = '0';
      });
    });
    document.querySelectorAll('a:not([data-fc-cur]),button:not([data-fc-cur])').forEach(el => {
      el.addEventListener('mouseenter', () => {
        ring.style.width = '54px';
        ring.style.height = '54px';
        ring.style.opacity = '1';
      });
      el.addEventListener('mouseleave', () => {
        ring.style.width = '38px';
        ring.style.height = '38px';
        ring.style.opacity = '.5';
      });
    });

    // ── Scroll progress + nav pin ─────────────────────────
    const nav = document.getElementById('fc-nav'),
      prog = document.getElementById('fc-progress');
    window.addEventListener('scroll', () => {
      prog.style.width = (window.scrollY / (document.body.scrollHeight - window.innerHeight) * 100) + '%';
      window.scrollY > 60 ? nav.classList.add('pinned') : nav.classList.remove('pinned');
    }, {
      passive: true
    });

    // ── Reveal on scroll ──────────────────────────────────
    const rvObs = new IntersectionObserver(entries => entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('fc-in');
        rvObs.unobserve(e.target);
      }
    }), {
      threshold: .08,
      rootMargin: '0px 0px -32px 0px'
    });
    document.querySelectorAll('.fc-rv').forEach(el => rvObs.observe(el));

    // ── Mobile menu ───────────────────────────────────────
    const mob = document.getElementById('fc-mob'),
      hbg = document.getElementById('fc-hbg');
    const b1 = document.getElementById('fc-hb1'),
      b2 = document.getElementById('fc-hb2'),
      b3 = document.getElementById('fc-hb3');
    let open = false;
    hbg.addEventListener('click', () => {
      open = !open;
      mob.classList.toggle('open', open);
      document.body.style.overflow = open ? 'hidden' : '';
      hbg.setAttribute('aria-expanded', open);
      b1.style.transform = open ? 'rotate(45deg) translate(4px,5px)' : '';
      b2.style.opacity = open ? '0' : '';
      b3.style.transform = open ? 'rotate(-45deg) translate(4px,-5px)' : '';
    });
    mob.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
      open = false;
      mob.classList.remove('open');
      document.body.style.overflow = '';
      hbg.setAttribute('aria-expanded', 'false');
      b1.style.transform = '';
      b2.style.opacity = '';
      b3.style.transform = '';
    }));
  </script>
</body>

</html>