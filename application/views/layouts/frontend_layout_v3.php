<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$settings   = isset($data['_settings']) ? $data['_settings'] : (isset($data['settings']) ? $data['settings'] : []);
$site_title = $settings['site_title'] ?? 'FilmyCurry';
$site_desc  = $settings['hero_subtext'] ?? "India's premier influencer & meme marketing agency.";
$current_uri = isset($data['_uri']) ? $data['_uri'] : uri_string();
$page_title  = isset($data['page_title']) ? $data['page_title'] . ' — ' . $site_title : $site_title . ' — Spice Up Your Social Media';
?>
<title><?= htmlspecialchars($page_title) ?></title>
<meta name="description" content="<?= htmlspecialchars($site_desc) ?>">
<meta name="robots" content="index, follow">
<meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($site_desc) ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<link rel="canonical" href="<?= base_url(uri_string()) ?>">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        fc: {
          yellow: '#F5C518',
          ylow2:  '#FFD84D',
          black:  '#080808',
          deep:   '#0C0C0C',
          ink:    '#111111',
          cream:  '#F2EDE6',
          muted:  '#6B6B6B',
          border: '#1C1C1C',
        }
      },
      fontFamily: {
        display: ['Syne', 'sans-serif'],
        body:    ['"DM Sans"', 'sans-serif'],
      }
    }
  }
}
</script>

<style>
/* ── RESET ───────────────────────────────────────── */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;-webkit-font-smoothing:antialiased}
body{background:#080808;color:#F2EDE6;font-family:'DM Sans',sans-serif;overflow-x:hidden;cursor:none}
::selection{background:#F5C518;color:#080808}
::-webkit-scrollbar{width:2px}
::-webkit-scrollbar-thumb{background:#F5C518}

/* ── CURSOR ──────────────────────────────────────── */
#fc-cursor{
  width:12px;height:12px;
  background:#F5C518;border-radius:50%;
  position:fixed;pointer-events:none;z-index:9999;
  transform:translate(-50%,-50%);
  transition:transform .12s,background .2s;
  mix-blend-mode:difference;
}
#fc-cursor-ring{
  width:40px;height:40px;
  border:1px solid rgba(245,197,24,.4);border-radius:50%;
  position:fixed;pointer-events:none;z-index:9998;
  transform:translate(-50%,-50%);
  transition:width .3s cubic-bezier(.16,1,.3,1),height .3s cubic-bezier(.16,1,.3,1),opacity .3s;
}
body.cursor-hover #fc-cursor{transform:translate(-50%,-50%) scale(0)}
body.cursor-hover #fc-cursor-ring{width:64px;height:64px;border-color:rgba(245,197,24,.8)}

/* ── PROGRESS ────────────────────────────────────── */
#fc-progress{
  position:fixed;top:0;left:0;height:1.5px;
  background:linear-gradient(90deg,#F5C518,#FFD84D);
  z-index:300;width:0%;
  transition:width .08s linear;
}

/* ── NAVBAR ──────────────────────────────────────── */
#fc-nav{
  position:fixed;top:0;left:0;right:0;z-index:200;
  padding:0 48px;height:72px;
  display:flex;align-items:center;justify-content:space-between;
  transition:all .5s cubic-bezier(.16,1,.3,1);
}
#fc-nav.pinned{
  background:rgba(8,8,8,.94);backdrop-filter:blur(24px);
  border-bottom:1px solid rgba(255,255,255,.05);height:60px;
}
.nav-logo{font-family:'Syne',sans-serif;font-weight:800;font-size:22px;letter-spacing:-.02em;color:#F2EDE6;text-decoration:none}
.nav-logo span{color:#F5C518}
.nav-links{display:flex;align-items:center;gap:36px}
.nav-link{
  font-size:13px;font-weight:500;letter-spacing:.03em;
  color:rgba(242,237,230,.5);text-decoration:none;
  transition:color .2s;position:relative;
}
.nav-link:hover,.nav-link.active{color:#F2EDE6}
.nav-link::after{
  content:'';position:absolute;bottom:-4px;left:0;width:0;height:1px;
  background:#F5C518;transition:width .4s cubic-bezier(.16,1,.3,1);
}
.nav-link:hover::after,.nav-link.active::after{width:100%}
.nav-cta{
  background:#F5C518;color:#080808;
  font-family:'Syne',sans-serif;font-weight:700;font-size:13px;letter-spacing:.04em;
  padding:10px 22px;border-radius:2px;text-decoration:none;
  transition:transform .2s,box-shadow .2s;
  display:inline-block;
}
.nav-cta:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(245,197,24,.3)}

/* ── MOBILE MENU ─────────────────────────────────── */
#mob-nav{
  position:fixed;inset:0;z-index:190;
  background:#080808;
  display:flex;flex-direction:column;align-items:flex-start;justify-content:center;
  padding:0 48px;gap:8px;
  pointer-events:none;opacity:0;
  transition:opacity .4s;
}
#mob-nav.open{pointer-events:all;opacity:1}
.mob-nav-link{
  font-family:'Syne',sans-serif;font-weight:800;
  font-size:clamp(40px,10vw,72px);
  color:rgba(242,237,230,.12);text-decoration:none;
  transition:color .3s,transform .3s;
  line-height:1;
  display:block;
}
.mob-nav-link:hover{color:#F5C518;transform:translateX(12px)}
#mob-btn{
  background:none;border:none;cursor:pointer;
  display:none;flex-direction:column;gap:5px;padding:8px;
}
.mob-bar{
  display:block;width:24px;height:1.5px;
  background:#F2EDE6;transition:all .35s cubic-bezier(.16,1,.3,1);
  transform-origin:center;
}

/* ── REVEAL ANIMATIONS ───────────────────────────── */
.rv{
  opacity:0;transform:translateY(40px);
  transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1);
}
.rv.visible{opacity:1;transform:none}
.rv-x{
  opacity:0;transform:translateX(-40px);
  transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1);
}
.rv-x.visible{opacity:1;transform:none}
.d1{transition-delay:.08s!important}
.d2{transition-delay:.16s!important}
.d3{transition-delay:.24s!important}
.d4{transition-delay:.32s!important}
.d5{transition-delay:.4s!important}

