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
    /* ── GLOBAL VARS & RESET ────────────────────────── */
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
      --font-d: 'Bebas Neue', Impact, sans-serif;
      --font-b: 'Inter', system-ui, sans-serif;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0
    }

    html {
      scroll-behavior: smooth;
      -webkit-font-smoothing: antialiased
    }

    body {
      background: var(--bg);
      color: var(--cream);
      font-family: var(--font-b);
      overflow-x: hidden;
      cursor: none
    }

    ::selection {
      background: var(--y);
      color: #000
    }

    ::-webkit-scrollbar {
      width: 2px
    }

    ::-webkit-scrollbar-thumb {
      background: linear-gradient(var(--y), var(--o))
    }

    img {
      max-width: 100%;
      height: auto
    }

    /* ── BACKGROUND (background.png + SVG icons) ────── */
    #fc-bg-img {
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      background: url('<?= base_url('assets/images/background.png') ?>') center/cover no-repeat;
      opacity: .07;
      animation: bg-breathe 14s ease-in-out infinite;
    }

    @keyframes bg-breathe {

      0%,
      100% {
        opacity: .07;
        transform: scale(1)
      }

      50% {
        opacity: .10;
        transform: scale(1.008)
      }
    }

    .fc-bg-icons {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden
    }

    .fbi {
      position: absolute;
      animation: fbi-f var(--fd, 10s) ease-in-out var(--fde, 0s) infinite;
      opacity: 0;
      animation-fill-mode: forwards
    }

    @keyframes fbi-f {
      0% {
        opacity: 0;
        transform: translateY(4px) rotate(var(--fr, 0deg))
      }

      8% {
        opacity: var(--fo, .09)
      }

      50% {
        opacity: var(--fo, .09);
        transform: translateY(var(--fy, -14px)) rotate(calc(var(--fr, 0deg)+3deg))
      }

      92% {
        opacity: var(--fo, .09)
      }

      100% {
        opacity: 0;
        transform: translateY(4px) rotate(var(--fr, 0deg))
      }
    }

    /* ── ORBS ───────────────────────────────────────── */
    #fc-orbs {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden
    }

    .fc-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(110px);
      opacity: .05;
      animation: orb-d 20s ease-in-out infinite
    }

    .o1 {
      width: 700px;
      height: 700px;
      background: var(--y);
      top: -200px;
      left: -150px;
      animation-delay: 0s
    }

    .o2 {
      width: 500px;
      height: 500px;
      background: var(--p);
      top: 30%;
      right: -120px;
      animation-delay: 5s
    }

    .o3 {
      width: 400px;
      height: 400px;
      background: var(--c);
      bottom: 5%;
      left: 25%;
      animation-delay: 10s
    }

    .o4 {
      width: 350px;
      height: 350px;
      background: var(--o);
      bottom: -100px;
      right: 15%;
      animation-delay: 15s
    }

    @keyframes orb-d {

      0%,
      100% {
        transform: translate(0, 0) scale(1)
      }

      33% {
        transform: translate(25px, -18px) scale(1.04)
      }

      66% {
        transform: translate(-15px, 12px) scale(.97)
      }
    }

    /* ── CURSOR ─────────────────────────────────────── */
    #fc-cursor {
      width: 10px;
      height: 10px;
      background: var(--y);
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      mix-blend-mode: difference
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
      transition: width .25s cubic-bezier(.16, 1, .3, 1), height .25s, opacity .25s
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
      transform: translate(-50%, 22px);
      opacity: 0;
      transition: opacity .2s;
      white-space: nowrap
    }

    /* ── SCROLL PROGRESS ────────────────────────────── */
    #fc-progress {
      position: fixed;
      top: 0;
      left: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--y), var(--o), var(--p));
      z-index: 300;
      width: 0%;
      transition: width .08s linear
    }

    /* ── NAVBAR ─────────────────────────────────────── */
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
      backdrop-filter: blur(28px);
      border-bottom: 1px solid rgba(255, 255, 255, .04);
      height: 62px
    }

    .fc-logo {
      font-family: var(--font-d);
      font-size: 24px;
      letter-spacing: .06em;
      color: var(--cream);
      text-decoration: none;
      flex-shrink: 0
    }

    .fc-logo .accent {
      color: var(--y)
    }

    .fc-nav-links {
      display: flex;
      align-items: center;
      gap: 32px
    }

    .fc-nav-link {
      font-size: 13px;
      font-weight: 600;
      color: rgba(237, 232, 223, .5);
      text-decoration: none;
      letter-spacing: .03em;
      transition: color .2s;
      position: relative;
      white-space: nowrap
    }

    .fc-nav-link:hover,
    .fc-nav-link.active {
      color: var(--cream)
    }

    .fc-nav-link::after {
      content: '';
      position: absolute;
      bottom: -3px;
      left: 0;
      width: 0;
      height: 1px;
      background: var(--y);
      transition: width .35s cubic-bezier(.16, 1, .3, 1)
    }

    .fc-nav-link:hover::after,
    .fc-nav-link.active::after {
      width: 100%
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
      white-space: nowrap;
      flex-shrink: 0
    }

    .fc-nav-cta:hover {
      transform: translateY(-2px);
      filter: brightness(1.1)
    }

    /* ── HAMBURGER ──────────────────────────────────── */
    #fc-hbg {
      display: none;
      background: none;
      border: none;
      cursor: pointer;
      flex-direction: column;
      gap: 5px;
      padding: 8px;
      z-index: 201;
      position: relative
    }

    .fc-hb {
      display: block;
      width: 22px;
      height: 1.5px;
      background: var(--cream);
      transition: all .3s cubic-bezier(.16, 1, .3, 1)
    }

    /* ── MOBILE MENU ────────────────────────────────── */
    #fc-mob {
      position: fixed;
      inset: 0;
      z-index: 190;
      background: rgba(8, 8, 16, .98);
      backdrop-filter: blur(20px);
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;
      padding: 0 32px;
      gap: 4px;
      opacity: 0;
      pointer-events: none;
      transition: opacity .35s;
    }

    #fc-mob.open {
      opacity: 1;
      pointer-events: all
    }

    .fc-mob-link {
      font-family: var(--font-d);
      font-size: clamp(36px, 9vw, 64px);
      color: rgba(237, 232, 223, .12);
      text-decoration: none;
      line-height: 1.05;
      transition: color .25s, transform .3s;
      display: block;
      padding: 6px 0
    }

    .fc-mob-link:hover {
      color: var(--y);
      transform: translateX(10px)
    }

    .mob-contact {
      margin-top: 40px;
      padding-top: 24px;
      border-top: 1px solid var(--border)
    }

    .mob-contact p {
      font-size: 13px;
      font-weight: 600;
      color: var(--muted);
      margin-bottom: 6px
    }

    /* ── FOOTER ─────────────────────────────────────── */
    .fc-footer {
      background: #050510;
      border-top: 1px solid var(--border);
      padding: 72px 52px 36px;
      position: relative;
      z-index: 1
    }

    .fc-footer-logo {
      font-family: var(--font-d);
      font-size: 26px;
      letter-spacing: .06em;
      margin-bottom: 14px;
      color: var(--cream)
    }

    .fc-footer-label {
      font-size: 9px;
      font-weight: 700;
      letter-spacing: .22em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 16px;
      display: block
    }

    .fc-footer-link {
      display: block;
      font-size: 13px;
      color: rgba(237, 232, 223, .4);
      font-weight: 500;
      margin-bottom: 10px;
      text-decoration: none;
      transition: color .2s
    }

    .fc-footer-link:hover {
      color: var(--y)
    }

    .fc-social {
      width: 34px;
      height: 34px;
      border: 1px solid rgba(255, 255, 255, .08);
      border-radius: 4px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      font-weight: 700;
      color: var(--muted);
      text-decoration: none;
      transition: all .2s
    }

    .fc-social:hover {
      border-color: var(--y);
      color: var(--y)
    }

    .fc-max {
      max-width: 1380px;
      margin: 0 auto
    }

    .fc-grad-1 {
      background: linear-gradient(135deg, var(--y), var(--o));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text
    }

    /* ── REVEAL ─────────────────────────────────────── */
    .fc-rv {
      opacity: 0;
      transform: translateY(36px);
      transition: opacity .85s cubic-bezier(.16, 1, .3, 1), transform .85s cubic-bezier(.16, 1, .3, 1)
    }

    .fc-rv.fc-in {
      opacity: 1;
      transform: none
    }

    .d1 {
      transition-delay: .08s !important
    }

    .d2 {
      transition-delay: .16s !important
    }

    .d3 {
      transition-delay: .24s !important
    }

    .d4 {
      transition-delay: .32s !important
    }

    /* ── RESPONSIVE ─────────────────────────────────── */
    @media(max-width:1024px) {
      #fc-nav {
        padding: 0 28px
      }

      .fc-footer {
        padding: 56px 28px 28px
      }
    }

    @media(max-width:768px) {
      #fc-nav {
        padding: 0 18px;
        height: 60px
      }

      #fc-hbg {
        display: flex
      }

      .fc-nav-links {
        display: none
      }

      .fc-footer {
        padding: 48px 18px 24px
      }

      .fc-footer-cols {
        grid-template-columns: 1fr 1fr !important
      }

      body {
        cursor: auto
      }

      #fc-cursor,
      #fc-cursor-ring,
      #fc-cursor-label {
        display: none !important
      }
    }

    @media(max-width:480px) {
      .fc-footer-cols {
        grid-template-columns: 1fr !important
      }

      #fc-nav {
        height: 56px
      }
    }
  </style>
