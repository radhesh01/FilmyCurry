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
  $logo       = (!empty($s['site_logo'])) ? base_url('assets/images/uploads/' . $s['site_logo']) : '';
  ?>
  <title><?= htmlspecialchars($pg_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
  <meta name="robots" content="index, follow">
  <meta property="og:title" content="<?= htmlspecialchars($pg_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="canonical" href="<?= base_url(uri_string()) ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Cabinet+Grotesk:wght@400;500;700;800;900&family=Instrument+Serif:ital@0;1&display=swap"
    rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            fc: {
              y: '#F5C518',
              y2: '#FFD24D',
              o: '#FF6B35',
              o2: '#FF8C5A',
              p: '#E040FB',
              p2: '#CE93D8',
              c: '#00E5FF',
              c2: '#80DEEA',
              g: '#69FF47',
              bg: '#0D0D0F',
              ink: '#111116',
              card: '#16161C',
              cream: '#F0EBE3',
              muted: '#888896',
              border: '#222230'
            }
          },
          fontFamily: {
            dis: ['Cabinet Grotesk', 'sans-serif'],
            serif: ['Instrument Serif', 'serif'],
            body: ['Cabinet Grotesk', 'sans-serif']
          }
        }
      }
    }
  </script>

  <style>
    :root {
      --y: #F5C518;
      --o: #FF6B35;
      --p: #E040FB;
      --c: #00E5FF;
      --g: #69FF47;
      --bg: #0D0D0F;
      --ink: #111116;
      --card: #16161C;
      --cream: #F0EBE3;
      --border: #222230;
      --muted: #888896;
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
      font-family: 'Cabinet Grotesk', sans-serif;
      overflow-x: hidden;
      cursor: none
    }

    ::selection {
      background: var(--y);
      color: #000
    }

    ::-webkit-scrollbar {
      width: 3px
    }

    ::-webkit-scrollbar-thumb {
      background: linear-gradient(var(--y), var(--o), var(--p))
    }

    /* ── CUSTOM CURSOR ─────────────────────────────────── */
    #cur {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: var(--y);
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform .1s, background .3s;
      mix-blend-mode: difference
    }

    #cur-ring {
      width: 44px;
      height: 44px;
      border: 1.5px solid rgba(245, 197, 24, .5);
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      transition: all .25s cubic-bezier(.16, 1, .3, 1)
    }

    body.ch #cur {
      transform: translate(-50%, -50%) scale(0)
    }

    body.ch #cur-ring {
      width: 72px;
      height: 72px;
      border-color: var(--y);
      border-width: 1px
    }

    #cur-txt {
      position: fixed;
      pointer-events: none;
      z-index: 9997;
      font-size: 10px;
      font-weight: 700;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: var(--y);
      transform: translate(-50%, -50%);
      opacity: 0;
      transition: opacity .2s;
      white-space: nowrap
    }

    body.ch #cur-txt {
      opacity: 1
    }

    /* ── SCROLL PROGRESS ────────────────────────────────── */
    #sp {
      position: fixed;
      top: 0;
      left: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--y), var(--o), var(--p), var(--c));
      z-index: 300;
      width: 0%;
      transition: width .08s linear
    }

    /* ── NAVBAR ─────────────────────────────────────────── */
    #nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 200;
      padding: 0 56px;
      height: 76px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: all .5s cubic-bezier(.16, 1, .3, 1)
    }

    #nav.pinned {
      background: rgba(13, 13, 15, .96);
      backdrop-filter: blur(28px);
      height: 64px;
      border-bottom: 1px solid rgba(255, 255, 255, .04)
    }

    .n-logo {
      font-family: 'Cabinet Grotesk', sans-serif;
      font-weight: 900;
      font-size: 22px;
      letter-spacing: -.03em;
      color: var(--cream);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 2px
    }

    .n-logo span {
      background: linear-gradient(135deg, var(--y), var(--o));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text
    }

    .n-links {
      display: flex;
      align-items: center;
      gap: 32px
    }

    .n-link {
      font-size: 14px;
      font-weight: 700;
      letter-spacing: -.01em;
      color: rgba(240, 235, 227, .45);
      text-decoration: none;
      transition: color .2s;
      position: relative
    }

    .n-link:hover,
    .n-link.act {
      color: var(--cream)
    }

    .n-link::after {
      content: '';
      position: absolute;
      bottom: -3px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--y);
      border-radius: 1px;
      transition: width .35s cubic-bezier(.16, 1, .3, 1)
    }

    .n-link:hover::after,
    .n-link.act::after {
      width: 100%
    }

    .n-cta {
      background: linear-gradient(135deg, var(--y), var(--o));
      color: #0D0D0F;
      font-weight: 900;
      font-size: 13px;
      letter-spacing: .02em;
      padding: 11px 24px;
      border-radius: 100px;
      text-decoration: none;
      transition: transform .2s, box-shadow .2s;
      display: inline-block
    }

    .n-cta:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 8px 28px rgba(245, 197, 24, .35)
    }

    /* ── MOBILE MENU ────────────────────────────────────── */
    #mob {
      position: fixed;
      inset: 0;
      z-index: 190;
      background: var(--bg);
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 0 40px;
      gap: 4px;
      opacity: 0;
      pointer-events: none;
      transition: opacity .4s
    }

    #mob.open {
      opacity: 1;
      pointer-events: all
    }

    .mob-l {
      font-family: 'Cabinet Grotesk', sans-serif;
      font-weight: 900;
      font-size: clamp(36px, 10vw, 68px);
      color: rgba(240, 235, 227, .1);
      text-decoration: none;
      transition: color .25s, transform .3s;
      display: block;
      line-height: 1.05
    }

    .mob-l:hover {
      color: var(--y);
      transform: translateX(10px)
    }

    #hbg {
      background: none;
      border: none;
      cursor: pointer;
      display: none;
      flex-direction: column;
      gap: 5px;
      padding: 8px
    }

    .hb {
      display: block;
      width: 22px;
      height: 1.5px;
      background: var(--cream);
      transition: all .3s cubic-bezier(.16, 1, .3, 1)
    }

    /* ── REVEAL ANIMS ───────────────────────────────────── */
    .rv {
      opacity: 0;
      transform: translateY(48px);
      transition: opacity .9s cubic-bezier(.16, 1, .3, 1), transform .9s cubic-bezier(.16, 1, .3, 1)
    }

    .rv.in {
      opacity: 1;
      transform: none
    }

    .rv-l {
      opacity: 0;
      transform: translateX(-40px);
      transition: opacity .9s cubic-bezier(.16, 1, .3, 1), transform .9s cubic-bezier(.16, 1, .3, 1)
    }

    .rv-l.in {
      opacity: 1;
      transform: none
    }

    .d1 {
      transition-delay: .07s !important
    }

    .d2 {
      transition-delay: .14s !important
    }

    .d3 {
      transition-delay: .21s !important
    }

    .d4 {
      transition-delay: .28s !important
    }

    .d5 {
      transition-delay: .35s !important
    }

    .d6 {
      transition-delay: .42s !important
    }

    /* ── MARQUEE ────────────────────────────────────────── */
    .mq-wrap {
      overflow: hidden
    }

    .mq-track {
      display: flex;
      gap: 72px;
      white-space: nowrap;
      animation: mq-run 28s linear infinite;
      width: max-content
    }

    .mq-track:hover {
      animation-play-state: paused
    }

    @keyframes mq-run {
      0% {
        transform: translateX(0)
      }

      100% {
        transform: translateX(-50%)
      }
    }

    /* ── GRADIENT TAGS ──────────────────────────────────── */
    .gt {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 10px;
      font-weight: 800;
      letter-spacing: .22em;
      text-transform: uppercase
    }

    .gt::before {
      content: '';
      width: 24px;
      height: 2px;
      background: currentColor;
      border-radius: 1px
    }

    /* ── BUTTONS ────────────────────────────────────────── */
    .btn-y {
      background: linear-gradient(135deg, var(--y), var(--o));
      color: #0D0D0F;
      font-weight: 900;
      font-size: 14px;
      letter-spacing: .02em;
      padding: 14px 32px;
      border-radius: 100px;
      text-decoration: none;
      display: inline-block;
      transition: transform .2s, box-shadow .2s
    }

    .btn-y:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 36px rgba(245, 197, 24, .3)
    }

    .btn-ghost {
      border: 1.5px solid rgba(240, 235, 227, .2);
      color: var(--cream);
      font-weight: 700;
      font-size: 14px;
      letter-spacing: .02em;
      padding: 13px 30px;
      border-radius: 100px;
      text-decoration: none;
      display: inline-block;
      transition: all .25s
    }

    .btn-ghost:hover {
      border-color: var(--y);
      color: var(--y)
    }

    /* ── NOISE OVERLAY ──────────────────────────────────── */
    .noise::after {
      content: '';
      position: absolute;
      inset: 0;
      pointer-events: none;
      opacity: .03;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")
    }

    /* ── MISC ───────────────────────────────────────────── */
    @media(max-width:768px) {
      #nav {
        padding: 0 20px
      }

      #hbg {
        display: flex
      }

      .n-links {
        display: none
      }

      #mob {
        padding: 0 28px
      }
    }
  </style>
