<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="pt-36 pb-32 px-8 md:px-20 bg-fc-black">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20">
        <!-- Left -->
        <div>
            <p class="text-fc-yellow text-xs tracking-[0.3em] uppercase mb-4" data-aos="fade-up">Get In Touch</p>
            <h1 class="font-display text-7xl md:text-9xl text-fc-cream leading-[.88] mb-8" data-aos="fade-up" data-aos-delay="100">
                LET'S<br><span class="text-fc-yellow">TALK</span>
            </h1>
            <p class="text-fc-cream/50 text-lg mb-12 max-w-sm" data-aos="fade-up" data-aos-delay="200">
                Have a project in mind? Tell us about your brand and campaign goals — we'll make it go viral.
            </p>
            <div class="space-y-6" data-aos="fade-up" data-aos-delay="250">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 border border-fc-yellow/30 rounded flex items-center justify-center text-fc-yellow text-sm">📞</div>
                    <div>
                        <div class="text-fc-cream/30 text-xs uppercase tracking-widest mb-1">Phone</div>
                        <div class="text-fc-cream"><?= htmlspecialchars($settings['site_phone'] ?? '+91 9990802115') ?></div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 border border-fc-yellow/30 rounded flex items-center justify-center text-fc-yellow text-sm">✉️</div>
                    <div>
                        <div class="text-fc-cream/30 text-xs uppercase tracking-widest mb-1">Email</div>
                        <div class="text-fc-cream"><?= htmlspecialchars($settings['site_email'] ?? 'contact@filmycurry.com') ?></div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 border border-fc-yellow/30 rounded flex items-center justify-center text-fc-yellow text-sm">📍</div>
                    <div>
                        <div class="text-fc-cream/30 text-xs uppercase tracking-widest mb-1">Location</div>
                        <div class="text-fc-cream"><?= htmlspecialchars($settings['site_address'] ?? 'India') ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Form -->
        <div data-aos="fade-up" data-aos-delay="150">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="bg-green-900/30 border border-green-500/30 text-green-400 px-4 py-3 rounded mb-6 text-sm">
                ✓ <?= $this->session->flashdata('success') ?>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
            <div class="bg-red-900/30 border border-red-500/30 text-red-400 px-4 py-3 rounded mb-6 text-sm">
                <?= $this->session->flashdata('error') ?>
            </div>
            <?php endif; ?>

            <?= form_open('contact/send', ['class' => 'space-y-6']) ?>
                <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-fc-cream/40 text-xs tracking-widest uppercase block mb-2">Your Name *</label>
                        <input type="text" name="name" required placeholder="Raj Malhotra"
                               class="w-full bg-fc-dark border border-white/10 text-fc-cream px-4 py-3 rounded focus:border-fc-yellow focus:outline-none transition-colors placeholder-fc-cream/20 text-sm">
                    </div>
                    <div>
                        <label class="text-fc-cream/40 text-xs tracking-widest uppercase block mb-2">Email *</label>
                        <input type="email" name="email" required placeholder="raj@brand.com"
                               class="w-full bg-fc-dark border border-white/10 text-fc-cream px-4 py-3 rounded focus:border-fc-yellow focus:outline-none transition-colors placeholder-fc-cream/20 text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-fc-cream/40 text-xs tracking-widest uppercase block mb-2">Phone</label>
                        <input type="tel" name="phone" placeholder="+91 9999999999"
                               class="w-full bg-fc-dark border border-white/10 text-fc-cream px-4 py-3 rounded focus:border-fc-yellow focus:outline-none transition-colors placeholder-fc-cream/20 text-sm">
                    </div>
                    <div>
                        <label class="text-fc-cream/40 text-xs tracking-widest uppercase block mb-2">Campaign Budget</label>
                        <select name="budget" class="w-full bg-fc-dark border border-white/10 text-fc-cream/60 px-4 py-3 rounded focus:border-fc-yellow focus:outline-none transition-colors text-sm">
                            <option value="">Select range</option>
                            <option>Under ₹1 Lakh</option>
                            <option>₹1L – ₹5L</option>
                            <option>₹5L – ₹20L</option>
                            <option>₹20L+</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="text-fc-cream/40 text-xs tracking-widest uppercase block mb-2">Message *</label>
                    <textarea name="message" required rows="5" placeholder="Tell us about your project..."
                              class="w-full bg-fc-dark border border-white/10 text-fc-cream px-4 py-3 rounded focus:border-fc-yellow focus:outline-none transition-colors placeholder-fc-cream/20 text-sm resize-none"></textarea>
                </div>

                <button type="submit" class="btn-primary text-xl w-full text-center">SEND MESSAGE →</button>
            <?= form_close() ?>
        </div>
    </div>
</section>