/* ── MARQUEE ─────────────────────────────────────── */
.marquee-outer{overflow:hidden}
.marquee-inner{
  display:flex;gap:80px;white-space:nowrap;
  animation:marquee-run 30s linear infinite;
  width:max-content;
}
.marquee-inner:hover{animation-play-state:paused}
@keyframes marquee-run{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}

/* ── FILM STRIP DECORATION ───────────────────────── */
.filmstrip{
  position:absolute;top:0;bottom:0;width:36px;
  display:flex;flex-direction:column;gap:0;
  overflow:hidden;opacity:.06;pointer-events:none;
}
.fhole{
  width:16px;height:12px;background:#F5C518;
  border-radius:2px;margin:8px auto;flex-shrink:0;
}

/* ── CAMPAIGN CARD ───────────────────────────────── */
.camp-card{
  position:relative;overflow:hidden;
  background:#0C0C0C;border:1px solid rgba(255,255,255,.05);
  transition:border-color .4s,transform .4s cubic-bezier(.16,1,.3,1);
}
.camp-card:hover{border-color:rgba(245,197,24,.2);transform:translateY(-4px)}
.camp-card .ci{height:200px;overflow:hidden}
.camp-card .ci img{width:100%;height:100%;object-fit:cover;transition:transform .7s cubic-bezier(.16,1,.3,1)}
.camp-card:hover .ci img{transform:scale(1.07)}

