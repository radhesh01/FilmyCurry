<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$settings  = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
$site_title = $settings['site_title'] ?? 'FilmyCurry';
$site_desc  = $settings['hero_subtext'] ?? 'India\'s premier influencer & meme marketing agency.';
?>
<title><?= htmlspecialchars($site_title) ?> — Spice Up Your Social Media</title>
<meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
<meta property="og:title" content="<?= htmlspecialchars($site_title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        fc: { yellow: '#F5C518', black: '#0D0D0D', cream: '#F9F5EE', dark: '#111', gray: '#161616' }
      },
      fontFamily: {
        display: ['"Bebas Neue"', 'Impact', 'sans-serif'],
        body: ['Inter', 'sans-serif']
      }
    }
  }
}
</script>

<style>
/* ─── RESET & BASE ─────────────────────────────────────── */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{background:#0D0D0D;color:#F9F5EE;font-family:'Inter',sans-serif;overflow-x:hidden;cursor:none}
::-webkit-scrollbar{width:2px}
::-webkit-scrollbar-track{background:#0D0D0D}
::-webkit-scrollbar-thumb{background:#F5C518}

/* ─── CUSTOM CURSOR ────────────────────────────────────── */
#cur-dot{
  width:8px;height:8px;background:#F5C518;border-radius:50%;
  position:fixed;pointer-events:none;z-index:9999;
  transform:translate(-50%,-50%);transition:transform .15s,opacity .15s;
}
#cur-ring{
  width:36px;height:36px;border:1.5px solid rgba(245,197,24,.6);
  border-radius:50%;position:fixed;pointer-events:none;z-index:9998;
  transform:translate(-50%,-50%);transition:width .2s,height .2s,opacity .2s;
}
body:hover #cur-dot{opacity:1}

/* ─── NOISE TEXTURE ────────────────────────────────────── */
.noise::after{
  content:'';position:absolute;inset:0;pointer-events:none;
  opacity:.025;mix-blend-mode:overlay;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

/* ─── PROGRESS BAR ─────────────────────────────────────── */
#scroll-progress{position:fixed;top:0;left:0;height:2px;background:#F5C518;z-index:200;width:0%;transition:width .1s linear}

/* ─── NAVBAR ───────────────────────────────────────────── */
#navbar{
  position:fixed;top:0;left:0;right:0;z-index:100;
  padding:20px 48px;display:flex;align-items:center;justify-content:space-between;
  transition:all .4s cubic-bezier(.16,1,.3,1);
}
#navbar.scrolled{
  background:rgba(13,13,13,.97);backdrop-filter:blur(20px);
  border-bottom:1px solid rgba(255,255,255,.06);padding:14px 48px;
}
.nav-link{
  position:relative;font-size:13px;font-weight:500;letter-spacing:.04em;
  color:rgba(249,245,238,.55);text-decoration:none;transition:color .2s;
}
.nav-link::after{
  content:'';position:absolute;bottom:-3px;left:0;width:0;height:1px;
  background:#F5C518;transition:width .35s cubic-bezier(.16,1,.3,1);
}
.nav-link:hover{color:#F9F5EE}
.nav-link:hover::after,.nav-link.active::after{width:100%}
.btn-cta{
  background:#F5C518;color:#0D0D0D;font-family:'Bebas Neue',sans-serif;
  font-size:16px;letter-spacing:.1em;padding:10px 24px;border-radius:4px;
  text-decoration:none;transition:transform .2s,filter .2s;display:inline-block;
}
.btn-cta:hover{transform:translateY(-2px);filter:brightness(1.08)}

/* ─── REVEAL ANIMATIONS ────────────────────────────────── */
.reveal{opacity:0;transform:translateY(48px);transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1)}
.reveal.in{opacity:1;transform:none}
.reveal-x{opacity:0;transform:translateX(-48px);transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1)}
.reveal-x.in{opacity:1;transform:none}
.d1{transition-delay:.1s!important}
.d2{transition-delay:.2s!important}
.d3{transition-delay:.3s!important}
.d4{transition-delay:.4s!important}
.d5{transition-delay:.5s!important}

/* ─── MARQUEE ──────────────────────────────────────────── */
.marquee-wrap{overflow:hidden}
.marquee-track{display:flex;gap:64px;white-space:nowrap;animation:marquee 28s linear infinite}
.marquee-track:hover{animation-play-state:paused}
@keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}

/* ─── FILM STRIP ───────────────────────────────────────── */
.film-strip{position:absolute;top:0;bottom:0;width:40px;display:flex;flex-direction:column;overflow:hidden;opacity:.07;pointer-events:none}
.film-hole{width:18px;height:13px;background:#F5C518;border-radius:2px;margin:9px auto;flex-shrink:0}

/* ─── SCANLINES ────────────────────────────────────────── */
.scanlines{position:absolute;inset:0;pointer-events:none;
  background:repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(0,0,0,.05) 2px,rgba(0,0,0,.05) 4px);
  opacity:.5}