</head>

<body>

  <div id="cur"></div>
  <div id="cur-ring"></div>
  <div id="cur-txt"></div>
  <div id="sp"></div>

  <!-- NAV -->
  <nav id="nav" role="navigation" aria-label="Main navigation">
    <a href="<?= base_url() ?>" class="n-logo" aria-label="FilmyCurry Home">
      <?php if ($logo): ?>
        <img src="<?= $logo ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:34px">
      <?php else: ?>
        FILMY<span>CURRY</span>
      <?php endif; ?>
    </a>
    <div class="n-links">
      <a href="<?= base_url() ?>" class="n-link <?= ($uri === '' || $uri === '/') ? 'act' : '' ?>">Home</a>
      <a href="<?= base_url('about') ?>"
        class="n-link <?= strpos($uri, 'about') !== FALSE ? 'act' : '' ?>">About</a>
      <a href="<?= base_url('work') ?>" class="n-link <?= strpos($uri, 'work') !== FALSE ? 'act' : '' ?>">Our
        Work</a>
      <a href="<?= base_url('contact') ?>" class="n-cta">Let's Talk ↗</a>
    </div>
    <button id="hbg" aria-label="Toggle menu" aria-expanded="false">
      <span class="hb" id="b1"></span><span class="hb" id="b2"></span><span class="hb" id="b3"></span>
    </button>
  </nav>

  <!-- MOBILE MENU -->
  <div id="mob" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <a href="<?= base_url() ?>" class="mob-l">HOME</a>
    <a href="<?= base_url('about') ?>" class="mob-l">ABOUT</a>
    <a href="<?= base_url('work') ?>" class="mob-l">OUR WORK</a>
    <a href="<?= base_url('contact') ?>" class="mob-l" style="color:var(--y)">LET'S TALK</a>
    <div style="margin-top:48px;border-top:1px solid var(--border);padding-top:28px">
      <p style="font-size:14px;color:var(--muted)"><?= htmlspecialchars($s['site_email'] ?? '') ?></p>
      <p style="font-size:14px;color:var(--muted);margin-top:6px"><?= htmlspecialchars($s['site_phone'] ?? '') ?>
      </p>
    </div>
  </div>

  <main><?= $content ?></main>

  <!-- FOOTER -->
  <footer style="background:#080810;border-top:1px solid var(--border);padding:80px 56px 40px" class="px-6 md:px-14">
    <div style="max-width:1400px;margin:0 auto">
      <div style="display:grid;grid-template-columns:1.2fr 1fr 1fr 1fr;gap:48px;margin-bottom:64px"
        class="footer-grid">

        <div>
          <div style="font-weight:900;font-size:26px;letter-spacing:-.03em;margin-bottom:16px">
            FILMY<span
              style="background:linear-gradient(135deg,var(--y),var(--o));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">CURRY</span>
          </div>
          <p style="font-size:14px;color:var(--muted);line-height:1.8;max-width:260px">India's premier
            influencer & meme marketing agency. Powering 32% of all OTT releases.</p>
          <div style="display:flex;gap:10px;margin-top:28px">
            <?php foreach (['In', 'Ig', 'X'] as $ic): ?>
              <a href="#" aria-label="Social"
                style="width:38px;height:38px;border:1.5px solid var(--border);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:var(--muted);text-decoration:none;transition:all .2s"
                onmouseover="this.style.borderColor='var(--y)';this.style.color='var(--y)'"
                onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--muted)'"><?= $ic ?></a>
            <?php endforeach; ?>
          </div>
        </div>

        <?php foreach (
          [
            ['Navigate', [['', 'Home'], ['about', 'About'], ['work', 'Our Work'], ['contact', 'Contact']]],
            ['Services', [['#', 'Influencer Mktg'], ['#', 'Meme Marketing'], ['#', 'Movie Promo'], ['#', 'Video Production']]],
            ['Contact', [[$s['site_email'] ?? '', htmlspecialchars($s['site_email'] ?? 'contact@filmycurry.com')], [$s['site_phone'] ?? '', htmlspecialchars($s['site_phone'] ?? '')], ['', 'India']]],
          ] as $col
        ): ?>
          <div>
            <p
              style="font-size:10px;font-weight:800;letter-spacing:.22em;text-transform:uppercase;color:var(--muted);margin-bottom:20px">
              <?= $col[0] ?></p>
            <?php foreach ($col[1] as $lnk): ?>
              <a href="<?= $col[0] === 'Contact' ? ($lnk[0] ? 'mailto:' . $lnk[0] : '#') : base_url($lnk[0]) ?>"
                style="display:block;font-size:14px;color:rgba(240,235,227,.45);margin-bottom:12px;text-decoration:none;transition:color .2s"
                onmouseover="this.style.color='var(--y)'"
                onmouseout="this.style.color='rgba(240,235,227,.45)'"><?= $lnk[1] ?></a>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Bottom bar -->
      <div
        style="border-top:1px solid var(--border);padding-top:28px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <p style="font-size:12px;color:rgba(240,235,227,.2)">© <?= date('Y') ?>
          <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
        <div style="display:flex;gap:8px;align-items:center">
          <span style="font-size:12px;color:rgba(240,235,227,.2)">Made with</span>
          <span style="font-size:16px">🎬</span>
          <span style="font-size:12px;color:rgba(240,235,227,.2)">in India</span>
        </div>
      </div>
    </div>
  </footer>

  <style>
    @media(max-width:768px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr !important
      }

      footer {
        padding: 56px 24px 32px !important
      }
    }

    @media(max-width:480px) {
      .footer-grid {
        grid-template-columns: 1fr !important
      }
    }
  </style>

  <script>
    /* ── CURSOR ─── */
    const cur = document.getElementById('cur'),
      ring = document.getElementById('cur-ring'),
      ctxt = document.getElementById('cur-txt');
    let mx = 0,
      my = 0,
      rx = 0,
      ry = 0;
    document.addEventListener('mousemove', e => {
      mx = e.clientX;
      my = e.clientY;
      cur.style.left = mx + 'px';
      cur.style.top = my + 'px'
    });
    (function loop() {
      rx += (mx - rx) * .1;
      ry += (my - ry) * .1;
      ring.style.left = rx + 'px';
      ring.style.top = ry + 'px';
      ctxt.style.left = rx + 'px';
      ctxt.style.top = (ry + 30) + 'px';
      requestAnimationFrame(loop)
    })();
    document.querySelectorAll('[data-cur]').forEach(el => {
      el.addEventListener('mouseenter', () => {
        document.body.classList.add('ch');
        ctxt.textContent = el.dataset.cur || 'VIEW'
      });
      el.addEventListener('mouseleave', () => {
        document.body.classList.remove('ch');
        ctxt.textContent = ''
      });
    });
    document.querySelectorAll('a:not([data-cur]),button:not([data-cur])').forEach(el => {
      el.addEventListener('mouseenter', () => document.body.classList.add('ch'));
      el.addEventListener('mouseleave', () => document.body.classList.remove('ch'));
    });

    /* ── PROGRESS + NAV PIN ─── */
    const nav = document.getElementById('nav'),
      sp = document.getElementById('sp');
    window.addEventListener('scroll', () => {
      sp.style.width = (window.scrollY / (document.body.scrollHeight - window.innerHeight) * 100) + '%';
      window.scrollY > 60 ? nav.classList.add('pinned') : nav.classList.remove('pinned');
    }, {
      passive: true
    });

    /* ── REVEAL ─── */
    new IntersectionObserver((entries) => entries.forEach(e => {
        if (e.isIntersecting) e.target.classList.add('in')
      }), {
        threshold: .08,
        rootMargin: '0px 0px -32px 0px'
      })
      .observe && document.querySelectorAll('.rv,.rv-l').forEach(el => {
        const o = new IntersectionObserver(es => es.forEach(e => {
          if (e.isIntersecting) {
            e.target.classList.add('in');
            o.unobserve(e.target)
          }
        }), {
          threshold: .08,
          rootMargin: '0px 0px -32px 0px'
        });
        o.observe(el);
      });

    /* ── MOBILE MENU ─── */
    const mob = document.getElementById('mob'),
      hbg = document.getElementById('hbg');
    const b1 = document.getElementById('b1'),
      b2 = document.getElementById('b2'),
      b3 = document.getElementById('b3');
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