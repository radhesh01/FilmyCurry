<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$svcs = [
  [
    '01',
    '08',
    'Influencer Marketing',
    '#F5C518',
    '🤳',
    'Meticulous creator matching for brand goals — nano to celebrity. We connect voices that resonate authentically with your audience.',
    ['300+ campaigns', '12M+ reach', 'All platforms']
  ],
  [
    '02',
    '08',
    'Meme Marketing',
    '#FF6432',
    '😂',
    'Viral memes embedded in culture, not forced on it. Shareable content that feels organic, spreads fast, and sticks long after.',
    ['Trend-first approach', '10x organic reach', 'Format-native']
  ],
  [
    '03',
    '08',
    'Movie Promotions',
    '#C860F0',
    '🎬',
    'End-to-end promo strategy from first teaser to box-office day. We power 32% of all OTT releases in India.',
    ['32% of OTT releases', 'Teaser to release', 'Bollywood + Hollywood']
  ],
  [
    '04',
    '08',
    'Video Production',
    '#00D4FF',
    '🎥',
    'Concept, shoot, edit, deliver. Ads, web series, branded content — OTT-grade quality at turnaround speed.',
    ['Concept to final cut', 'OTT-grade quality', 'Fast turnaround']
  ],
  [
    '05',
    '08',
    'Movie Screenings',
    '#3DFF8F',
    '🍿',
    'Exclusive influencer screening events that generate organic buzz before release — the most authentic pre-launch play.',
    ['70+ screenings done', 'Tier 1 & 2 cities', 'Press + creators']
  ],
  [
    '06',
    '08',
    'On-Ground Promos',
    '#F5C518',
    '🎪',
    'Real-world activations bridging digital and physical — pop-ups, events, meet-and-greets that create lasting impressions.',
    ['Pan-India execution', 'Brand activations', 'Celebrity tie-ins']
  ],
  [
    '07',
    '08',
    'LinkedIn & X',
    '#FF6432',
    '💼',
    'Strategic campaigns on professional and trending platforms — building authority for studios, OTT brands, and executives.',
    ['Thought leadership', 'Viral threads', 'B2B + B2C']
  ],
  [
    '08',
    '08',
    'Celebrity Endorsement',
    '#C860F0',
    '⭐',
    'Curated celebrity partnerships that amplify brand credibility and reach millions of loyal fans in a single campaign.',
    ['Verified partnerships', 'Contract negotiation', 'ROI focused']
  ],
];

$brands_all = ["boAt", "Fastrack", "Masters' Union", "Myntra", "OnePlus", "Philips", "Tata Motors", "Netflix", "Amazon Prime", "Disney+", "Dharma", "YRF", "Sony", "T-Series", "Warner Bros", "Maddock Films", "Zee5", "Jio Cinema"];
$ticker = array_merge($brands_all, $brands_all);
$holes  = array_fill(0, 26, 1);
?>

