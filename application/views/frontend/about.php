<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="pt-36 pb-20 px-8 md:px-20 bg-fc-black">
    <div class="max-w-7xl mx-auto">
        <p class="text-fc-yellow text-xs tracking-[0.3em] uppercase mb-4" data-aos="fade-up">Our Story</p>
        <h1 class="font-display text-7xl md:text-9xl text-fc-cream leading-[.88] mb-8" data-aos="fade-up" data-aos-delay="100">
            WHO<br>WE <span class="text-fc-yellow">ARE</span>
        </h1>
        <div class="max-w-2xl">
            <p class="text-fc-cream/60 text-xl leading-relaxed mb-6" data-aos="fade-up" data-aos-delay="200">
                FilmyCurry specialises in crafting authentic connections between brands and influencers to amplify reach, drive engagement, and spark meaningful conversations.
            </p>
            <p class="text-fc-cream/50 text-base leading-relaxed" data-aos="fade-up" data-aos-delay="250">
                We are an influencer marketing agency driving high-impact influencer and meme campaigns for both brands and production houses across entertainment, culture, and commerce. Our ecosystem powers buzz for nearly 32% of all movie and OTT releases while enabling brands to embed themselves into cultural conversations at scale.
            </p>
        </div>
    </div>
</section>

<section class="py-20 px-8 md:px-20 bg-fc-dark">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
        <?php
        $stats = [['300+','Total Campaigns'],['32%','OTT Releases'],['12M+','People Reached'],['70+','Screenings']];
        foreach($stats as $i => $s): ?>
        <div class="text-center" data-aos="fade-up" data-aos-delay="<?= $i*80 ?>">
            <div class="font-display text-6xl text-fc-yellow"><?= $s[0] ?></div>
            <div class="text-fc-cream/40 text-xs tracking-widest uppercase mt-2"><?= $s[1] ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="py-32 px-8 md:px-20 bg-fc-black">
    <div class="max-w-7xl mx-auto">
        <p class="text-fc-yellow text-xs tracking-[0.3em] uppercase mb-4" data-aos="fade-up">Our Edge</p>
        <h2 class="font-display text-6xl md:text-7xl text-fc-cream leading-[.9] mb-16" data-aos="fade-up" data-aos-delay="100">
            WHY <span class="text-fc-yellow">FILMYCURRY?</span>
        </h2>
        <?php
        $reasons = [
            ['Low-Margin, High-Volume','We operate on a cost-efficient model delivering maximum scale without inflating your budget.'],
            ['Cultural Intelligence','Our team lives and breathes pop culture — we know what will trend before it does.'],
            ['End-to-End Execution','From strategy to delivery, we handle everything so you can focus on your release.'],
            ['Authenticity First','Every campaign is crafted to feel genuine — audiences can smell a forced promotion from miles away.'],
        ];
        foreach($reasons as $i => $r): ?>
        <div class="border-t border-white/10 py-8 flex flex-col md:flex-row gap-4 md:gap-16 group hover:bg-white/[0.02] px-4 transition-colors"
             data-aos="fade-up" data-aos-delay="<?= $i*60 ?>">
            <span class="text-fc-yellow/30 font-display text-xl w-8 flex-shrink-0 group-hover:text-fc-yellow transition-colors">0<?= $i+1 ?></span>
            <div>
                <h3 class="font-display text-2xl text-fc-cream mb-2 group-hover:text-fc-yellow transition-colors"><?= $r[0] ?></h3>
                <p class="text-fc-cream/40 text-sm max-w-xl"><?= $r[1] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="py-24 px-8 md:px-20 text-center" style="background:radial-gradient(ellipse 70% 70% at 50% 50%, rgba(245,197,24,.07) 0%, #0D0D0D 70%);">
    <h2 class="font-display text-6xl md:text-8xl text-fc-cream mb-6" data-aos="fade-up">
        READY TO <span class="text-fc-yellow">COLLABORATE?</span>
    </h2>
    <a href="<?= base_url('contact') ?>" class="btn-primary text-2xl" data-aos="fade-up" data-aos-delay="150">LET'S TALK</a>
</section>
