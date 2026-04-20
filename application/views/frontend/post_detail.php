<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="pt-36 pb-20 px-8 md:px-20 bg-fc-black">
    <div class="max-w-4xl mx-auto">
        <a href="<?= base_url('work') ?>" class="inline-flex items-center gap-2 text-fc-cream/40 hover:text-fc-yellow transition-colors text-sm mb-10">
            ← Back to All Work
        </a>

        <p class="text-fc-yellow text-xs tracking-[0.3em] uppercase mb-4" data-aos="fade-up">
            <?= htmlspecialchars($post['author']) ?>
        </p>
        <h1 class="font-display text-5xl md:text-7xl text-fc-cream leading-[.9] mb-6" data-aos="fade-up" data-aos-delay="100">
            <?= htmlspecialchars($post['title']) ?>
        </h1>
        <p class="text-fc-cream/50 text-lg mb-8" data-aos="fade-up" data-aos-delay="150">
            <?= htmlspecialchars($post['description']) ?>
        </p>

        <div class="flex items-center gap-6 text-fc-cream/30 text-sm mb-12 border-y border-white/5 py-4" data-aos="fade-up" data-aos-delay="200">
            <span>📅 <?= date('M j, Y', strtotime($post['created_at'])) ?></span>
            <span>✍️ <?= htmlspecialchars($post['author']) ?></span>
            <?php if ($post['external_link']): ?>
            <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener"
               class="text-fc-yellow hover:underline">🔗 View Campaign</a>
            <?php endif; ?>
        </div>

        <?php if ($post['image']): ?>
        <div class="mb-12 rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="250">
            <img src="<?= base_url('assets/uploads/posts/' . $post['image']) ?>"
                 alt="<?= htmlspecialchars($post['title']) ?>"
                 class="w-full object-cover max-h-96">
        </div>
        <?php endif; ?>

        <div class="prose-content text-fc-cream/70 leading-relaxed text-base" data-aos="fade-up" data-aos-delay="300"
             style="line-height:1.9">
            <?= $post['content'] /* HTML content — already sanitized on save */ ?>
        </div>

        <div class="mt-16 pt-8 border-t border-white/10 flex flex-col md:flex-row items-center justify-between gap-6">
            <a href="<?= base_url('work') ?>" class="text-fc-cream/40 hover:text-fc-yellow transition-colors text-sm">← Back to All Work</a>
            <a href="<?= base_url('contact') ?>" class="btn-primary text-lg">Start a Similar Campaign</a>
        </div>
    </div>
</section>

<style>
.prose-content h1,.prose-content h2,.prose-content h3 { font-family:'Bebas Neue',Impact,sans-serif; color:#F9F5EE; margin:2rem 0 1rem; line-height:1; }
.prose-content h1{font-size:3rem} .prose-content h2{font-size:2.2rem} .prose-content h3{font-size:1.6rem}
.prose-content p { margin-bottom:1.2rem; }
.prose-content ul,.prose-content ol { padding-left:1.5rem; margin-bottom:1.2rem; }
.prose-content li { margin-bottom:.4rem; }
.prose-content a { color:#F5C518; text-decoration:underline; }
.prose-content strong { color:#F9F5EE; font-weight:600; }
.prose-content img { border-radius:8px; max-width:100%; margin:1.5rem 0; }
</style>