<style>
  /* ══════════════════════════════════════════════════════
   CSS VARIABLES & RESET (scoped to avoid conflicts)
══════════════════════════════════════════════════════ */
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

  /* ══════════════════════════════════════════════════════
   HERO
══════════════════════════════════════════════════════ */
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
    animation: h-up .6s ease .3s forwards;
  }

  .fc-pulse {
    width: 8px;
    height: 8px;
    background: var(--y);
    border-radius: 50%;
    flex-shrink: 0;
    animation: ping 1.6s ease-in-out infinite
  }

  @keyframes ping {

    0%,
    100% {
      transform: scale(1);
      opacity: 1
    }

    50% {
      transform: scale(1.7);
      opacity: .4
    }
  }

  .h-h1 {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: clamp(56px, 11vw, 138px);
    line-height: .86;
    letter-spacing: -.04em;
    color: var(--cream);
    margin-bottom: 28px;
    opacity: 0;
    animation: h-up 1s cubic-bezier(.16, 1, .3, 1) .5s forwards;
  }

  .h-sub {
    font-size: clamp(14px, 2vw, 17px);
    font-weight: 500;
    color: var(--muted);
    max-width: 440px;
    line-height: 1.78;
    margin-bottom: 44px;
    opacity: 0;
    animation: h-up .7s ease .85s forwards;
  }

  .h-btns {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    opacity: 0;
    animation: h-up .6s ease 1.05s forwards;
  }

  .h-stats {
    margin-top: 60px;
    padding-top: 32px;
    border-top: 1px solid var(--border);
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    opacity: 0;
    animation: h-up .6s ease 1.2s forwards;
  }

  .h-sn {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: clamp(36px, 5vw, 52px);
    line-height: 1;
    letter-spacing: -.04em
  }

  .h-sl {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--muted);
    margin-top: 6px
  }

  @keyframes h-up {
    from {
      opacity: 0;
      transform: translateY(36px)
    }

    to {
      opacity: 1;
      transform: none
    }
  }

  @keyframes float-y {

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
    width: 28px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    opacity: .07;
    pointer-events: none
  }

  .fc-fh {
    width: 12px;
    height: 9px;
    background: var(--y);
    border-radius: 2px;
    margin: 6px auto;
    flex-shrink: 0
  }

  .h-scroll-hint {
    position: absolute;
    bottom: 28px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0;
    animation: h-up .5s ease 1.6s forwards
  }

  .h-scroll-line {
    width: 1px;
    height: 48px;
    background: linear-gradient(var(--y), transparent);
    animation: line-pulse 2.2s ease-in-out infinite
  }

  @keyframes line-pulse {

    0%,
    100% {
      opacity: .3
    }

    50% {
      opacity: 1
    }
  }

  /* ══════════════════════════════════════════════════════
   BRAND TICKER
══════════════════════════════════════════════════════ */
  .fc-brands-sec {
    padding: 48px 0;
    border-top: 1px solid rgba(255, 255, 255, .04);
    border-bottom: 1px solid rgba(255, 255, 255, .04);
    overflow: hidden;
    position: relative;
    z-index: 1;
  }

  .fc-brands-label {
    text-align: center;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .28em;
    text-transform: uppercase;
    color: rgba(107, 107, 128, .45);
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
  }

  .fc-brands-label::before,
  .fc-brands-label::after {
    content: '';
    flex: 1;
    max-width: 100px;
    height: 1px;
    background: rgba(107, 107, 128, .15)
  }

  .ticker-wrap {
    overflow: hidden;
    position: relative
  }

  .ticker-wrap::before,
  .ticker-wrap::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 80px;
    z-index: 2;
    pointer-events: none
  }

  .ticker-wrap::before {
    left: 0;
    background: linear-gradient(90deg, #080810, transparent)
  }

  .ticker-wrap::after {
    right: 0;
    background: linear-gradient(-90deg, #080810, transparent)
  }

  .ticker-img-track {
    display: flex;
    width: max-content;
    animation: ticker-run 28s linear infinite
  }

  .ticker-img-track:hover {
    animation-play-state: paused
  }

  .ticker-img-track img {
    height: 48px;
    width: auto;
    object-fit: contain;
    filter: brightness(0) invert(1);
    opacity: .42;
    flex-shrink: 0;
    padding: 0 36px;
    transition: opacity .3s
  }

  .ticker-img-track img:hover {
    opacity: .82
  }

  .ticker-txt-track {
    display: flex;
    align-items: center;
    white-space: nowrap;
    width: max-content;
    animation: ticker-run 32s linear infinite
  }

  .ticker-txt-track:hover {
    animation-play-state: paused
  }

  .b-chip {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 24px;
    margin: 0 4px;
    background: rgba(255, 255, 255, .025);
    border: 1px solid rgba(255, 255, 255, .06);
    border-radius: 100px;
    font-size: 12px;
    font-weight: 700;
    color: rgba(237, 232, 223, .38);
    white-space: nowrap;
    flex-shrink: 0;
    transition: all .3s;
    cursor: default
  }

  .b-chip:hover {
    border-color: rgba(245, 197, 24, .35);
    color: var(--y)
  }

  .b-dot {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: var(--y);
    opacity: .4;
    flex-shrink: 0
  }

  @keyframes ticker-run {
    0% {
      transform: translateX(0)
    }

    100% {
      transform: translateX(-50%)
    }
  }

  /* ══════════════════════════════════════════════════════
   ABOUT
══════════════════════════════════════════════════════ */
  .fcsec {
    padding: 100px 52px;
    position: relative;
    z-index: 1
  }

  .fc-stc {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 32px 24px;
    transition: border-color .3s, transform .3s
  }

  .fc-stc:hover {
    border-color: rgba(245, 197, 24, .25);
    transform: translateY(-4px)
  }

  /* ══════════════════════════════════════════════════════
   SERVICES — HORIZONTAL SNAP SCROLL
══════════════════════════════════════════════════════ */

  /* ══════════════════════════════════════════════════════
   SERVICES — SCROLL-TRIGGERED HORIZONTAL CAROUSEL
   Pinned section: user scrolls → slides advance horizontally
   Desktop: sticky pin + scroll-driven
   Mobile: native horizontal swipe
══════════════════════════════════════════════════════ */
  .svc-section {
    position: relative;
    z-index: 1;
    background: var(--ink);
  }

  /* ── PIN WRAPPER (desktop only) ────────────────────── */
  /* Height = number of slides × 100vh so scroll distance drives slides */
  .svc-pin-wrap {
    position: relative;
  }

  /* The sticky container that stays visible */
  .svc-pin {
    position: sticky;
    top: 0;
    height: 100vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }

  /* Header inside pin */
  .svc-header {
    padding: 52px 52px 28px;
    max-width: 100%;
    flex-shrink: 0;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
  }

  /* Progress bar */
  .svc-progress-bar {
    height: 2px;
    background: rgba(255, 255, 255, .06);
    margin: 0 52px;
    border-radius: 1px;
    overflow: hidden;
    flex-shrink: 0;
  }

  .svc-progress-fill {
    height: 100%;
    background: var(--y);
    border-radius: 1px;
    transition: width .5s cubic-bezier(.16, 1, .3, 1);
    width: 0%;
  }

  /* Slide track — horizontal, no scroll (JS moves it via transform) */
  .svc-track-outer {
    flex: 1;
    overflow: hidden;
    position: relative;
  }

  .svc-track {
    display: flex;
    height: 100%;
    /* JS will apply translateX to advance slides */
    transition: transform .7s cubic-bezier(.16, 1, .3, 1);
    will-change: transform;
  }

  /* EACH SLIDE */
  .svc-slide {
    flex: 0 0 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    padding: 40px 52px 40px;
    position: relative;
    overflow: hidden;
  }

  .svc-slide::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 70% at 20% 50%, rgba(var(--svc-rgb, 245, 197, 24), .06) 0%, transparent 70%);
    pointer-events: none;
  }

  /* LEFT text */
  .svc-left {
    padding-right: 48px;
  }

  .svc-counter {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .22em;
    color: var(--svc-col, var(--y));
    opacity: .55;
    margin-bottom: 20px;
    display: block;
  }

  .svc-title {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: clamp(38px, 5.5vw, 78px);
    line-height: .88;
    letter-spacing: -.03em;
    color: var(--cream);
    margin-bottom: 22px;
  }

  .svc-desc {
    font-size: clamp(13px, 1.4vw, 15px);
    color: var(--muted);
    line-height: 1.82;
    font-weight: 500;
    max-width: 460px;
    margin-bottom: 28px;
  }

  .svc-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 32px;
  }

  .svc-tag {
    padding: 6px 14px;
    border: 1px solid rgba(var(--svc-rgb, 245, 197, 24), .3);
    border-radius: 100px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .06em;
    color: var(--svc-col, var(--y));
    opacity: .8;
  }

  .svc-cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-d);
    font-size: 14px;
    letter-spacing: .12em;
    color: var(--svc-col, var(--y));
    text-decoration: none;
    transition: gap .25s;
    border: none;
    background: none;
    cursor: pointer;
  }

  .svc-cta:hover {
    gap: 14px;
  }

  .svc-cta-arrow {
    transition: transform .25s;
  }

  .svc-cta:hover .svc-cta-arrow {
    transform: translateX(4px);
  }

  /* RIGHT visual */
  .svc-right {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
  }

  .svc-big-num {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: clamp(140px, 20vw, 260px);
    line-height: .8;
    letter-spacing: -.06em;
    color: rgba(255, 255, 255, .03);
    pointer-events: none;
    user-select: none;
    position: absolute;
    right: -20px;
  }

  .svc-emoji-wrap {
    position: relative;
    z-index: 2;
    font-size: clamp(72px, 11vw, 130px);
    animation: svc-emoji-float 4s ease-in-out infinite;
    filter: drop-shadow(0 0 40px rgba(var(--svc-rgb, 245, 197, 24), .2));
  }

  @keyframes svc-emoji-float {

    0%,
    100% {
      transform: translateY(0) rotate(0deg)
    }

    50% {
      transform: translateY(-16px) rotate(4deg)
    }
  }

  /* NAV: dots + counter + arrows */
  .svc-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 52px 0;
    flex-shrink: 0;
  }

  .svc-nav-left {
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .svc-scroll-hint {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: rgba(237, 232, 223, .25);
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .svc-scroll-hint svg {
    animation: bounce-down 2s ease-in-out infinite;
    opacity: .5;
  }

  @keyframes bounce-down {

    0%,
    100% {
      transform: translateY(0)
    }

    50% {
      transform: translateY(4px)
    }
  }

  .svc-dots {
    display: flex;
    gap: 8px;
    align-items: center;
  }

  .svc-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(237, 232, 223, .15);
    border: none;
    cursor: pointer;
    transition: all .35s cubic-bezier(.16, 1, .3, 1);
    padding: 0;
  }

  .svc-dot.on {
    width: 28px;
    border-radius: 4px;
    background: var(--y);
  }

  .svc-arrows {
    display: flex;
    gap: 10px;
  }

  .svc-arrow {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 1.5px solid rgba(237, 232, 223, .15);
    background: none;
    cursor: pointer;
    color: var(--cream);
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .25s;
  }

  .svc-arrow:hover {
    border-color: var(--y);
    color: var(--y);
    background: rgba(245, 197, 24, .08);
  }

  .svc-arrow:disabled {
    opacity: .25;
    cursor: not-allowed;
  }

  /* ── SPACER blocks below pin — create scroll distance ─ */
  .svc-spacer-block {
    /* each one = 100vh, hidden, only creates scrollable height */
    /* Total added via JS based on slide count */
  }

  /* ── MOBILE: native horizontal swipe, no pin ──────── */
  @media(max-width: 768px) {
    .svc-pin-wrap {
      /* remove sticky height, show flat track */
    }

    .svc-pin {
      position: relative;
      height: auto;
      overflow: visible;
    }

    .svc-header {
      padding: 48px 20px 20px;
    }

    .svc-progress-bar {
      margin: 0 20px;
    }

    .svc-track-outer {
      overflow-x: auto;
      overflow-y: hidden;
      -webkit-overflow-scrolling: touch;
      scroll-snap-type: x mandatory;
      scrollbar-width: none;
      flex: none;
      height: auto;
    }

    .svc-track-outer::-webkit-scrollbar {
      display: none;
    }

    .svc-track {
      transform: none !important;
      transition: none !important;
      /* on mobile, native scroll, no transform */
      height: auto;
      overflow-x: visible;
    }

    .svc-slide {
      flex: 0 0 92vw;
      height: auto;
      min-height: 0;
      grid-template-columns: 1fr;
      padding: 36px 20px 44px;
      scroll-snap-align: center;
      margin-right: 12px;
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, .05);
    }

    .svc-slide:last-child {
      margin-right: 20px;
    }

    /* First slide indent so it's centered on appear */
    .svc-slide:first-child {
      margin-left: 4vw;
    }

    .svc-right {
      display: none;
    }

    .svc-left {
      padding-right: 0;
    }

    .svc-nav {
      padding: 14px 20px 0;
    }

    .svc-title {
      font-size: clamp(32px, 9vw, 52px) !important;
    }

    .svc-scroll-hint {
      display: none;
    }
  }

  @media(max-width: 520px) {
    .svc-slide {
      flex: 0 0 88vw;
    }

    .svc-big-num {
      display: none;
    }
  }

  ══════════════════════════════════════════════════════ */ .fc-cg {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px
  }

  .fc-cc {
    border-radius: 18px;
    overflow: hidden;
    background: var(--card);
    border: 1px solid var(--border);
    transition: transform .45s cubic-bezier(.16, 1, .3, 1), border-color .3s, box-shadow .3s;
    text-decoration: none;
    display: block
  }

  .fc-cc:hover {
    transform: translateY(-8px);
    border-color: rgba(245, 197, 24, .25);
    box-shadow: 0 28px 72px rgba(0, 0, 0, .45)
  }

  .fc-ci {
    height: 210px;
    overflow: hidden;
    position: relative
  }

  .fc-ci img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .7s cubic-bezier(.16, 1, .3, 1)
  }

  .fc-cc:hover .fc-ci img {
    transform: scale(1.08)
  }

  .fc-ctg {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(8, 8, 16, .84);
    backdrop-filter: blur(12px);
    padding: 4px 12px;
    border-radius: 100px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--y)
  }

  .fc-cbdy {
    padding: 22px
  }

  .fc-ctt {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 20px;
    letter-spacing: -.02em;
    color: var(--cream);
    margin-bottom: 8px;
    line-height: 1.2;
    transition: color .25s
  }

  .fc-cc:hover .fc-ctt {
    color: var(--y)
  }

  .fc-cdsc {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.55
  }

  .fc-clnk {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 14px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: rgba(245, 197, 24, .4);
    transition: color .25s, gap .25s
  }

  .fc-cc:hover .fc-clnk {
    color: var(--y);
    gap: 10px
  }

  /* ══════════════════════════════════════════════════════
   PROCESS
══════════════════════════════════════════════════════ */
  .fc-pg {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px
  }

  .fc-pc {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 32px 24px;
    position: relative;
    overflow: hidden;
    transition: border-color .35s, transform .35s
  }

  .fc-pc::before {
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
    transition: transform .5s cubic-bezier(.16, 1, .3, 1)
  }

  .fc-pc:hover {
    transform: translateY(-5px);
    border-color: currentColor
  }

  .fc-pc:hover::before {
    transform: scaleX(1)
  }

  .fc-pn {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 64px;
    letter-spacing: -.06em;
    line-height: 1;
    opacity: .06;
    position: absolute;
    top: 12px;
    right: 18px
  }

  /* ══════════════════════════════════════════════════════
   CTA
══════════════════════════════════════════════════════ */
  .fc-cta-sec {
    position: relative;
    z-index: 1;
    padding: 100px 52px;
    overflow: hidden
  }

  .fc-cta-bg {
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 80% at 20% 50%, rgba(245, 197, 24, .09) 0%, transparent 60%), radial-gradient(ellipse 50% 70% at 80% 50%, rgba(200, 96, 240, .08) 0%, transparent 55%);
    pointer-events: none
  }

  .fc-cta-grid {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(255, 255, 255, .018) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .018) 1px, transparent 1px);
    background-size: 64px 64px
  }

  /* ══════════════════════════════════════════════════════
   SHARED UTILS
══════════════════════════════════════════════════════ */
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

  .fc-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: .26em;
    text-transform: uppercase
  }

  .fc-tag::before {
    content: '';
    width: 22px;
    height: 1px;
    background: currentColor
  }

  .fc-h2 {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: clamp(48px, 9vw, 108px);
    line-height: .88;
    letter-spacing: -.02em;
    color: var(--cream)
  }

  .fc-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: var(--font-d);
    letter-spacing: .08em;
    border-radius: 4px;
    text-decoration: none;
    transition: transform .2s, box-shadow .2s
  }

  .fc-btn-y {
    background: linear-gradient(135deg, var(--y), var(--o));
    color: #080810;
    font-size: 15px;
    padding: 13px 30px
  }

  .fc-btn-y:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(245, 197, 24, .28)
  }

  .fc-btn-g {
    border: 1.5px solid rgba(237, 232, 223, .18);
    color: var(--cream);
    font-size: 15px;
    padding: 12px 28px
  }

  .fc-btn-g:hover {
    border-color: var(--y);
    color: var(--y)
  }

  .g1 {
    background: linear-gradient(135deg, var(--y), var(--o));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text
  }

  .g2 {
    background: linear-gradient(135deg, var(--p), var(--c));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text
  }

  .g3 {
    background: linear-gradient(135deg, var(--c), var(--g));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text
  }

  .g4 {
    background: linear-gradient(135deg, var(--p), var(--c));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text
  }

  /* ══════════════════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════════════════ */
  @media(max-width:1200px) {
    .fc-pg {
      grid-template-columns: repeat(2, 1fr)
    }

    .svc-big-num {
      font-size: clamp(100px, 16vw, 200px)
    }
  }

  @media(max-width:1024px) {

    .fc-hero,
    .fcsec,
    .fc-cta-sec {
      padding-left: 28px !important;
      padding-right: 28px !important
    }

    .svc-header,
    .svc-nav,
    .svc-progress-bar {
      padding-left: 28px !important;
      padding-right: 28px !important
    }

    .svc-slide {
      padding: 52px 28px 64px;
      grid-template-columns: 1fr 1fr;
      gap: 32px
    }

    .fc-cg {
      grid-template-columns: repeat(2, 1fr)
    }
  }

  @media(max-width:768px) {
    .fc-hero {
      padding: 88px 20px 72px !important
    }

    .fcsec {
      padding: 72px 20px !important
    }

    .fc-cta-sec {
      padding: 72px 20px !important
    }

    .h-stats {
      gap: 24px
    }

    .h-sn {
      font-size: clamp(28px, 8vw, 40px) !important
    }

    .h-btns {
      flex-direction: column
    }

    .fc-btn {
      width: 100%;
      justify-content: center
    }

    /* services mobile: stack vertically */
    .svc-slide {
      grid-template-columns: 1fr;
      min-height: auto;
      padding: 48px 20px 56px;
    }

    .svc-right {
      display: none
    }

    /* hide large emoji on mobile, keep clean */
    .svc-header,
    .svc-nav,
    .svc-progress-bar {
      padding-left: 20px !important;
      padding-right: 20px !important
    }

    .svc-nav {
      flex-direction: column;
      gap: 20px;
      align-items: flex-start
    }

    .svc-section {
      padding-top: 60px
    }

    /* about grid */
    .about-gr {
      grid-template-columns: 1fr !important
    }

    .stat-gr {
      grid-template-columns: 1fr 1fr !important
    }

    /* campaigns + process */
    .fc-cg {
      grid-template-columns: 1fr !important
    }

    .fc-pg {
      grid-template-columns: 1fr 1fr !important
    }
  }

  @media(max-width:520px) {
    .fc-pg {
      grid-template-columns: 1fr !important
    }

    .svc-title {
      font-size: clamp(34px, 9vw, 58px) !important
    }

    .svc-big-num {
      display: none
    }
  }
