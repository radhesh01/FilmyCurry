<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$HOLES=array_fill(0,26,1);
$svcs=[
  ['01','Influencer Marketing','Meticulous influencer selection matched to your brand, audience, and campaign goals.'],
  ['02','Meme Marketing','Viral meme campaigns that embed your brand into cultural conversations at scale.'],
  ['03','Movie Promotions','End-to-end promotional campaigns — from teaser drops to box office success.'],
  ['04','LinkedIn & X Marketing','Strategic campaigns across professional and real-time social platforms.'],
  ['05','Celebrity Endorsement','Curated celebrity partnerships that amplify reach and drive massive conversions.'],
  ['06','Video Production','Ads, promos, web series — from concept to final cut.'],
  ['07','Movie Screenings','Exclusive events with influencers that generate organic buzz.'],
  ['08','On-Ground Promotions','Real-world activations that bridge digital campaigns with physical impact.'],
];
$clients=['Warner Bros','Netflix','Amazon Prime','Disney+ Hotstar','Dharma Productions',
          'YRF Entertainment','Maddock Films','Sony Pictures','Balaji Telefilms',
          'Viacom18','T-Series','Red Chillies','Pen Studios','JioHotstar','Marvel'];
$clients_d=array_merge($clients,$clients);
?>

<!-- ═══ HERO ═══════════════════════════════════════════════ -->
<section style="position:relative;min-height:100vh;display:flex;align-items:center;overflow:hidden;background:#0D0D0D">
  <div class="scanlines noise"></div>

  <!-- Film strips -->
  <div class="film-strip" style="left:0"><?php foreach($HOLES as $h):?><div class="film-hole"></div><?php endforeach;?></div>
  <div class="film-strip" style="right:0"><?php foreach($HOLES as $h):?><div class="film-hole"></div><?php endforeach;?></div>

  <!-- Background glow -->
  <div style="position:absolute;top:10%;right:10%;width:600px;height:600px;border-radius:50%;background:radial-gradient(circle,rgba(245,197,24,.05) 0%,transparent 70%);pointer-events:none"></div>
  <div style="position:absolute;bottom:20%;left:5%;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(245,197,24,.04) 0%,transparent 70%);pointer-events:none"></div>

  <div style="position:relative;z-index:2;padding:120px 6rem 80px" class="px-8 md:px-24">

    <p style="color:#F5C518;font-size:11px;font-weight:500;letter-spacing:.3em;text-transform:uppercase;margin-bottom:24px;opacity:0;animation:fadeUp .6s ease .3s forwards">
      India's Premier Entertainment Marketing Agency
    </p>

    <h1 style="font-family:'Bebas Neue',Impact,sans-serif;font-size:clamp(72px,13vw,148px);line-height:.86;color:#F9F5EE;margin-bottom:28px;opacity:0;animation:fadeUp .9s cubic-bezier(.16,1,.3,1) .5s forwards">
      <?= nl2br(htmlspecialchars($settings['hero_heading'] ?? 'SPICE UP YOUR SOCIAL MEDIA')) ?>
    </h1>

    <p style="color:rgba(249,245,238,.45);font-size:17px;max-width:440px;line-height:1.75;margin-bottom:44px;opacity:0;animation:fadeUp .6s ease .85s forwards">
      <?= htmlspecialchars($settings['hero_subtext'] ?? '') ?>
    </p>

    <div style="display:flex;gap:14px;flex-wrap:wrap;opacity:0;animation:fadeUp .6s ease 1.05s forwards">
      <a href="#campaigns" style="background:#F5C518;color:#0D0D0D;font-family:'Bebas Neue',sans-serif;font-size:19px;letter-spacing:.1em;padding:14px 36px;border-radius:4px;text-decoration:none;transition:all .2s" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
        SEE OUR WORK
      </a>
      <a href="mailto:<?= htmlspecialchars($settings['site_email']??'') ?>" style="border:1px solid rgba(249,245,238,.2);color:#F9F5EE;font-family:'Bebas Neue',sans-serif;font-size:19px;letter-spacing:.1em;padding:14px 36px;border-radius:4px;text-decoration:none;transition:all .2s" onmouseover="this.style.borderColor='#F5C518';this.style.color='#F5C518'" onmouseout="this.style.borderColor='rgba(249,245,238,.2)';this.style.color='#F9F5EE'">
        LET'S TALK
      </a>
    </div>

    <!-- Stats -->
    <div style="margin-top:64px;padding-top:32px;border-top:1px solid rgba(255,255,255,.07);display:flex;flex-wrap:wrap;gap:48px;opacity:0;animation:fadeUp .6s ease 1.25s forwards">
      <?php
      $stats=[
        [$settings['stat_campaigns']??'300+','Campaigns'],
        ['32%','OTT Releases'],
        [$settings['stat_reach']??'12M+','Reached'],
        [$settings['stat_movies']??'150+','Movies'],
      ];
      foreach($stats as $s):?>
      <div>
        <div style="font-family:'Bebas Neue',sans-serif;font-size:48px;color:#F5C518;line-height:1"><?= htmlspecialchars($s[0]) ?></div>
        <div style="font-size:11px;color:rgba(249,245,238,.35);letter-spacing:.15em;text-transform:uppercase;margin-top:4px"><?= $s[1] ?></div>
      </div>
      <?php endforeach;?>
    </div>
  </div>

  <!-- Scroll indicator -->
  <div style="position:absolute;bottom:32px;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:8px;opacity:0;animation:fadeUp .6s ease 1.6s forwards">
    <span style="font-size:9px;color:rgba(249,245,238,.2);letter-spacing:.25em;text-transform:uppercase">Scroll</span>
    <div style="width:1px;height:40px;background:linear-gradient(to bottom,#F5C518,transparent);animation:pulse-scroll 2s ease-in-out infinite"></div>
  </div>
