<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
 * FILE: application/views/frontend/home.php
 * Replace your existing home.php with this file.
 */

// Brand logos — place PNG files in: assets/images/brands/
// Name them exactly as listed. Text fallback shown if file missing.
$brand_logos = [
  ['img' => 'logo-boat.png',    'name' => 'boAt'],
  ['img' => 'logo-fastrack.png', 'name' => 'Fastrack'],
  ['img' => 'logo-myntra.png',  'name' => 'Myntra'],
  ['img' => 'logo-oneplus.png', 'name' => 'OnePlus'],
  ['img' => 'logo-tata.png',    'name' => 'Tata Motors'],
  ['img' => 'logo-netflix.png', 'name' => 'Netflix'],
  ['img' => 'logo-amazon.png',  'name' => 'Amazon Prime'],
  ['img' => 'logo-disney.png',  'name' => 'Disney+'],
  ['img' => 'logo-dharma.png',  'name' => 'Dharma'],
  ['img' => 'logo-yrf.png',     'name' => 'YRF'],
  ['img' => 'logo-sony.png',    'name' => 'Sony'],
  ['img' => 'logo-tseries.png', 'name' => 'T-Series'],
  ['img' => 'logo-warner.png',  'name' => 'Warner Bros'],
  ['img' => 'logo-maddock.png', 'name' => 'Maddock Films'],
  ['img' => 'logo-philips.png', 'name' => 'Philips'],
];
$cols = [[], [], [], []];
foreach ($brand_logos as $i => $bl) {
  $cols[$i % 4][] = $bl;
}
$svcs = [
  ['01', 'Influencer Marketing', '#F5C518', 'Meticulous influencer matching for your brand goals.'],
  ['02', 'Meme Marketing', '#FF6432', 'Viral campaigns embedded into cultural conversations.'],
  ['03', 'Movie Promotions', '#C860F0', 'End-to-end promos from teaser to box-office day.'],
  ['04', 'LinkedIn & X', '#00D4FF', 'Strategic campaigns on professional platforms.'],
  ['05', 'Celebrity Endorsement', '#3DFF8F', 'Curated partnerships that amplify conversions.'],
  ['06', 'Video Production', '#F5C518', 'Ads, promos, web series — concept to final cut.'],
  ['07', 'Movie Screenings', '#FF6432', 'Exclusive influencer events generating organic buzz.'],
  ['08', 'On-Ground Promos', '#C860F0', 'Real-world activations bridging digital & physical.'],
];
$holes = array_fill(0, 30, 1);
?>
<style>
  .fc-hero {
    position: relative;
    z-index: 1;
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 100px 52px 80px;
    overflow: hidden
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
    animation: fcsup .6s ease .3s forwards
  }

  .fc-pulse {
    width: 8px;
    height: 8px;
    background: var(--y);
    border-radius: 50%;
    flex-shrink: 0;
    animation: fcping 1.6s ease-in-out infinite
  }

  @keyframes fcping {

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

  .fch1 {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: clamp(60px, 11vw, 140px);
    line-height: .86;
    letter-spacing: -.04em;
    color: var(--cream);
    margin-bottom: 28px;
    opacity: 0;
    animation: fcsup 1s cubic-bezier(.16, 1, .3, 1) .5s forwards
  }

  .fcsub {
    font-size: 17px;
    font-weight: 500;
    color: var(--muted);
    max-width: 440px;
    line-height: 1.78;
    margin-bottom: 44px;
    opacity: 0;
    animation: fcsup .7s ease .85s forwards
  }

  .fcbtns {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    opacity: 0;
    animation: fcsup .6s ease 1.05s forwards
  }

  .fcstats {
    margin-top: 72px;
    padding-top: 36px;
    border-top: 1px solid var(--border);
    display: flex;
    flex-wrap: wrap;
    gap: 52px;
    opacity: 0;
    animation: fcsup .6s ease 1.2s forwards
  }

  .fcsn {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 52px;
    line-height: 1;
    letter-spacing: -.04em
  }

  .fcsl {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--muted);
    margin-top: 7px
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
    pointer-events: none
  }

  .fc-fh {
    width: 13px;
    height: 10px;
    background: var(--y);
    border-radius: 2px;
    margin: 7px auto;
    flex-shrink: 0
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
    animation: fcsup .5s ease 1.6s forwards
  }

  .fc-shl {
    width: 1px;
    height: 52px;
    background: linear-gradient(var(--y), transparent);
    animation: fcsl2 2.2s ease-in-out infinite
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

  /* SVC CARDS */
  .fc-sg {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px
  }

  .fc-sc2 {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 28px;
    transition: transform .4s cubic-bezier(.16, 1, .3, 1), border-color .3s;
    position: relative;
    overflow: hidden;
    cursor: default
  }

  .fc-sc2::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, currentColor, transparent);
    opacity: 0;
    transition: opacity .4s;
    border-radius: 16px
  }

  .fc-sc2:hover {
    transform: translateY(-7px)
  }

  .fc-sc2:hover::after {
    opacity: .06
  }

  .fc-sco {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .2em;
    opacity: .3;
    display: block;
    margin-bottom: 20px
  }

  .fc-sct2 {
    font-family: var(--font-d);
    font-weight: 700;
    font-size: 18px;
    letter-spacing: -.02em;
    color: var(--cream);
    margin-bottom: 10px;
    line-height: 1.2
  }

  .fc-scd2 {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.6
  }

  .fc-sar {
    position: absolute;
    top: 24px;
    right: 24px;
    width: 34px;
    height: 34px;
    border: 1.5px solid currentColor;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    opacity: .22;
    transition: opacity .35s, transform .35s cubic-bezier(.16, 1, .3, 1)
  }

  .fc-sc2:hover .fc-sar {
    opacity: 1;
    transform: rotate(45deg)
  }

  /* CAMP CARDS */
  .fc-cg {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px
  }

  .fc-cc2 {
    border-radius: 18px;
    overflow: hidden;
    background: var(--card);
    border: 1px solid var(--border);
    transition: transform .45s cubic-bezier(.16, 1, .3, 1), border-color .3s, box-shadow .3s
  }

  .fc-cc2:hover {
    transform: translateY(-8px);
    border-color: rgba(245, 197, 24, .25);
    box-shadow: 0 28px 72px rgba(0, 0, 0, .45)
  }

  .fc-ci {
    height: 220px;
    overflow: hidden;
    position: relative
  }

  .fc-ci img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .7s cubic-bezier(.16, 1, .3, 1)
  }

  .fc-cc2:hover .fc-ci img {
    transform: scale(1.08)
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
    color: var(--y)
  }

  .fc-cbdy {
    padding: 24px
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

  .fc-cc2:hover .fc-ctt {
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
    margin-top: 16px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: rgba(245, 197, 24, .4);
    transition: color .25s, gap .25s
  }

  .fc-cc2:hover .fc-clnk {
    color: var(--y);
    gap: 10px
  }

  /* STAT CARDS */
  .fc-stc2 {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 36px 28px;
    transition: border-color .3s, transform .3s
  }

  .fc-stc2:hover {
    border-color: rgba(245, 197, 24, .25);
    transform: translateY(-4px)
  }

  /* PROCESS */
  .fc-pg {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px
  }

  .fc-prc2 {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 36px 28px;
    position: relative;
    overflow: hidden;
    transition: border-color .35s, transform .35s
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
    transition: transform .5s cubic-bezier(.16, 1, .3, 1)
  }

  .fc-prc2:hover {
    transform: translateY(-5px);
    border-color: currentColor
  }

  .fc-prc2:hover::before {
    transform: scaleX(1)
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
    right: 20px
  }

  /* CTA */
  .fc-ctasec {
    position: relative;
    z-index: 1;
    padding: 100px 52px;
    overflow: hidden
  }

  .fc-ctam {
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 60% 80% at 20% 50%, rgba(245, 197, 24, .09) 0%, transparent 60%), radial-gradient(ellipse 50% 70% at 80% 50%, rgba(200, 96, 240, .08) 0%, transparent 55%);
    pointer-events: none
  }

  .fc-ctag2 {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(255, 255, 255, .025) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .025) 1px, transparent 1px);
    background-size: 68px 68px
  }

  @media(max-width:1200px) {
    .fc-sg {
      grid-template-columns: repeat(2, 1fr) !important
    }

    .fc-pg {
      grid-template-columns: repeat(2, 1fr) !important
    }
  }

  @media(max-width:1024px) {

    .fc-hero,
    .fcsec {
      padding-left: 28px !important;
      padding-right: 28px !important
    }

    .fc-cg {
      grid-template-columns: repeat(2, 1fr) !important
    }
  }

  @media(max-width:768px) {
    .fc-hero {
      padding: 90px 20px 72px !important
    }

    .fcsec {
      padding-left: 20px !important;
      padding-right: 20px !important
    }

    .fcstats {
      gap: 28px
    }

    .fcsn {
      font-size: 38px !important
    }

    .fc-cg {
      grid-template-columns: 1fr !important
    }

    .fc-sg {
      grid-template-columns: 1fr 1fr !important
    }

    .fc-pg {
      grid-template-columns: 1fr 1fr !important
    }

    .about-gr {
      grid-template-columns: 1fr !important
    }

    .stat-gr {
      grid-template-columns: 1fr 1fr !important
    }
  }

  @media(max-width:520px) {
    .fc-sg {
      grid-template-columns: 1fr !important
    }

    .fc-pg {
      grid-template-columns: 1fr !important
    }

    .fcbtns {
      flex-direction: column
    }

    .fc-btn {
      width: 100%;
      justify-content: center !important
    }
  }