/* ─── CAMPAIGN CARD ────────────────────────────────────── */
.camp-card{
  position:relative;overflow:hidden;background:#111;
  border:1px solid rgba(255,255,255,.05);
  transition:transform .45s cubic-bezier(.16,1,.3,1),border-color .3s;
}
.camp-card:hover{transform:translateY(-6px);border-color:rgba(245,197,24,.25)}
.camp-card img{width:100%;height:220px;object-fit:cover;transition:transform .6s cubic-bezier(.16,1,.3,1)}
.camp-card:hover img{transform:scale(1.06)}

/* ─── SERVICE ROW ──────────────────────────────────────── */
.svc-row{
  border-top:1px solid rgba(255,255,255,.06);
  padding:28px 16px;display:flex;gap:24px;align-items:flex-start;
  transition:background .3s;cursor:default;
}
.svc-row:hover{background:rgba(255,255,255,.02)}
.svc-row:hover .svc-num,.svc-row:hover .svc-title{color:#F5C518}

/* ─── MOBILE MENU ──────────────────────────────────────── */
#mob-menu{
  position:fixed;inset:0;z-index:90;background:#0D0D0D;
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  gap:32px;opacity:0;pointer-events:none;transition:opacity .4s;
}
#mob-menu.open{opacity:1;pointer-events:all}

/* ─── MISC ─────────────────────────────────────────────── */
@keyframes fadeUp{to{opacity:1;transform:translateY(0)}}
@keyframes pulse-scroll{0%,100%{opacity:.3;transform:scaleY(1)}50%{opacity:1;transform:scaleY(1.15)}}
</style>
</head>
<body>

<!-- Cursor -->
<div id="cur-dot"></div>
<div id="cur-ring"></div>

<!-- Scroll progress -->
<div id="scroll-progress"></div>

<!-- Navbar -->
<?php
$logo = (!empty($settings['site_logo'])) ? base_url('assets/images/uploads/'.$settings['site_logo']) : '';
$current_uri = uri_string();
?>
<nav id="navbar">
  <a href="<?= base_url() ?>" style="text-decoration:none">
    <?php if ($logo): ?>
      <img src="<?= $logo ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:36px">
    <?php else: ?>
      <span style="font-family:'Bebas Neue',sans-serif;font-size:26px;letter-spacing:.1em;color:#F9F5EE">
        FILMY<span style="color:#F5C518">CURRY</span>
      </span>
    <?php endif; ?>
  </a>

  <div class="hidden md:flex items-center gap-8">
    <a href="<?= base_url() ?>"        class="nav-link <?= ($current_uri===''||$current_uri==='/')?'active':'' ?>">Home</a>
    <a href="<?= base_url('about') ?>"  class="nav-link <?= strpos($current_uri,'about')!==FALSE?'active':'' ?>">About</a>
    <a href="<?= base_url('work') ?>"   class="nav-link <?= strpos($current_uri,'work')!==FALSE?'active':'' ?>">Our Work</a>
    <a href="<?= base_url('contact') ?>" class="btn-cta">Let's Talk</a>
  </div>

  <!-- Hamburger -->
  <button id="mob-btn" class="md:hidden flex flex-col gap-[5px] p-2" style="background:none;border:none;cursor:pointer">
    <span id="b1" style="display:block;width:22px;height:1.5px;background:#F9F5EE;transition:all .3s"></span>
    <span id="b2" style="display:block;width:22px;height:1.5px;background:#F9F5EE;transition:all .3s"></span>
    <span id="b3" style="display:block;width:22px;height:1.5px;background:#F9F5EE;transition:all .3s"></span>
  </button>
</nav>

<!-- Mobile menu -->
<div id="mob-menu">
  <a href="<?= base_url() ?>"         style="font-family:'Bebas Neue',sans-serif;font-size:56px;color:#F9F5EE;text-decoration:none;transition:color .2s" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='#F9F5EE'">HOME</a>
  <a href="<?= base_url('about') ?>"  style="font-family:'Bebas Neue',sans-serif;font-size:56px;color:#F9F5EE;text-decoration:none;transition:color .2s" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='#F9F5EE'">ABOUT</a>
  <a href="<?= base_url('work') ?>"   style="font-family:'Bebas Neue',sans-serif;font-size:56px;color:#F9F5EE;text-decoration:none;transition:color .2s" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='#F9F5EE'">OUR WORK</a>
  <a href="<?= base_url('contact') ?>" class="btn-cta" style="font-size:28px;padding:14px 40px">LET'S TALK</a>
</div>

<!-- Page content -->
<main>
  <?= $content ?>
</main>