</section>

<!-- ═══ MARQUEE ═══════════════════════════════════════════ -->
<section style="padding:52px 0;background:#111;border-top:1px solid rgba(255,255,255,.04);border-bottom:1px solid rgba(255,255,255,.04);overflow:hidden">
  <p style="text-align:center;font-size:9px;letter-spacing:.35em;text-transform:uppercase;color:rgba(249,245,238,.18);margin-bottom:28px">Trusted By India's Biggest Names</p>
  <div class="marquee-wrap">
    <div class="marquee-track">
      <?php foreach($clients_d as $c):?>
      <span style="font-family:'Bebas Neue',sans-serif;font-size:21px;letter-spacing:.12em;color:rgba(249,245,238,.18);flex-shrink:0;transition:color .3s;cursor:default" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='rgba(249,245,238,.18)'"><?= $c ?></span>
      <?php endforeach;?>
    </div>
  </div>
</section>

<!-- ═══ ABOUT ══════════════════════════════════════════════ -->
<section id="about" style="padding:120px 6rem;background:#0D0D0D;position:relative" class="px-8 md:px-24">
  <div style="max-width:820px">
    <p class="reveal" style="color:#F5C518;font-size:11px;letter-spacing:.3em;text-transform:uppercase;margin-bottom:20px">Who We Are</p>
    <h2 class="reveal d1" style="font-family:'Bebas Neue',sans-serif;font-size:clamp(52px,8vw,96px);line-height:.88;color:#F9F5EE;margin-bottom:36px">
      WE MAKE<br><span style="color:#F5C518">BRANDS</span><br>GO VIRAL
    </h2>
    <p class="reveal d2" style="font-size:18px;line-height:1.85;color:rgba(249,245,238,.5);max-width:600px">
      <?= htmlspecialchars($settings['about_text'] ?? '') ?>
    </p>
  </div>

  <!-- Big numbers grid -->
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));margin-top:80px;border-top:1px solid rgba(255,255,255,.06)">
    <?php
    $bigs=[
      [$settings['stat_campaigns']??'300+','Total Campaigns','Delivered for brands & films'],
      ['32%','OTT Releases','Of all Indian OTT content'],
      [$settings['stat_reach']??'12M+','Reach','Unique audience touchpoints'],
      [$settings['stat_screenings']??'70+','Screenings','Exclusive influencer events'],
    ];
    foreach($bigs as $i=>$b):?>
    <div class="reveal" style="padding:48px 32px;border-right:1px solid rgba(255,255,255,.04);transition-delay:<?=$i*.08?>s">
      <div style="font-family:'Bebas Neue',sans-serif;font-size:60px;color:#F5C518;line-height:1"><?= htmlspecialchars($b[0]) ?></div>
      <div style="font-family:'Bebas Neue',sans-serif;font-size:20px;color:#F9F5EE;margin-top:4px"><?= $b[1] ?></div>
      <div style="font-size:12px;color:rgba(249,245,238,.3);margin-top:6px"><?= $b[2] ?></div>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- ═══ CAMPAIGNS (from DB) ═══════════════════════════════ -->