</style>

<!-- ══ HERO ══════════════════════════════════════════════ -->
<section class="fc-hero" role="banner" aria-labelledby="fc-h1">
  <div class="fc-fs" style="left:0"><?php foreach ($holes as $h): ?><div class="fc-fh"></div><?php endforeach; ?>
  </div>
  <div class="fc-fs" style="right:0"><?php foreach ($holes as $h): ?><div class="fc-fh"></div><?php endforeach; ?>
  </div>

  <div style="position:absolute;top:18%;right:9%;font-size:30px;opacity:.13;animation:float-y 7s ease-in-out infinite;pointer-events:none"
    aria-hidden="true">🎬</div>
  <div style="position:absolute;top:55%;right:21%;font-size:22px;opacity:.11;animation:float-y 5.5s ease-in-out 1s infinite;pointer-events:none"
    aria-hidden="true">🎞️</div>
  <div style="position:absolute;bottom:20%;right:6%;font-size:26px;opacity:.10;animation:float-y 8s ease-in-out .5s infinite;pointer-events:none"
    aria-hidden="true">🍿</div>

  <div style="position:relative;z-index:2;width:100%;max-width:1380px;margin:0 auto">
    <div class="fc-hero-badge"><span class="fc-pulse"></span>India's Premier Entertainment Marketing Agency</div>
    <h1 class="h-h1" id="fc-h1">
      SPICE<br>UP YOUR<br>
      <span class="g1">SOCIAL</span>&thinsp;<span class="g2">MEDIA</span>
    </h1>
    <p class="h-sub">
      <?= htmlspecialchars($settings['hero_subtext'] ?? 'One-stop solution for influencer marketing, meme campaigns, and viral content that powers 32% of all OTT releases.') ?>
    </p>
    <div class="h-btns">
      <a href="#fc-campaigns" class="fc-btn fc-btn-y" data-fc-cur="EXPLORE">SEE OUR WORK</a>
      <a href="<?= base_url('contact') ?>" class="fc-btn fc-btn-g" data-fc-cur="TALK">LET'S TALK &rarr;</a>
    </div>
    <div class="h-stats">
      <?php foreach ([[$settings['stat_campaigns'] ?? '300+', 'Campaigns', '--y'], ['32%', 'OTT Releases', '--o'], [$settings['stat_reach'] ?? '12M+', 'Reached', '--p'], [$settings['stat_movies'] ?? '150+', 'Movies', '--c']] as $st): ?>
        <div>
          <div class="h-sn" style="color:var(<?= $st[2] ?>)"><?= htmlspecialchars($st[0]) ?></div>
          <div class="h-sl"><?= $st[1] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="h-scroll-hint" aria-hidden="true">
    <span
      style="font-size:9px;letter-spacing:.28em;text-transform:uppercase;color:rgba(237,232,223,.18);font-weight:700">Scroll</span>
    <div class="h-scroll-line"></div>
  </div>