/* ── SERVICE ROW ─────────────────────────────────── */
.svc-row{
  border-top:1px solid rgba(255,255,255,.06);
  padding:28px 0;display:flex;gap:24px;align-items:flex-start;
  transition:background .3s;
}
.svc-row:hover{background:rgba(255,255,255,.015)}
.svc-row:hover .svc-n,.svc-row:hover .svc-t{color:#F5C518}

/* ── NOISE OVERLAY ───────────────────────────────── */
.noise-bg::before{
  content:'';position:absolute;inset:0;pointer-events:none;z-index:1;
  background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
  opacity:.025;mix-blend-mode:overlay;
}

/* ── MISC ────────────────────────────────────────── */
.tag{
  display:inline-block;font-size:10px;font-weight:600;letter-spacing:.2em;
  text-transform:uppercase;color:#F5C518;
}
.tag::before{content:'';display:inline-block;width:20px;height:1px;background:#F5C518;vertical-align:middle;margin-right:10px}

@media(max-width:768px){
  #fc-nav{padding:0 20px}
  #mob-btn{display:flex}
  .nav-links{display:none}
  #mob-nav{padding:0 24px}
}
@media(max-width:640px){
  .filmstrip{display:none}
}
</style>
</head>
<body>

<div id="fc-cursor"></div>
<div id="fc-cursor-ring"></div>
<div id="fc-progress"></div>

<!-- NAVBAR -->
<?php
$logo = (!empty($settings['site_logo'])) ? base_url('assets/images/uploads/'.$settings['site_logo']) : '';
?>
<nav id="fc-nav">
  <a href="<?= base_url() ?>" class="nav-logo">
    <?php if($logo): ?>
      <img src="<?= $logo ?>" alt="<?= htmlspecialchars($site_title) ?>" style="height:32px">
    <?php else: ?>
      FILMY<span>CURRY</span>
    <?php endif; ?>
  </a>

  <div class="nav-links">
    <a href="<?= base_url() ?>"         class="nav-link <?= ($current_uri===''||$current_uri==='/')?'active':'' ?>">Home</a>
    <a href="<?= base_url('about') ?>"  class="nav-link <?= strpos($current_uri,'about')!==FALSE?'active':'' ?>">About</a>
    <a href="<?= base_url('work') ?>"   class="nav-link <?= strpos($current_uri,'work')!==FALSE?'active':'' ?>">Our Work</a>
    <a href="<?= base_url('contact') ?>" class="nav-cta">Let's Talk</a>
  </div>

  <button id="mob-btn" aria-label="Menu">
    <span class="mob-bar" id="mb1"></span>
    <span class="mob-bar" id="mb2"></span>
    <span class="mob-bar" id="mb3"></span>
  </button>
</nav>

<!-- MOBILE MENU -->
<div id="mob-nav" role="dialog" aria-label="Navigation">
  <a href="<?= base_url() ?>"          class="mob-nav-link">HOME</a>
  <a href="<?= base_url('about') ?>"   class="mob-nav-link">ABOUT</a>
  <a href="<?= base_url('work') ?>"    class="mob-nav-link">OUR WORK</a>
  <a href="<?= base_url('contact') ?>" class="mob-nav-link" style="color:#F5C518">LET'S TALK</a>
  <div style="margin-top:40px">
    <p style="font-size:12px;color:rgba(242,237,230,.25)"><?= htmlspecialchars($settings['site_email'] ?? '') ?></p>
    <p style="font-size:12px;color:rgba(242,237,230,.25);margin-top:6px"><?= htmlspecialchars($settings['site_phone'] ?? '') ?></p>
  </div>
</div>

<!-- MAIN CONTENT -->
<main>
  <?= $content ?>
</main>

<!-- FOOTER -->
<footer style="background:#050505;border-top:1px solid rgba(255,255,255,.04);padding:72px 6rem 36px" class="px-6 md:px-24">
  <div style="max-width:1320px;margin:0 auto">

    <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:56px;margin-bottom:64px">

      <!-- Brand -->
      <div style="max-width:300px">
        <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:24px;letter-spacing:-.02em;margin-bottom:16px">
          FILMY<span style="color:#F5C518">CURRY</span>
        </div>
        <p style="font-size:14px;color:rgba(242,237,230,.35);line-height:1.8">
          India's premier influencer & meme marketing agency. Powering 32% of all OTT releases.
        </p>
        <div style="display:flex;gap:12px;margin-top:24px">
          <?php foreach(['in'=>'LinkedIn','ig'=>'Instagram','x'=>'X (Twitter)'] as $k=>$v): ?>
          <a href="#" aria-label="<?= $v ?>" style="width:36px;height:36px;border:1px solid rgba(255,255,255,.08);border-radius:2px;display:flex;align-items:center;justify-content:center;font-size:11px;color:rgba(242,237,230,.4);text-decoration:none;transition:all .2s;font-family:'Syne',sans-serif;font-weight:700" onmouseover="this.style.borderColor='#F5C518';this.style.color='#F5C518'" onmouseout="this.style.borderColor='rgba(255,255,255,.08)';this.style.color='rgba(242,237,230,.4)'"><?= strtoupper($k) ?></a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Links -->
      <div style="display:flex;gap:64px;flex-wrap:wrap">
        <div>
          <p style="font-size:10px;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:rgba(242,237,230,.2);margin-bottom:20px">Navigate</p>
          <?php foreach([['','Home'],['about','About'],['work','Our Work'],['contact','Contact']] as $l): ?>
          <a href="<?= base_url($l[0]) ?>" style="display:block;font-size:14px;color:rgba(242,237,230,.45);margin-bottom:12px;text-decoration:none;transition:color .2s" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='rgba(242,237,230,.45)'"><?= $l[1] ?></a>
          <?php endforeach; ?>
        </div>
        <div>
          <p style="font-size:10px;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:rgba(242,237,230,.2);margin-bottom:20px">Contact</p>
          <p style="font-size:14px;color:rgba(242,237,230,.45);margin-bottom:12px"><?= htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com') ?></p>
          <p style="font-size:14px;color:rgba(242,237,230,.45);margin-bottom:12px"><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?></p>
          <p style="font-size:14px;color:rgba(242,237,230,.35)"><?= htmlspecialchars($settings['site_address'] ?? 'India') ?></p>
        </div>
        <div>
          <p style="font-size:10px;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:rgba(242,237,230,.2);margin-bottom:20px">Services</p>
          <?php foreach(['Influencer Marketing','Meme Marketing','Movie Promotions','Video Production'] as $s): ?>
          <p style="font-size:14px;color:rgba(242,237,230,.35);margin-bottom:12px"><?= $s ?></p>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div style="border-top:1px solid rgba(255,255,255,.04);padding-top:28px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
      <p style="font-size:12px;color:rgba(242,237,230,.18)">© <?= date('Y') ?> <?= htmlspecialchars($site_title) ?>. All rights reserved.</p>
      <p style="font-size:12px;color:rgba(242,237,230,.18)">Made with 🎬 in India</p>
    </div>
  </div>
</footer>

<script>
// ── Cursor ────────────────────────────────────────────
const cur = document.getElementById('fc-cursor');
const ring = document.getElementById('fc-cursor-ring');
let mx=0,my=0,rx=0,ry=0;
document.addEventListener('mousemove',e=>{
  mx=e.clientX;my=e.clientY;
  cur.style.left=mx+'px';cur.style.top=my+'px';
});
(function loop(){
  rx+=(mx-rx)*.1;ry+=(my-ry)*.1;
  ring.style.left=rx+'px';ring.style.top=ry+'px';
  requestAnimationFrame(loop);
})();
document.querySelectorAll('a,button,[data-hover]').forEach(el=>{
  el.addEventListener('mouseenter',()=>document.body.classList.add('cursor-hover'));
  el.addEventListener('mouseleave',()=>document.body.classList.remove('cursor-hover'));
});

// ── Scroll progress + nav pin ─────────────────────────
const nav=document.getElementById('fc-nav');
const prog=document.getElementById('fc-progress');
window.addEventListener('scroll',()=>{
  const pct=(window.scrollY/(document.body.scrollHeight-window.innerHeight))*100;
  prog.style.width=pct+'%';
  window.scrollY>60?nav.classList.add('pinned'):nav.classList.remove('pinned');
},{passive:true});

// ── Reveal on scroll ──────────────────────────────────
const rvObs=new IntersectionObserver(entries=>entries.forEach(e=>{
  if(e.isIntersecting){e.target.classList.add('visible');}
}),{threshold:.1,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.rv,.rv-x').forEach(el=>rvObs.observe(el));

// ── Mobile menu ───────────────────────────────────────
const mob=document.getElementById('mob-nav');
const mbtn=document.getElementById('mob-btn');
const mb1=document.getElementById('mb1'),mb2=document.getElementById('mb2'),mb3=document.getElementById('mb3');
let open=false;
mbtn.addEventListener('click',()=>{
  open=!open;
  mob.classList.toggle('open',open);
  document.body.style.overflow=open?'hidden':'';
  if(open){
    mb1.style.transform='rotate(45deg) translate(4px,5px)';
    mb2.style.opacity='0';
    mb3.style.transform='rotate(-45deg) translate(4px,-5px)';
  }else{
    mb1.style.transform='';mb2.style.opacity='';mb3.style.transform='';
  }
});
mob.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{
  open=false;mob.classList.remove('open');document.body.style.overflow='';
  mb1.style.transform='';mb2.style.opacity='';mb3.style.transform='';
}));
</script>
</body>
</html>