<!-- Footer -->
<footer style="padding:72px 6rem 32px;background:#0A0A0A;border-top:1px solid rgba(255,255,255,.05)" class="px-8 md:px-24">
  <div style="max-width:1280px;margin:0 auto">
    <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:48px;margin-bottom:56px">
      <div style="max-width:280px">
        <div style="font-family:'Bebas Neue',sans-serif;font-size:28px;color:#F9F5EE;letter-spacing:.1em;margin-bottom:14px">
          FILMY<span style="color:#F5C518">CURRY</span>
        </div>
        <p style="font-size:13px;color:rgba(249,245,238,.35);line-height:1.8">
          One-stop solution for influencer and meme marketing. Spicing up social media since day one.
        </p>
      </div>
      <div style="display:flex;gap:64px;flex-wrap:wrap">
        <div>
          <p style="font-size:10px;color:rgba(249,245,238,.25);letter-spacing:.2em;text-transform:uppercase;margin-bottom:16px">Navigate</p>
          <?php foreach([['','Home'],['about','About'],['work','Our Work'],['contact','Contact']] as $l): ?>
          <a href="<?= base_url($l[0]) ?>" style="display:block;font-size:13px;color:rgba(249,245,238,.5);margin-bottom:10px;text-decoration:none;transition:color .2s" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='rgba(249,245,238,.5)'"><?= $l[1] ?></a>
          <?php endforeach; ?>
        </div>
        <div>
          <p style="font-size:10px;color:rgba(249,245,238,.25);letter-spacing:.2em;text-transform:uppercase;margin-bottom:16px">Contact</p>
          <p style="font-size:13px;color:rgba(249,245,238,.5);margin-bottom:10px"><?= htmlspecialchars($settings['site_email'] ?? '') ?></p>
          <p style="font-size:13px;color:rgba(249,245,238,.5);margin-bottom:10px"><?= htmlspecialchars($settings['site_phone'] ?? '') ?></p>
          <p style="font-size:13px;color:rgba(249,245,238,.5)"><?= htmlspecialchars($settings['site_address'] ?? '') ?></p>
        </div>
      </div>
    </div>
    <div style="border-top:1px solid rgba(255,255,255,.05);padding-top:24px;display:flex;justify-content:space-between;flex-wrap:wrap;gap:12px">
      <p style="font-size:11px;color:rgba(249,245,238,.2)">© <?= date('Y') ?> <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
      <p style="font-size:11px;color:rgba(249,245,238,.2)">Made with 🎬 in India</p>
    </div>
  </div>
</footer>

<script>
// ── Cursor ──────────────────────────────────────────────
const dot=document.getElementById('cur-dot'),ring=document.getElementById('cur-ring');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;dot.style.left=mx+'px';dot.style.top=my+'px'});
(function animRing(){rx+=(mx-rx)*.1;ry+=(my-ry)*.1;ring.style.left=rx+'px';ring.style.top=ry+'px';requestAnimationFrame(animRing)})();
document.querySelectorAll('a,button').forEach(el=>{
  el.addEventListener('mouseenter',()=>{ring.style.width='54px';ring.style.height='54px';ring.style.borderColor='#F5C518';dot.style.transform='translate(-50%,-50%) scale(0)'});
  el.addEventListener('mouseleave',()=>{ring.style.width='36px';ring.style.height='36px';ring.style.borderColor='rgba(245,197,24,.6)';dot.style.transform='translate(-50%,-50%) scale(1)'});
});

// ── Scroll progress + navbar ─────────────────────────────
const nav=document.getElementById('navbar'),prog=document.getElementById('scroll-progress');
window.addEventListener('scroll',()=>{
  const pct=(window.scrollY/(document.body.scrollHeight-window.innerHeight))*100;
  prog.style.width=pct+'%';
  window.scrollY>60?nav.classList.add('scrolled'):nav.classList.remove('scrolled');
},{passive:true});

// ── Reveal on scroll ─────────────────────────────────────
const revObs=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('in')}),{threshold:.12});
document.querySelectorAll('.reveal,.reveal-x').forEach(el=>revObs.observe(el));

// ── Counter animation ────────────────────────────────────
function animCounter(el){
  const t=parseFloat(el.dataset.target)||0,suf=el.dataset.suffix||'';
  const isFloat=el.dataset.float==='true';
  let c=0,inc=t/80;
  const id=setInterval(()=>{c=Math.min(c+inc,t);if(c>=t)clearInterval(id);el.textContent=(isFloat?c.toFixed(1):Math.floor(c))+suf},20);
}
new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){animCounter(e.target);e.target._obs&&e.target._obs.unobserve(e.target)}}),{threshold:.5})
.observe&&document.querySelectorAll('[data-target]').forEach(el=>{
  const obs=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting){animCounter(e.target);obs.unobserve(e.target)}}),{threshold:.5});
  obs.observe(el);
});

// ── Mobile menu ──────────────────────────────────────────
const mBtn=document.getElementById('mob-btn'),mMenu=document.getElementById('mob-menu');
const b1=document.getElementById('b1'),b2=document.getElementById('b2'),b3=document.getElementById('b3');
let open=false;
mBtn.addEventListener('click',()=>{
  open=!open;mMenu.classList.toggle('open',open);
  if(open){b1.style.transform='rotate(45deg) translate(4px,4px)';b2.style.opacity='0';b3.style.transform='rotate(-45deg) translate(4px,-4px)'}
  else{b1.style.transform='';b2.style.opacity='';b3.style.transform=''}
});
mMenu.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{open=false;mMenu.classList.remove('open');b1.style.transform='';b2.style.opacity='';b3.style.transform=''}));
</script>
</body>
</html>