</style>

<!-- HERO -->
<section class="fc-hero" role="banner" aria-labelledby="fc-hero-h">
  <div class="fc-fs" style="left:0"><?php foreach ($holes as $h): ?><div class="fc-fh"></div><?php endforeach; ?>
  </div>
  <div class="fc-fs" style="right:0"><?php foreach ($holes as $h): ?><div class="fc-fh"></div><?php endforeach; ?>
  </div>
  <div style="position:absolute;top:18%;right:10%;font-size:32px;opacity:.14;animation:fc-float 7s ease-in-out infinite;pointer-events:none"
    aria-hidden="true">🎬</div>
  <div style="position:absolute;top:55%;right:22%;font-size:24px;opacity:.12;animation:fc-float 5.5s ease-in-out 1s infinite;pointer-events:none"
    aria-hidden="true">🎞️</div>
  <div style="position:absolute;bottom:22%;right:7%;font-size:28px;opacity:.11;animation:fc-float 8s ease-in-out .5s infinite;pointer-events:none"
    aria-hidden="true">🍿</div>
  <div style="position:relative;z-index:2;width:100%;max-width:1380px;margin:0 auto">
    <div class="fc-hero-badge"><span class="fc-pulse"></span>India's Premier Entertainment Marketing Agency</div>
    <h1 class="fch1" id="fc-hero-h">SPICE<br>UP YOUR<br><span class="fc-grad-text-1">SOCIAL</span>&thinsp;<span
        class="fc-grad-text-2">MEDIA</span></h1>
    <p class="fcsub">
      <?php echo htmlspecialchars($settings['hero_subtext'] ?? 'One-stop solution for influencer marketing, meme campaigns, and viral content that powers 32% of all OTT releases.'); ?>
    </p>
    <div class="fcbtns">
      <a href="#campaigns" class="fc-btn fc-btn-y" data-fc-cur="EXPLORE">SEE OUR WORK</a>
      <a href="<?php echo base_url('contact'); ?>" class="fc-btn fc-btn-ghost" data-fc-cur="TALK">LET'S TALK
        &rarr;</a>
    </div>
    <div class="fcstats">
      <?php foreach ([[$settings['stat_campaigns'] ?? '300+', 'Campaigns', '--y'], ['32%', 'OTT Releases', '--o'], [$settings['stat_reach'] ?? '12M+', 'Reached', '--p'], [$settings['stat_movies'] ?? '150+', 'Movies', '--c']] as $st): ?>
        <div>
          <div class="fcsn" style="color:var(<?php echo $st[2]; ?>)"><?php echo htmlspecialchars($st[0]); ?></div>
          <div class="fcsl"><?php echo $st[1]; ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="fc-shi" aria-hidden="true"><span
      style="font-size:9px;letter-spacing:.28em;text-transform:uppercase;color:rgba(237,232,223,.18);font-weight:700">Scroll</span>
    <div class="fc-shl"></div>
  </div>