</section>

<!-- ══ BRAND TICKER ══════════════════════════════════════ -->
<section class="fc-brands-sec" aria-label="Brand partners">
  <div style="padding:0 52px;max-width:1380px;margin:0 auto">
    <div class="fc-brands-label">Trusted By India's Biggest Names</div>
  </div>
  <?php $brands_sprite = FCPATH . 'assets/images/brands.png'; ?>
  <?php if (file_exists($brands_sprite)): ?>
    <div class="ticker-wrap">
      <div class="ticker-img-track">
        <img src="<?= base_url('assets/images/brands.png') ?>" alt="Brand partners"
          style="height:48px;width:auto;max-width:none;padding:0 40px;flex-shrink:0">
        <img src="<?= base_url('assets/images/brands.png') ?>" alt="" aria-hidden="true"
          style="height:48px;width:auto;max-width:none;padding:0 40px;flex-shrink:0">
      </div>
    </div>
  <?php else: ?>
    <div class="ticker-wrap">
      <div class="ticker-txt-track">
        <?php foreach ($ticker as $b): ?><span class="b-chip"><span
              class="b-dot"></span><?= htmlspecialchars($b) ?></span><?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>
</section>

<!-- ══ ABOUT ══════════════════════════════════════════════ -->
<section class="fcsec" aria-labelledby="fc-about-h">
  <div style="max-width:1380px;margin:0 auto">
    <div class="about-gr"
      style="display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center;margin-bottom:64px">
      <div>
        <p class="fc-tag fc-rv" style="color:var(--y);margin-bottom:20px">Who We Are</p>
        <h2 id="fc-about-h" class="fc-h2 fc-rv d1" style="margin-bottom:28px">WE MAKE<br>BRANDS<br><span
            class="g4">GO VIRAL</span></h2>
        <p class="fc-rv d2"
          style="font-size:clamp(14px,1.5vw,16px);color:var(--muted);line-height:1.88;max-width:480px;font-weight:500">
          <?= htmlspecialchars($settings['about_text'] ?? 'FilmyCurry is an influencer marketing agency driving high-impact campaigns for brands and production houses across entertainment, culture, and commerce.') ?>
        </p>
        <a href="<?= base_url('about') ?>" class="fc-btn fc-btn-y fc-rv d3" style="margin-top:32px">OUR STORY
          &rarr;</a>
      </div>
      <div class="fc-rv d2"
        style="background:var(--card);border:1px solid var(--border);border-radius:24px;overflow:hidden;height:340px;position:relative">
        <img src="<?= base_url('assets/images/background.png') ?>" alt="FilmyCurry"
          style="width:100%;height:100%;object-fit:cover;opacity:.45" loading="lazy"
          onerror="this.style.display='none'">
        <div
          style="position:absolute;inset:0;background:linear-gradient(to top,var(--card) 0%,transparent 55%)">
        </div>
        <div style="position:absolute;bottom:24px;left:24px">
          <p
            style="font-size:10px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--y);margin-bottom:4px">
            Powered by</p>
          <p style="font-size:20px;font-family:var(--font-d);font-weight:700;letter-spacing:-.02em">Creative
            Culture 🎬</p>
        </div>
        <div
          style="position:absolute;top:20px;right:20px;background:rgba(8,8,16,.78);backdrop-filter:blur(16px);border:1px solid rgba(245,197,24,.2);border-radius:12px;padding:14px 18px">
          <p style="font-size:26px;font-family:var(--font-d);font-weight:700;color:var(--y)">32%</p>
          <p
            style="font-size:9px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted)">
            OTT Releases</p>
        </div>
      </div>
    </div>
    <div class="stat-gr fc-rv d2" style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px">
      <?php foreach ([[$settings['stat_campaigns'] ?? '300+', 'Campaigns', 'Delivered', '--y'], ['32%', 'OTT Releases', 'Of all India', '--o'], [$settings['stat_reach'] ?? '12M+', 'Reach', 'Unique touchpoints', '--p'], [$settings['stat_screenings'] ?? '70+', 'Screenings', 'Events run', '--c']] as $b): ?>
        <div class="fc-stc">
          <div
            style="font-family:var(--font-d);font-weight:700;font-size:clamp(32px,4vw,52px);letter-spacing:-.04em;color:var(<?= $b[3] ?>)">
            <?= htmlspecialchars($b[0]) ?></div>
          <div style="font-family:var(--font-d);font-weight:700;font-size:15px;color:var(--cream);margin-top:5px">
            <?= $b[1] ?></div>
          <div style="font-size:12px;color:var(--muted);font-weight:600;margin-top:3px"><?= $b[2] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ SERVICES — HORIZONTAL SNAP SCROLL ════════════════
     Each slide = 100vw, snaps, JS drives arrows + dots.
     Touch/trackpad naturally swipe-scrolls too.         -->

