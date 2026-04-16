<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['page_title']) ? htmlspecialchars($data['page_title']) : 'FilmyCurry' ?></title>
    <meta name="description" content="FilmyCurry - India's premier influencer and meme marketing agency.">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        fc: {
                            yellow: '#F5C518',
                            black:  '#0D0D0D',
                            cream:  '#F9F5EE',
                            gray:   '#111111',
                            dark:   '#161616',
                        }
                    },
                    fontFamily: {
                        display: ['"Bebas Neue"', 'Impact', 'sans-serif'],
                        body:    ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { background: #0D0D0D; color: #F9F5EE; font-family: 'Inter', sans-serif; overflow-x: hidden; cursor: none; }
        ::-webkit-scrollbar { width: 3px; }
        ::-webkit-scrollbar-thumb { background: #F5C518; }
        /* Custom cursor */
        #cursor-dot  { width:10px; height:10px; background:#F5C518; border-radius:50%; position:fixed; pointer-events:none; z-index:9999; transform:translate(-50%,-50%); transition:transform .1s; }
        #cursor-ring { width:38px; height:38px; border:1.5px solid #F5C518; border-radius:50%; position:fixed; pointer-events:none; z-index:9998; transform:translate(-50%,-50%); transition:all .12s; opacity:.5; }
        /* Marquee */
        .marquee-track { display:flex; gap:4rem; white-space:nowrap; animation: marquee 30s linear infinite; }
        @keyframes marquee { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
        /* Gradient text */
        .gradient-text { background: linear-gradient(135deg, #F5C518, #ff6b35); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
        /* Noise overlay */
        .noise::after { content:''; position:absolute; inset:0; background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E"); opacity:.025; pointer-events:none; }
        /* Glow */
        .glow { box-shadow: 0 0 40px rgba(245,197,24,0.15); }
        /* Card hover */
        .work-card { transition: transform .4s cubic-bezier(.16,1,.3,1), background .3s; }
        .work-card:hover { transform: translateY(-6px); }
        /* Nav link underline */
        .nav-link { position:relative; }
        .nav-link::after { content:''; position:absolute; bottom:-2px; left:0; width:0; height:1px; background:#F5C518; transition:width .3s; }
        .nav-link:hover::after { width:100%; }
        /* Btn primary */
        .btn-primary { background:#F5C518; color:#0D0D0D; font-family:'Bebas Neue',Impact,sans-serif; letter-spacing:.1em; padding:.75rem 2rem; border-radius:4px; display:inline-block; transition:transform .2s, filter .2s; }
        .btn-primary:hover { transform:translateY(-2px); filter:brightness(1.1); }
        /* Hero bg gradient */
        .hero-bg { background: radial-gradient(ellipse 80% 60% at 50% -10%, rgba(245,197,24,.12) 0%, transparent 60%), #0D0D0D; }
    </style>
</head>
<body>

<!-- Custom cursor -->
<div id="cursor-dot"></div>
<div id="cursor-ring"></div>

<!-- Navbar -->
<?php
$settings = isset($data['settings']) ? $data['settings'] : [];
$site_title = isset($settings['site_title']) ? $settings['site_title'] : 'FilmyCurry';
$logo       = isset($settings['site_logo']) && $settings['site_logo']
              ? base_url('assets/uploads/' . $settings['site_logo'])
              : '';
?>
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 px-6 md:px-16 py-5 flex items-center justify-between transition-all duration-300">
    <a href="<?= base_url() ?>" class="flex items-center gap-2">
        <?php if ($logo): ?>
            <img src="<?= $logo ?>" alt="<?= htmlspecialchars($site_title) ?>" class="h-9">
        <?php else: ?>
            <span class="font-display text-2xl tracking-wider text-fc-cream">FILMY<span class="text-fc-yellow">CURRY</span></span>
        <?php endif; ?>
    </a>
    <div class="hidden md:flex items-center gap-8">
        <a href="<?= base_url() ?>"       class="nav-link text-sm text-fc-cream/70 hover:text-fc-yellow transition-colors">Home</a>
        <a href="<?= base_url('about') ?>" class="nav-link text-sm text-fc-cream/70 hover:text-fc-yellow transition-colors">About</a>
        <a href="<?= base_url('work') ?>"  class="nav-link text-sm text-fc-cream/70 hover:text-fc-yellow transition-colors">Our Work</a>
        <a href="<?= base_url('contact') ?>" class="btn-primary text-sm">Let's Talk</a>
    </div>
    <!-- Mobile hamburger -->
    <button id="menu-toggle" class="md:hidden flex flex-col gap-1.5 p-2">
        <span class="block w-6 h-0.5 bg-fc-cream transition-all duration-300" id="bar1"></span>
        <span class="block w-6 h-0.5 bg-fc-cream transition-all duration-300" id="bar2"></span>
        <span class="block w-6 h-0.5 bg-fc-cream transition-all duration-300" id="bar3"></span>
    </button>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="fixed inset-0 z-40 bg-fc-black flex flex-col items-center justify-center gap-8 hidden">
    <a href="<?= base_url() ?>"        class="font-display text-5xl text-fc-cream hover:text-fc-yellow transition-colors">Home</a>
    <a href="<?= base_url('about') ?>"  class="font-display text-5xl text-fc-cream hover:text-fc-yellow transition-colors">About</a>
    <a href="<?= base_url('work') ?>"   class="font-display text-5xl text-fc-cream hover:text-fc-yellow transition-colors">Our Work</a>
    <a href="<?= base_url('contact') ?>" class="font-display text-5xl text-fc-cream hover:text-fc-yellow transition-colors">Contact</a>
</div>

<!-- Page Content -->
<main>
    <?= $content ?>
</main>

<!-- Footer -->
<footer class="bg-fc-gray border-t border-white/5 pt-20 pb-10 px-8 md:px-20">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between gap-12 mb-16">
            <div class="max-w-xs">
                <div class="font-display text-3xl text-fc-cream mb-4">FILMY<span class="text-fc-yellow">CURRY</span></div>
                <p class="text-fc-cream/40 text-sm leading-relaxed">One-stop solution for influencer and meme marketing across entertainment, culture, and commerce.</p>
                <div class="flex gap-4 mt-6">
                    <a href="#" class="w-9 h-9 border border-white/10 rounded flex items-center justify-center hover:border-fc-yellow hover:text-fc-yellow text-fc-cream/40 transition-all text-xs">In</a>
                    <a href="#" class="w-9 h-9 border border-white/10 rounded flex items-center justify-center hover:border-fc-yellow hover:text-fc-yellow text-fc-cream/40 transition-all text-xs">Ig</a>
                    <a href="#" class="w-9 h-9 border border-white/10 rounded flex items-center justify-center hover:border-fc-yellow hover:text-fc-yellow text-fc-cream/40 transition-all text-xs">X</a>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-10">
                <div>
                    <p class="text-fc-cream/30 text-xs tracking-widest uppercase mb-4">Navigate</p>
                    <a href="<?= base_url() ?>"        class="block text-fc-cream/60 text-sm mb-2 hover:text-fc-yellow transition-colors">Home</a>
                    <a href="<?= base_url('about') ?>"  class="block text-fc-cream/60 text-sm mb-2 hover:text-fc-yellow transition-colors">About</a>
                    <a href="<?= base_url('work') ?>"   class="block text-fc-cream/60 text-sm mb-2 hover:text-fc-yellow transition-colors">Our Work</a>
                    <a href="<?= base_url('contact') ?>" class="block text-fc-cream/60 text-sm mb-2 hover:text-fc-yellow transition-colors">Contact</a>
                </div>
                <div>
                    <p class="text-fc-cream/30 text-xs tracking-widest uppercase mb-4">Services</p>
                    <p class="text-fc-cream/50 text-sm mb-2">Influencer Marketing</p>
                    <p class="text-fc-cream/50 text-sm mb-2">Meme Marketing</p>
                    <p class="text-fc-cream/50 text-sm mb-2">Movie Promotions</p>
                    <p class="text-fc-cream/50 text-sm mb-2">Video Production</p>
                </div>
                <div>
                    <p class="text-fc-cream/30 text-xs tracking-widest uppercase mb-4">Contact</p>
                    <p class="text-fc-cream/50 text-sm mb-2"><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?></p>
                    <p class="text-fc-cream/50 text-sm mb-2"><?= htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com') ?></p>
                    <p class="text-fc-cream/50 text-sm"><?= htmlspecialchars($settings['site_address'] ?? 'India') ?></p>
                </div>
            </div>
        </div>
        <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-fc-cream/20 text-xs">© <?= date('Y') ?> FilmyCurry. All rights reserved.</p>
            <p class="text-fc-cream/20 text-xs">Made with 🎬 in India</p>
        </div>
    </div>
</footer>

<!-- AOS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ duration: 800, once: true, easing: 'ease-out-cubic', offset: 60 });

// Custom cursor
const dot  = document.getElementById('cursor-dot');
const ring = document.getElementById('cursor-ring');
document.addEventListener('mousemove', e => {
    dot.style.left  = e.clientX + 'px';
    dot.style.top   = e.clientY + 'px';
    ring.style.left = e.clientX + 'px';
    ring.style.top  = e.clientY + 'px';
});
document.querySelectorAll('a,button').forEach(el => {
    el.addEventListener('mouseenter', () => { ring.style.width='56px'; ring.style.height='56px'; ring.style.opacity='1'; });
    el.addEventListener('mouseleave', () => { ring.style.width='38px'; ring.style.height='38px'; ring.style.opacity='.5'; });
});

// Navbar scroll effect
const nav = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 60) {
        nav.style.background = 'rgba(13,13,13,0.96)';
        nav.style.backdropFilter = 'blur(12px)';
        nav.style.borderBottom = '1px solid rgba(255,255,255,0.05)';
    } else {
        nav.style.background = 'transparent';
        nav.style.backdropFilter = 'none';
        nav.style.borderBottom = 'none';
    }
});

// Mobile menu
const toggle = document.getElementById('menu-toggle');
const menu   = document.getElementById('mobile-menu');
const bar1   = document.getElementById('bar1');
const bar2   = document.getElementById('bar2');
const bar3   = document.getElementById('bar3');
let menuOpen = false;
toggle.addEventListener('click', () => {
    menuOpen = !menuOpen;
    menu.classList.toggle('hidden', !menuOpen);
    if (menuOpen) {
        bar1.style.transform = 'rotate(45deg) translate(4px, 4px)';
        bar2.style.opacity   = '0';
        bar3.style.transform = 'rotate(-45deg) translate(4px, -4px)';
    } else {
        bar1.style.transform = bar3.style.transform = 'none';
        bar2.style.opacity   = '1';
    }
});

// Counter animation
function animateCounter(el, target, suffix) {
    let current = 0;
    const step = Math.ceil(target / 80);
    const timer = setInterval(() => {
        current = Math.min(current + step, target);
        el.textContent = current + suffix;
        if (current >= target) clearInterval(timer);
    }, 20);
}
const counters = document.querySelectorAll('[data-counter]');
if (counters.length) {
    const obs = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                animateCounter(el, parseInt(el.dataset.counter), el.dataset.suffix || '');
                obs.unobserve(el);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => obs.observe(c));
}
</script>
</body>
</html>