</section>

<!-- BRAND LOGO VERTICAL TICKER -->
<section class="fc-logo-ticker-section" style="position:relative;z-index:1" aria-label="Brand partners">
  <div class="fc-max">
    <p class="fc-logo-ticker-label">Trusted By India's Biggest Names</p>
    <div class="fc-ticker-outer">
      <?php foreach ($cols as $ci => $col):
        $dir = ($ci % 2 !== 0) ? ' rev' : '';
        $doubled = array_merge($col, $col); ?>
        <div class="fc-ticker-col<?php echo $dir; ?>">
          <?php foreach ($doubled as $bl):
            $imgp = FCPATH . 'assets/images/brands/' . $bl['img']; ?>
            <div class="fc-logo-item" data-fc-tilt>
              <?php if (file_exists($imgp)): ?>
                <img src="<?php echo base_url('assets/images/brands/' . $bl['img']); ?>"
                  alt="<?php echo htmlspecialchars($bl['name']); ?>" loading="lazy">
              <?php else: ?><span
                  class="fc-logo-item-text"><?php echo htmlspecialchars($bl['name']); ?></span><?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="fcsec" style="padding:120px 52px;position:relative;z-index:1" aria-labelledby="fc-about-h">
  <div class="fc-max">
    <div class="about-gr"
      style="display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center;margin-bottom:72px">
      <div>
        <p class="fc-tag fc-rv" style="color:var(--y);margin-bottom:20px">Who We Are</p>
        <h2 id="fc-about-h" class="fc-h2 fc-rv fc-d1" style="margin-bottom:28px">WE MAKE<br>BRANDS<br><span
            class="fc-grad-text-3">GO VIRAL</span></h2>
        <p class="fc-rv fc-d2"
          style="font-size:16px;color:var(--muted);line-height:1.88;max-width:480px;font-weight:500">
          <?php echo htmlspecialchars($settings['about_text'] ?? 'FilmyCurry is an influencer marketing agency driving high-impact campaigns for brands and production houses across entertainment, culture, and commerce.'); ?>
        </p>
        <a href="<?php echo base_url('about'); ?>" class="fc-btn fc-btn-y fc-rv fc-d3"
          style="margin-top:36px;display:inline-flex">OUR STORY &rarr;</a>
      </div>
      <div class="fc-rv fc-d2"
        style="background:var(--card);border:1px solid var(--border);border-radius:24px;overflow:hidden;height:360px;position:relative">
        <img src="<?php echo base_url('assets/images/background.png'); ?>" alt="FilmyCurry"
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
            Culture &#127916;</p>
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
            style="font-family:var(--font-d);font-weight:700;font-size:clamp(36px,5vw,56px);letter-spacing:-.04em;color:var(<?php echo $bi[3]; ?>)">
            <?php echo htmlspecialchars($bi[0]); ?></div>
          <div style="font-family:var(--font-d);font-weight:700;font-size:16px;color:var(--cream);margin-top:6px">
            <?php echo $bi[1]; ?></div>
          <div style="font-size:12px;color:var(--muted);font-weight:600;margin-top:4px"><?php echo $bi[2]; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="fcsec" style="padding:120px 52px;background:var(--ink);position:relative;z-index:1"
  aria-labelledby="fc-svc-h">
  <div class="fc-max">
    <div
      style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:52px;flex-wrap:wrap;gap:24px">
      <div>
        <p class="fc-tag fc-rv" style="color:var(--o);margin-bottom:20px">What We Do</p>
        <h2 id="fc-svc-h" class="fc-h2 fc-rv fc-d1">OUR<br><span class="fc-grad-text-1">SERVICES</span></h2>
      </div>
      <a href="<?php echo base_url('contact'); ?>" class="fc-btn fc-btn-ghost fc-rv fc-d2">WORK WITH US</a>
    </div>
    <div class="fc-sg">
      <?php foreach ($svcs as $i => $sv): $dd = 'fc-d' . (($i % 4) + 1); ?>
        <div class="fc-sc2 fc-rv <?php echo $dd; ?>" style="color:<?php echo $sv[2]; ?>" data-fc-tilt>
          <span class="fc-sco"><?php echo $sv[0]; ?></span>
          <h3 class="fc-sct2"><?php echo $sv[1]; ?></h3>
          <p class="fc-scd2"><?php echo $sv[3]; ?></p>
          <div class="fc-sar">&#8599;</div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CAMPAIGNS -->