<!-- ══ SERVICES — SCROLL-DRIVEN HORIZONTAL CAROUSEL ════════
     Desktop: section sticks, scrolling drives slide advance.
     Mobile: native horizontal swipe/snap.                  -->
<section class="svc-section" id="fc-services" aria-labelledby="fc-svc-h">

  <div class="svc-pin-wrap" id="svc-pin-wrap">
    <div class="svc-pin" id="svc-pin">

      <!-- Header -->
      <div class="svc-header">
        <div>
          <p class="fc-tag" style="color:var(--o);margin-bottom:12px">What We Do</p>
          <h2 id="fc-svc-h" class="fc-h2">OUR<br><span class="g1">SERVICES</span></h2>
        </div>
        <div style="display:flex;align-items:center;gap:20px;padding-bottom:4px">
          <div class="svc-scroll-hint" id="svc-scroll-hint">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
              <path d="M7 1v12M3 9l4 4 4-4" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Scroll to explore
          </div>
          <a href="<?= base_url('contact') ?>" class="fc-btn fc-btn-g" style="flex-shrink:0">WORK WITH US</a>
        </div>
      </div>

      <!-- Progress bar -->
      <div class="svc-progress-bar" aria-hidden="true">
        <div class="svc-progress-fill" id="svc-progress-fill"></div>
      </div>

      <!-- Slide track (transform-driven on desktop, scroll-driven on mobile) -->
      <div class="svc-track-outer" id="svc-track-outer">
        <div class="svc-track" id="svc-track" role="region" aria-label="Services">
          <?php foreach ($svcs as $i => $sv):
            $hex = ltrim($sv[3], '#');
            $r = hexdec(substr($hex, 0, 2));
            $g_val = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
          ?>
            <div class="svc-slide" id="svc-slide-<?= $i ?>"
              style="--svc-col:<?= $sv[3] ?>;--svc-rgb:<?= $r ?>,<?= $g_val ?>,<?= $b ?>" role="group"
              aria-label="Service <?= ($i + 1) ?> of 8: <?= htmlspecialchars($sv[2]) ?>"
              aria-roledescription="slide">
              <div class="svc-left">
                <span class="svc-counter"><?= $sv[0] ?> / <?= $sv[1] ?></span>
                <h3 class="svc-title"><?= htmlspecialchars($sv[2]) ?></h3>
                <p class="svc-desc"><?= htmlspecialchars($sv[5]) ?></p>
                <div class="svc-tags">
                  <?php foreach ($sv[6] as $tag): ?>
                    <span class="svc-tag"><?= htmlspecialchars($tag) ?></span>
                  <?php endforeach; ?>
                </div>
                <a href="<?= base_url('contact') ?>" class="svc-cta">
                  START THIS SERVICE <span class="svc-cta-arrow">→</span>
                </a>
              </div>
              <div class="svc-right" aria-hidden="true">
                <span class="svc-big-num"><?= $sv[0] ?></span>
                <span class="svc-emoji-wrap"><?= $sv[4] ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Nav: dots + arrows -->
      <div class="svc-nav">
        <div class="svc-nav-left">
          <div class="svc-dots" id="svc-dots" role="tablist" aria-label="Service navigation">
            <?php foreach ($svcs as $i => $sv): ?>
              <button class="svc-dot<?= $i === 0 ? ' on' : '' ?>" data-idx="<?= $i ?>" role="tab"
                aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
                aria-label="Go to service <?= ($i + 1) ?>: <?= htmlspecialchars($sv[2]) ?>">
              </button>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="svc-arrows">
          <button class="svc-arrow" id="svc-prev" aria-label="Previous service" disabled>&#8592;</button>
          <button class="svc-arrow" id="svc-next" aria-label="Next service">&#8594;</button>
        </div>
      </div>

    </div><!-- /svc-pin -->

    <!-- Scroll spacers: these extend the section height so user has scroll room.
         JS sets the total height = slides × 100vh (desktop only).           -->
    <div id="svc-spacers"></div>

  </div><!-- /svc-pin-wrap -->