<section id="campaigns" style="padding:120px 6rem;background:#0A0A0A" class="px-8 md:px-24">
  <p class="reveal" style="color:#F5C518;font-size:11px;letter-spacing:.3em;text-transform:uppercase;margin-bottom:20px">Case Studies</p>
  <h2 class="reveal d1" style="font-family:'Bebas Neue',sans-serif;font-size:clamp(48px,7vw,92px);line-height:.88;color:#F9F5EE;margin-bottom:64px">
    BLOCKBUSTER<br><span style="color:#F5C518">CAMPAIGNS</span>
  </h2>

  <?php if(empty($posts)):?>
  <div style="text-align:center;padding:80px 0;color:rgba(249,245,238,.25)">
    <div style="font-family:'Bebas Neue',sans-serif;font-size:32px;margin-bottom:8px">No campaigns yet</div>
    <p style="font-size:14px">Add your first campaign from the admin panel</p>
  </div>
  <?php else:?>
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1px;background:rgba(255,255,255,.04)">
    <?php foreach($posts as $i=>$p):?>
    <a href="<?= base_url('post/'.$p['slug']) ?>" style="text-decoration:none" class="reveal" style="transition-delay:<?=$i*.06?>s">
      <div class="camp-card" style="border-radius:0">
        <?php if($p['image']):?>
        <img src="<?= base_url('assets/images/uploads/'.$p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>">
        <?php else:?>
        <div style="width:100%;height:220px;background:linear-gradient(135deg,#1a1a1a,#0d0d0d);display:flex;align-items:center;justify-content:center">
          <span style="font-family:'Bebas Neue',sans-serif;font-size:56px;color:rgba(245,197,24,.12)">FC</span>
        </div>
        <?php endif;?>
        <div style="padding:28px;position:relative;z-index:1">
          <h3 style="font-family:'Bebas Neue',sans-serif;font-size:26px;color:#F9F5EE;margin-bottom:8px;line-height:1.05"><?= htmlspecialchars($p['title']) ?></h3>
          <p style="font-size:13px;color:rgba(249,245,238,.4);line-height:1.6"><?= htmlspecialchars(substr($p['description'],0,90)) ?>...</p>
          <div style="margin-top:18px;font-size:11px;color:rgba(245,197,24,.5);letter-spacing:.08em;text-transform:uppercase;display:flex;gap:8px">
            <span><?= htmlspecialchars($p['author']) ?></span><span>·</span><span><?= date('M Y',strtotime($p['created_at'])) ?></span>
          </div>
        </div>
      </div>
    </a>
    <?php endforeach;?>
  </div>
  <?php endif;?>
</section>

<!-- ═══ SERVICES ═══════════════════════════════════════════ -->
<section id="services" style="padding:120px 6rem;background:#0D0D0D" class="px-8 md:px-24">
  <p class="reveal" style="color:#F5C518;font-size:11px;letter-spacing:.3em;text-transform:uppercase;margin-bottom:20px">What We Do</p>
  <h2 class="reveal d1" style="font-family:'Bebas Neue',sans-serif;font-size:clamp(48px,7vw,92px);line-height:.88;color:#F9F5EE;margin-bottom:64px">
    OUR<br><span style="color:#F5C518">SERVICES</span>
  </h2>
  <div>
    <?php foreach($svcs as $i=>$s):?>
    <div class="svc-row reveal" style="transition-delay:<?=$i*.04?>s">
      <span class="svc-num" style="font-family:'Bebas Neue',sans-serif;font-size:16px;color:rgba(245,197,24,.3);min-width:36px;margin-top:2px;transition:color .25s"><?= $s[0] ?></span>
      <div>
        <div class="svc-title" style="font-family:'Bebas Neue',sans-serif;font-size:28px;color:#F9F5EE;transition:color .25s"><?= $s[1] ?></div>
        <div style="font-size:14px;color:rgba(249,245,238,.38);margin-top:4px;line-height:1.55"><?= $s[2] ?></div>
      </div>
      <div style="margin-left:auto;font-size:18px;color:rgba(249,245,238,.08);transition:all .25s;padding-top:4px">→</div>
    </div>
    <?php endforeach;?>
  </div>
</section>

<!-- ═══ CTA BAND ════════════════════════════════════════════ -->
<section style="padding:100px 6rem;background:#F5C518;position:relative;overflow:hidden" class="px-8 md:px-24">
  <div style="position:absolute;inset:0;opacity:.03;background-image:url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'n\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'.9\' numOctaves=\'4\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23n)\'/%3E%3C/svg%3E')"></div>
  <div style="position:relative;z-index:1;max-width:1280px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:36px">
    <h2 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(48px,7vw,80px);color:#0D0D0D;line-height:.88">
      READY TO GO<br>VIRAL?
    </h2>
    <div style="display:flex;gap:14px;flex-wrap:wrap">
      <a href="mailto:<?= htmlspecialchars($settings['site_email']??'contact@filmycurry.com') ?>" style="background:#0D0D0D;color:#F9F5EE;font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:.1em;padding:16px 40px;border-radius:4px;text-decoration:none;transition:all .2s" onmouseover="this.style.background='#1a1a1a'" onmouseout="this.style.background='#0D0D0D'">EMAIL US</a>
      <a href="tel:<?= htmlspecialchars($settings['site_phone']??'') ?>" style="border:2px solid #0D0D0D;color:#0D0D0D;font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:.1em;padding:16px 40px;border-radius:4px;text-decoration:none;transition:all .2s" onmouseover="this.style.background='rgba(0,0,0,.08)'" onmouseout="this.style.background='transparent'">CALL US</a>
    </div>
  </div>
</section>