<?php if (!empty($posts)): ?>
  <section class="fcsec" id="campaigns" style="padding:120px 52px;position:relative;z-index:1"
    aria-labelledby="fc-camp-h">
    <div class="fc-max">
      <p class="fc-tag fc-rv" style="color:var(--p);margin-bottom:20px">Case Studies</p>
      <h2 id="fc-camp-h" class="fc-h2 fc-rv fc-d1" style="margin-bottom:56px">BLOCKBUSTER<br><span
          class="fc-grad-text-2">CAMPAIGNS</span></h2>
      <div class="fc-cg">
        <?php foreach ($posts as $i => $p): $dd = 'fc-d' . (($i % 3) + 1); ?>
          <a href="<?php echo base_url('post/' . $p['slug']); ?>" style="text-decoration:none;display:block"
            data-fc-cur="VIEW">
            <article class="fc-cc2 fc-rv <?php echo $dd; ?>">
              <div class="fc-ci">
                <?php if ($p['image']): ?><img
                    src="<?php echo base_url('assets/images/uploads/' . $p['image']); ?>"
                    alt="<?php echo htmlspecialchars($p['title']); ?>" loading="lazy">
                <?php else: ?><div
                    style="height:220px;background:linear-gradient(135deg,#16161f,#080810);display:flex;align-items:center;justify-content:center">
                    <span
                      style="font-family:var(--font-d);font-weight:700;font-size:60px;color:rgba(245,197,24,.07)">FC</span>
                  </div><?php endif; ?>
                <div class="fc-ctg"><?php echo htmlspecialchars($p['author']); ?></div>
              </div>
              <div class="fc-cbdy">
                <h3 class="fc-ctt"><?php echo htmlspecialchars($p['title']); ?></h3>
                <p class="fc-cdsc"><?php echo htmlspecialchars(substr($p['description'], 0, 90)); ?>...</p>
                <div class="fc-clnk">VIEW CAMPAIGN <span>&rarr;</span></div>
              </div>
            </article>
          </a>
        <?php endforeach; ?>
      </div>
      <div style="text-align:center;margin-top:52px" class="fc-rv"><a href="<?php echo base_url('work'); ?>"
          class="fc-btn fc-btn-ghost">VIEW ALL CAMPAIGNS</a></div>
    </div>
  </section>