</section>

</section>

<!-- ══ CAMPAIGNS ══════════════════════════════════════════ -->
<?php if (!empty($posts)): ?>
  <section class="fcsec" id="fc-campaigns" aria-labelledby="fc-camp-h" style="background:var(--ink)">
    <div style="max-width:1380px;margin:0 auto">
      <p class="fc-tag fc-rv" style="color:var(--p);margin-bottom:16px">Case Studies</p>
      <h2 id="fc-camp-h" class="fc-h2 fc-rv d1" style="margin-bottom:48px">BLOCKBUSTER<br><span
          class="g2">CAMPAIGNS</span></h2>
      <div class="fc-cg">
        <?php foreach ($posts as $i => $p): $dd = 'd' . (($i % 3) + 1); ?>
          <a href="<?= base_url('post/' . $p['slug']) ?>" class="fc-cc fc-rv <?= $dd ?>" data-fc-cur="VIEW">
            <div class="fc-ci">
              <?php if ($p['image']): ?>
                <img src="<?= base_url('assets/images/uploads/' . $p['image']) ?>"
                  alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy">
              <?php else: ?>
                <div
                  style="height:210px;background:linear-gradient(135deg,#16161f,#080810);display:flex;align-items:center;justify-content:center">
                  <span
                    style="font-family:var(--font-d);font-weight:700;font-size:56px;color:rgba(245,197,24,.07)">FC</span>
                </div>
              <?php endif; ?>
              <div class="fc-ctg"><?= htmlspecialchars($p['author']) ?></div>
            </div>
            <div class="fc-cbdy">
              <h3 class="fc-ctt"><?= htmlspecialchars($p['title']) ?></h3>
              <p class="fc-cdsc"><?= htmlspecialchars(substr($p['description'], 0, 90)) ?>...</p>
              <div class="fc-clnk">VIEW CAMPAIGN <span>→</span></div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <div style="text-align:center;margin-top:48px" class="fc-rv">
        <a href="<?= base_url('work') ?>" class="fc-btn fc-btn-g">VIEW ALL CAMPAIGNS</a>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- ══ PROCESS ════════════════════════════════════════════ -->