</head>

<body>

  <!-- Fixed background.png -->
  <div id="fc-bg-img" aria-hidden="true"></div>

  <!-- SVG floating icons (match reference: camera, reel, clap, meme dog, popcorn, etc.) -->
  <div class="fc-bg-icons" aria-hidden="true">
    <!-- Film Camera -->
    <svg class="fbi" style="left:5%;top:9%;width:62px;--fo:.10;--fd:11s;--fde:.2s;--fr:-6deg;--fy:-16px"
      viewBox="0 0 64 50" fill="none">
      <rect x="4" y="10" width="38" height="26" rx="4" fill="#888" />
      <polygon points="42,16 58,10 58,36 42,30" fill="#777" />
      <circle cx="18" cy="23" r="7" fill="#555" />
      <circle cx="18" cy="23" r="4" fill="#444" />
      <rect x="6" y="38" width="5" height="7" rx="1" fill="#777" />
      <rect x="13" y="38" width="5" height="7" rx="1" fill="#777" />
      <rect x="24" y="38" width="5" height="7" rx="1" fill="#777" />
      <rect x="31" y="38" width="5" height="7" rx="1" fill="#777" />
    </svg>
    <!-- Film Reel -->
    <svg class="fbi" style="left:30%;top:19%;width:52px;--fo:.09;--fd:9s;--fde:1.4s;--fr:8deg;--fy:-12px"
      viewBox="0 0 60 68" fill="none">
      <circle cx="28" cy="28" r="22" stroke="#888" stroke-width="3" fill="none" />
      <circle cx="28" cy="28" r="8" stroke="#888" stroke-width="3" fill="#444" />
      <circle cx="28" cy="8" r="4" fill="#777" />
      <circle cx="28" cy="48" r="4" fill="#777" />
      <circle cx="11" cy="18" r="4" fill="#777" />
      <circle cx="45" cy="18" r="4" fill="#777" />
      <circle cx="11" cy="38" r="4" fill="#777" />
      <circle cx="45" cy="38" r="4" fill="#777" />
      <path d="M32 48 Q42 60 28 68 Q18 72 22 64" stroke="#888" stroke-width="2.5" fill="none"
        stroke-linecap="round" />
    </svg>
    <!-- This is Fine dog -->
    <svg class="fbi" style="left:34%;top:4%;width:108px;--fo:.10;--fd:13s;--fde:2s;--fr:2deg;--fy:-18px"
      viewBox="0 0 130 88" fill="none">
      <rect x="0" y="0" width="72" height="36" rx="10" fill="#ccc" opacity=".85" />
      <polygon points="18,36 32,36 22,48" fill="#ccc" opacity=".85" />
      <text x="8" y="15" font-size="10" fill="#333" font-family="sans-serif" font-weight="600">This is</text>
      <text x="10" y="30" font-size="10" fill="#333" font-family="sans-serif" font-weight="600">Fine</text>
      <ellipse cx="106" cy="30" rx="8" ry="16" fill="#F5C518" opacity=".65" />
      <ellipse cx="114" cy="25" rx="6" ry="13" fill="#FF6432" opacity=".65" />
      <ellipse cx="98" cy="28" rx="5" ry="11" fill="#F5C518" opacity=".55" />
      <circle cx="88" cy="58" r="17" fill="#888" />
      <ellipse cx="80" cy="67" rx="7" ry="10" fill="#777" />
      <ellipse cx="97" cy="67" rx="7" ry="10" fill="#777" />
      <circle cx="84" cy="54" r="3.5" fill="#555" />
      <circle cx="93" cy="54" r="3.5" fill="#555" />
    </svg>
    <!-- Popcorn bucket -->
    <svg class="fbi" style="left:72%;top:6%;width:70px;--fo:.09;--fd:8s;--fde:.5s;--fr:12deg;--fy:-14px"
      viewBox="0 0 80 90" fill="none">
      <path d="M10 30 L18 80 H62 L70 30 Z" fill="#888" />
      <rect x="8" y="22" width="64" height="12" rx="3" fill="#777" />
      <line x1="27" y1="22" x2="23" y2="80" stroke="#aaa" stroke-width="3" />
      <line x1="53" y1="22" x2="57" y2="80" stroke="#aaa" stroke-width="3" />
      <circle cx="25" cy="18" r="7" fill="#ccc" opacity=".85" />
      <circle cx="40" cy="12" r="9" fill="#ddd" opacity=".85" />
      <circle cx="55" cy="17" r="7" fill="#ccc" opacity=".85" />
      <circle cx="33" cy="8" r="6" fill="#bbb" opacity=".75" />
    </svg>
    <!-- Scattered popcorn -->
    <svg class="fbi" style="left:3%;top:35%;width:42px;--fo:.08;--fd:14s;--fde:3s;--fr:-5deg;--fy:-8px"
      viewBox="0 0 56 44">
      <circle cx="10" cy="22" r="7" fill="#aaa" />
      <circle cx="26" cy="14" r="8" fill="#bbb" />
      <circle cx="42" cy="24" r="6" fill="#999" />
    </svg>
    <svg class="fbi" style="right:3%;top:28%;width:38px;--fo:.08;--fd:9s;--fde:1.8s;--fr:7deg;--fy:-10px"
      viewBox="0 0 56 56">
      <circle cx="12" cy="14" r="7" fill="#bbb" />
      <circle cx="32" cy="9" r="7" fill="#aaa" />
      <circle cx="25" cy="30" r="8" fill="#ccc" />
      <circle cx="42" cy="36" r="7" fill="#bbb" />
    </svg>
    <svg class="fbi" style="right:7%;top:62%;width:42px;--fo:.07;--fd:13s;--fde:4s;--fr:-9deg;--fy:-12px"
      viewBox="0 0 60 52">
      <circle cx="10" cy="20" r="7" fill="#bbb" />
      <circle cx="28" cy="11" r="9" fill="#ccc" />
      <circle cx="46" cy="22" r="6" fill="#aaa" />
      <circle cx="38" cy="40" r="8" fill="#ccc" />
    </svg>
    <!-- Trending chart + face -->
    <svg class="fbi" style="left:50%;top:43%;width:74px;--fo:.09;--fd:11s;--fde:1s;--fr:3deg;--fy:-15px"
      viewBox="0 0 90 70" fill="none">
      <path d="M10 55 L34 30 L55 44 L80 12" stroke="#aaa" stroke-width="3.5" fill="none" stroke-linecap="round"
        stroke-linejoin="round" />
      <polygon points="80,12 71,18 85,20" fill="#aaa" />
      <circle cx="34" cy="26" r="11" fill="#999" />
      <circle cx="29" cy="22" r="2.5" fill="#444" />
      <circle cx="39" cy="22" r="2.5" fill="#444" />
      <path d="M29 31 Q34 35 39 31" stroke="#444" stroke-width="1.5" fill="none" />
    </svg>
    <!-- Curry bowl + filmstrip -->
    <svg class="fbi" style="left:13%;top:69%;width:80px;--fo:.09;--fd:13s;--fde:2.5s;--fr:-3deg;--fy:-10px"
      viewBox="0 0 100 78" fill="none">
      <path d="M30 18 Q27 10 30 4" stroke="#888" stroke-width="2" fill="none" stroke-linecap="round" />
      <path d="M42 16 Q39 8 42 2" stroke="#888" stroke-width="2" fill="none" stroke-linecap="round" />
      <path d="M54 18 Q51 10 54 4" stroke="#888" stroke-width="2" fill="none" stroke-linecap="round" />
      <path d="M12 34 Q12 60 50 60 Q88 60 88 34 Z" fill="#777" />
      <ellipse cx="50" cy="34" rx="38" ry="8" fill="#888" />
      <path d="M14 56 Q50 70 86 56" stroke="#666" stroke-width="6" fill="none" />
      <rect x="18" y="52" width="6" height="5" rx="1" fill="#aaa" />
      <rect x="30" y="57" width="6" height="5" rx="1" fill="#aaa" />
      <rect x="46" y="60" width="6" height="5" rx="1" fill="#aaa" />
      <rect x="62" y="57" width="6" height="5" rx="1" fill="#aaa" />
    </svg>
    <!-- Clapperboard -->
    <svg class="fbi" style="left:44%;top:73%;width:68px;--fo:.10;--fd:10s;--fde:.8s;--fr:-4deg;--fy:-11px"
      viewBox="0 0 80 78" fill="none">
      <rect x="4" y="22" width="72" height="50" rx="4" fill="#666" />
      <rect x="4" y="10" width="72" height="16" rx="3" fill="#555" />
      <line x1="18" y1="10" x2="12" y2="26" stroke="#888" stroke-width="4" />
      <line x1="30" y1="10" x2="24" y2="26" stroke="#888" stroke-width="4" />
      <line x1="42" y1="10" x2="36" y2="26" stroke="#888" stroke-width="4" />
      <line x1="54" y1="10" x2="48" y2="26" stroke="#888" stroke-width="4" />
      <line x1="66" y1="10" x2="60" y2="26" stroke="#888" stroke-width="4" />
      <text x="10" y="46" font-size="7" fill="#aaa" font-family="monospace" font-weight="600">FILM-CURRY</text>
      <text x="10" y="58" font-size="7" fill="#aaa" font-family="monospace">TAKE: 1</text>
    </svg>
    <!-- Sigma male -->
    <svg class="fbi" style="right:15%;top:67%;width:58px;--fo:.08;--fd:10s;--fde:.6s;--fr:4deg;--fy:-12px"
      viewBox="0 0 70 88" fill="none">
      <circle cx="35" cy="26" r="20" fill="#888" />
      <ellipse cx="27" cy="23" rx="3" ry="4" fill="#555" />
      <ellipse cx="43" cy="23" rx="3" ry="4" fill="#555" />
      <line x1="26" y1="33" x2="44" y2="33" stroke="#555" stroke-width="2" />
      <path d="M10 88 Q10 60 35 56 Q60 60 60 88 Z" fill="#777" />
    </svg>
    <!-- Stars -->
    <svg class="fbi" style="right:2%;top:7%;width:20px;--fo:.10;--fd:7s;--fde:1.2s;--fr:0deg;--fy:-6px"
      viewBox="0 0 24 24">
      <path d="M12 2L13.8 10.2L22 12L13.8 13.8L12 22L10.2 13.8L2 12L10.2 10.2Z" fill="#ccc" />
    </svg>
    <svg class="fbi" style="left:86%;top:50%;width:16px;--fo:.08;--fd:8s;--fde:2.8s;--fr:15deg;--fy:-5px"
      viewBox="0 0 24 24">
      <path d="M12 2L13.8 10.2L22 12L13.8 13.8L12 22L10.2 13.8L2 12L10.2 10.2Z" fill="#ccc" />
    </svg>
  </div>

  <!-- Orbs -->
  <div id="fc-orbs" aria-hidden="true">
    <div class="fc-orb o1"></div>
    <div class="fc-orb o2"></div>
    <div class="fc-orb o3"></div>
    <div class="fc-orb o4"></div>
  </div>

  <div id="fc-cursor" aria-hidden="true"></div>
  <div id="fc-cursor-ring" aria-hidden="true"></div>
  <div id="fc-cursor-label" aria-hidden="true"></div>
  <div id="fc-progress" aria-hidden="true"></div>

  <!-- NAVBAR -->
  <nav id="fc-nav" role="navigation" aria-label="Main navigation">
    <a href="<?= base_url() ?>" class="fc-logo" aria-label="<?= htmlspecialchars($site_title) ?> Home">
      <?php if ($logo_url): ?>
        <img src="<?= $logo_url ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:32px;width:auto">
        <?php else: ?>FILMY<span class="accent">CURRY</span><?php endif; ?>
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
      <span class="fc-hb" id="b1"></span>
      <span class="fc-hb" id="b2"></span>
      <span class="fc-hb" id="b3"></span>
    </button>
  </nav>

  <!-- MOBILE MENU -->
  <div id="fc-mob" role="dialog" aria-modal="true" aria-label="Navigation">
    <a href="<?= base_url() ?>" class="fc-mob-link">HOME</a>
    <a href="<?= base_url('about') ?>" class="fc-mob-link">ABOUT</a>
    <a href="<?= base_url('work') ?>" class="fc-mob-link">OUR WORK</a>
    <a href="<?= base_url('contact') ?>" class="fc-mob-link" style="color:var(--y)">LET'S TALK</a>
    <div class="mob-contact">
      <p><?= htmlspecialchars($s['site_email'] ?? '') ?></p>
      <p><?= htmlspecialchars($s['site_phone'] ?? '') ?></p>
    </div>
  </div>

  <main role="main" style="position:relative;z-index:1"><?= $content ?></main>

  <!-- FOOTER -->
  <footer class="fc-footer" aria-label="Site footer">
    <div class="fc-max">
      <div class="fc-footer-cols"
        style="display:grid;grid-template-columns:1.3fr 1fr 1fr 1fr;gap:44px;margin-bottom:48px">
        <div>
          <div class="fc-footer-logo">FILMY<span class="fc-grad-1">CURRY</span></div>
          <p style="font-size:13px;color:var(--muted);line-height:1.8;max-width:250px;font-weight:500">India's
            premier influencer & meme marketing agency. Powering 32% of all OTT releases.</p>
          <div style="display:flex;gap:8px;margin-top:20px">
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
        style="border-top:1px solid var(--border);padding-top:20px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px">
        <p style="font-size:11px;color:rgba(237,232,223,.18);font-weight:500">© <?= date('Y') ?>
          <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
        <p style="font-size:11px;color:rgba(237,232,223,.18);font-weight:500">Made with 🎬 in India</p>
      </div>
    </div>
  </footer>

  <script src="<?= base_url('assets/js/fc-global.js') ?>"></script>
  <script>
    (function() {
      var isTouch = !window.matchMedia('(pointer:fine)').matches;
      var cur = document.getElementById('fc-cursor');
      var ring = document.getElementById('fc-cursor-ring');
      var clbl = document.getElementById('fc-cursor-label');

      if (isTouch) {
        if (cur) cur.style.display = 'none';
        if (ring) ring.style.display = 'none';
        if (clbl) clbl.style.display = 'none';
        document.body.style.cursor = 'auto';
      } else {
        var mx = 0,
          my = 0,
          rx = 0,
          ry = 0;
        document.addEventListener('mousemove', function(e) {
          mx = e.clientX;
          my = e.clientY;
          if (cur) {
            cur.style.left = mx + 'px';
            cur.style.top = my + 'px';
          }
          if (clbl) {
            clbl.style.left = mx + 'px';
            clbl.style.top = my + 'px';
          }
        });
        (function loop() {
          rx += (mx - rx) * .1;
          ry += (my - ry) * .1;
          if (ring) {
            ring.style.left = rx + 'px';
            ring.style.top = ry + 'px';
          }
          requestAnimationFrame(loop);
        })();
        document.querySelectorAll('[data-fc-cur]').forEach(function(el) {
          el.addEventListener('mouseenter', function() {
            if (ring) {
              ring.style.width = '64px';
              ring.style.height = '64px';
              ring.style.opacity = '1';
            }
            if (cur) cur.style.transform = 'translate(-50%,-50%) scale(0)';
            if (clbl) {
              clbl.style.opacity = '1';
              clbl.textContent = el.dataset.fcCur;
            }
          });
          el.addEventListener('mouseleave', function() {
            if (ring) {
              ring.style.width = '38px';
              ring.style.height = '38px';
              ring.style.opacity = '.5';
            }
            if (cur) cur.style.transform = 'translate(-50%,-50%) scale(1)';
            if (clbl) clbl.style.opacity = '0';
          });
        });
        document.querySelectorAll('a:not([data-fc-cur]),button:not([data-fc-cur])').forEach(function(el) {
          el.addEventListener('mouseenter', function() {
            if (ring) {
              ring.style.width = '54px';
              ring.style.height = '54px';
              ring.style.opacity = '1';
            }
          });
          el.addEventListener('mouseleave', function() {
            if (ring) {
              ring.style.width = '38px';
              ring.style.height = '38px';
              ring.style.opacity = '.5';
            }
          });
        });
      }

      var nav = document.getElementById('fc-nav');
      var prog = document.getElementById('fc-progress');
      window.addEventListener('scroll', function() {
        if (prog) prog.style.width = (window.scrollY / (document.body.scrollHeight - window
          .innerHeight) * 100) + '%';
        if (nav) window.scrollY > 60 ? nav.classList.add('pinned') : nav.classList.remove('pinned');
      }, {
        passive: true
      });

      var rvObs = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
          if (e.isIntersecting) {
            e.target.classList.add('fc-in');
            rvObs.unobserve(e.target);
          }
        });
      }, {
        threshold: .08,
        rootMargin: '0px 0px -32px 0px'
      });
      document.querySelectorAll('.fc-rv').forEach(function(el) {
        rvObs.observe(el);
      });

      var mob = document.getElementById('fc-mob');
      var hbg = document.getElementById('fc-hbg');
      var b1 = document.getElementById('b1'),
        b2 = document.getElementById('b2'),
        b3 = document.getElementById('b3');
      var open = false;
      if (hbg) {
        hbg.addEventListener('click', function() {
          open = !open;
          if (mob) mob.classList.toggle('open', open);
          document.body.style.overflow = open ? 'hidden' : '';
          hbg.setAttribute('aria-expanded', open);
          if (b1) b1.style.transform = open ? 'rotate(45deg) translate(4px,5px)' : '';
          if (b2) b2.style.opacity = open ? '0' : '';
          if (b3) b3.style.transform = open ? 'rotate(-45deg) translate(4px,-5px)' : '';
        });
        if (mob) mob.querySelectorAll('a').forEach(function(a) {
          a.addEventListener('click', function() {
            open = false;
            mob.classList.remove('open');
            document.body.style.overflow = '';
            hbg.setAttribute('aria-expanded', 'false');
            if (b1) b1.style.transform = '';
            if (b2) b2.style.opacity = '';
            if (b3) b3.style.transform = '';
          });
        });
      }
    })();
  </script>
</body>

</html>