<?php endif; ?>

<!-- PROCESS -->
<section class="fcsec" style="padding:120px 52px;background:var(--ink);position:relative;z-index:1"
  aria-labelledby="fc-proc-h">
  <div class="fc-max">
    <p class="fc-tag fc-rv" style="color:var(--c);margin-bottom:20px">How We Work</p>
    <h2 id="fc-proc-h" class="fc-h2 fc-rv fc-d1" style="margin-bottom:52px">THE<br><span
        class="fc-grad-text-4">PROCESS</span></h2>
    <div class="fc-pg">
      <?php foreach ([['&#127919;', 'Strategy', 'Deep-dive into brand goals, audience, and cultural context.', '--y'], ['&#127760;', 'Network', 'Match with perfect influencers, meme pages, and content creators.', '--o'], ['&#128640;', 'Execute', 'Launch precision campaigns with real-time monitoring.', '--p'], ['&#128200;', 'Scale', 'Analyze, optimize, and scale what\'s working for maximum ROI.', '--c']] as $i => $ps): $dd = 'fc-d' . ($i + 1); ?>
        <div class="fc-prc2 fc-rv <?php echo $dd; ?>" style="color:var(<?php echo $ps[3]; ?>)">
          <div class="fc-pn2"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></div>
          <div style="font-size:32px;margin-bottom:16px"><?php echo $ps[0]; ?></div>
          <h3
            style="font-family:var(--font-d);font-weight:700;font-size:22px;letter-spacing:-.02em;margin-bottom:10px">
            <?php echo $ps[1]; ?></h3>
          <p style="font-size:14px;color:var(--muted);line-height:1.65;font-weight:500"><?php echo $ps[2]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="fc-ctasec" aria-label="Call to action">
  <div class="fc-ctam"></div>
  <div class="fc-ctag2"></div>
  <div style="position:relative;z-index:1;max-width:1380px;margin:0 auto;text-align:center">
    <p class="fc-tag fc-rv" style="color:var(--g);justify-content:center;margin:0 auto 24px">Ready to go viral?</p>
    <h2 class="fc-h2 fc-rv fc-d1" style="margin-bottom:40px">LET'S BUILD<br>SOMETHING<br><span
        class="fc-grad-text-3">VIRAL</span></h2>
    <div style="display:flex;justify-content:center;gap:16px;flex-wrap:wrap" class="fc-rv fc-d2">
      <a href="<?php echo base_url('contact'); ?>" class="fc-btn fc-btn-y"
        style="font-size:16px;padding:18px 44px" data-fc-cur="GO">START A CAMPAIGN</a>
      <a href="mailto:<?php echo htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com'); ?>"
        class="fc-btn fc-btn-ghost" style="font-size:16px;padding:17px 40px">EMAIL US</a>
    </div>
    <p class="fc-rv fc-d3" style="margin-top:28px;font-size:14px;color:var(--muted);font-weight:600">
      <?php echo htmlspecialchars($settings['site_phone'] ?? '+91 9990802115'); ?> &nbsp;&middot;&nbsp;
      <?php echo htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com'); ?></p>
  </div>
</section>