<section class="fcsec" aria-labelledby="fc-proc-h">
  <div style="max-width:1380px;margin:0 auto">
    <p class="fc-tag fc-rv" style="color:var(--c);margin-bottom:16px">How We Work</p>
    <h2 id="fc-proc-h" class="fc-h2 fc-rv d1" style="margin-bottom:48px">THE<br><span class="g3">PROCESS</span></h2>
    <div class="fc-pg">
      <?php foreach ([['🎯', 'Strategy', 'Deep-dive into brand goals, audience, and cultural context.', '--y'], ['🌐', 'Network', 'Match with perfect influencers, meme pages, and creators.', '--o'], ['🚀', 'Execute', 'Launch precision campaigns with real-time monitoring.', '--p'], ['📈', 'Scale', 'Analyze, optimize, and scale what\'s working for max ROI.', '--c']] as $i => $ps): $dd = 'd' . ($i + 1); ?>
        <div class="fc-pc fc-rv <?= $dd ?>" style="color:var(<?= $ps[3] ?>)">
          <div class="fc-pn"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
          <div style="font-size:30px;margin-bottom:14px"><?= $ps[0] ?></div>
          <h3
            style="font-family:var(--font-d);font-weight:700;font-size:22px;letter-spacing:-.02em;margin-bottom:10px">
            <?= $ps[1] ?></h3>
          <p style="font-size:13px;color:var(--muted);line-height:1.65;font-weight:500"><?= $ps[2] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ CTA ════════════════════════════════════════════════ -->
<section class="fc-cta-sec" aria-label="Call to action">
  <div class="fc-cta-bg"></div>
  <div class="fc-cta-grid"></div>
  <div style="position:relative;z-index:1;max-width:1380px;margin:0 auto;text-align:center">
    <p class="fc-tag fc-rv" style="color:var(--g);justify-content:center;margin:0 auto 20px">Ready to go viral?</p>
    <h2 class="fc-h2 fc-rv d1" style="margin-bottom:36px">LET'S BUILD<br>SOMETHING<br><span class="g3">VIRAL</span>
    </h2>
    <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap" class="fc-rv d2">
      <a href="<?= base_url('contact') ?>" class="fc-btn fc-btn-y" style="font-size:15px;padding:16px 40px">START
        A CAMPAIGN</a>
      <a href="mailto:<?= htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com') ?>"
        class="fc-btn fc-btn-g" style="font-size:15px;padding:15px 36px">EMAIL US</a>
    </div>
    <p class="fc-rv d3" style="margin-top:24px;font-size:13px;color:var(--muted);font-weight:600">
      <?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?> &nbsp;&middot;&nbsp;
      <?= htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com') ?>
    </p>
  </div>
</section>


<script>
  /* ═══════════════════════════════════════════════════════════
   SCROLL-DRIVEN HORIZONTAL SERVICES CAROUSEL
   Desktop (>768px):
   - Section pin-wrap height = (slides+1) × 100vh
   - svc-pin is sticky, stays in view
   - As user scrolls inside wrap, progress maps to slide index
   - Track moves via CSS translateX (no scroll, no jank)
   - Dots + arrows also work for manual nav
   Mobile (≤768px):
   - Falls back to native overflow-x scroll + snap
   - Arrows + dots sync to scroll position
═══════════════════════════════════════════════════════════ */
  (function() {
    var pinWrap = document.getElementById('svc-pin-wrap');
    var pin = document.getElementById('svc-pin');
    var track = document.getElementById('svc-track');
    var trackOuter = document.getElementById('svc-track-outer');
    var dots = document.querySelectorAll('.svc-dot');
    var btnPrev = document.getElementById('svc-prev');
    var btnNext = document.getElementById('svc-next');
    var fill = document.getElementById('svc-progress-fill');
    var hint = document.getElementById('svc-scroll-hint');
    var spacersEl = document.getElementById('svc-spacers');
    if (!track || !pinWrap) return;

    var total = dots.length;
    var current = 0;
    var isMobile = false;

    /* ── Detect mobile ──────────────────────────────────── */
    function checkMobile() {
      isMobile = window.innerWidth <= 768;
    }
    checkMobile();

    /* ── Desktop setup: create spacer height ───────────── */
    function setupDesktop() {
      if (!spacersEl) return;
      /* Section total height = pin height (100vh) + scroll distance for all slides */
      /* Each slide needs ~80vh of scroll to feel comfortable */
      var scrollPerSlide = window.innerHeight * 0.85;
      var totalExtra = scrollPerSlide * (total - 1);
      spacersEl.style.height = totalExtra + 'px';
      /* Reset track to no transform/scroll */
      track.style.transition = 'transform .65s cubic-bezier(.16,1,.3,1)';
      track.style.transform = 'translateX(0)';
      trackOuter.style.overflowX = 'hidden';
      track.style.overflowX = 'visible';
      if (hint) hint.style.display = '';
    }

    /* ── Mobile setup: native scroll ───────────────────── */
    function setupMobile() {
      if (spacersEl) spacersEl.style.height = '0px';
      track.style.transform = '';
      track.style.transition = '';
      trackOuter.style.overflowX = 'auto';
      if (hint) hint.style.display = 'none';
    }

    /* ── Go to slide (desktop = translateX, mobile = scrollTo) */
    function goTo(idx, smooth) {
      if (idx < 0) idx = 0;
      if (idx >= total) idx = total - 1;
      current = idx;

      if (isMobile) {
        /* Mobile: scroll the track-outer horizontally */
        var slideW = track.querySelector('.svc-slide').offsetWidth + 12;
        trackOuter.scrollTo({
          left: idx * slideW,
          behavior: smooth === false ? 'instant' : 'smooth'
        });
      } else {
        /* Desktop: translateX the track */
        track.style.transform = 'translateX(-' + (idx * 100) + '%)';
      }

      updateUI();
    }

    /* ── Update dots / progress / buttons ──────────────── */
    function updateUI() {
      dots.forEach(function(d, i) {
        d.classList.toggle('on', i === current);
        d.setAttribute('aria-selected', i === current ? 'true' : 'false');
      });
      if (fill) fill.style.width = ((current + 1) / total * 100) + '%';
      if (btnPrev) btnPrev.disabled = current === 0;
      if (btnNext) btnNext.disabled = current === total - 1;
    }

    /* ── DESKTOP: Scroll handler ────────────────────────── */
    function onScroll() {
      if (isMobile) return;
      var rect = pinWrap.getBoundingClientRect();
      var wrapH = pinWrap.offsetHeight;
      var pinH = pin.offsetHeight; /* = 100vh */
      var scrolled = -rect.top; /* how far user has scrolled into wrap */
      var maxScroll = wrapH - pinH; /* total scrollable distance */

      if (scrolled < 0) scrolled = 0;
      if (scrolled > maxScroll) scrolled = maxScroll;

      /* Map scroll position to slide index */
      var progress = scrolled / maxScroll; /* 0 → 1 */
      var rawIdx = progress * (total - 1); /* 0 → total-1 */
      var idx = Math.round(rawIdx);

      if (idx !== current) {
        current = idx;
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        updateUI();
      }

      /* Continuous progress bar (smooth, not stepped) */
      if (fill) fill.style.width = ((rawIdx + 1) / total * 100) + '%';
    }

    /* ── MOBILE: sync dots to scroll position ──────────── */
    var mobileScrollTimer;

    function onMobileScroll() {
      clearTimeout(mobileScrollTimer);
      mobileScrollTimer = setTimeout(function() {
        var slideW = (track.querySelector('.svc-slide').offsetWidth + 12) || 1;
        var idx = Math.round(trackOuter.scrollLeft / slideW);
        if (idx !== current) {
          current = idx;
          updateUI();
        }
      }, 50);
    }

    /* ── Manual dot / arrow clicks ──────────────────────── */
    dots.forEach(function(d, i) {
      d.addEventListener('click', function() {
        goTo(i);
      });
    });
    if (btnPrev) btnPrev.addEventListener('click', function() {
      goTo(current - 1);
    });
    if (btnNext) btnNext.addEventListener('click', function() {
      goTo(current + 1);
    });

    /* ── Keyboard when inside section ───────────────────── */
    document.getElementById('fc-services').addEventListener('keydown', function(e) {
      if (e.key === 'ArrowRight') {
        e.preventDefault();
        goTo(current + 1);
      }
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        goTo(current - 1);
      }
    });

    /* ── Resize handler ─────────────────────────────────── */
    var resizeTimer;
    window.addEventListener('resize', function() {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() {
        var wasMobile = isMobile;
        checkMobile();
        if (isMobile !== wasMobile) {
          /* Mode changed — reinit */
          if (isMobile) {
            setupMobile();
          } else {
            setupDesktop();
          }
          current = 0;
          updateUI();
        } else if (!isMobile) {
          /* Desktop resize: re-set spacer height */
          setupDesktop();
          goTo(current, false);
        } else {
          /* Mobile resize: snap back */
          goTo(current, false);
        }
      }, 150);
    });

    /* ── Attach scroll listener ─────────────────────────── */
    window.addEventListener('scroll', onScroll, {
      passive: true
    });
    trackOuter.addEventListener('scroll', onMobileScroll, {
      passive: true
    });

    /* ── Init ───────────────────────────────────────────── */
    if (isMobile) {
      setupMobile();
    } else {
      setupDesktop();
    }
    updateUI();

  })();
</script>