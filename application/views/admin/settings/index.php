<div class="mb-8">
  <h1 class="text-2xl font-bold text-white">Settings</h1>
  <p class="text-white/40 text-sm mt-1">Manage website content and configuration</p>
</div>

<?php if ($flash): ?><div class="flash-msg"><?= $flash ?></div><?php endif; ?>

<?php echo form_open_multipart('admin/settings/update'); ?>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

  <!-- Site Identity -->
  <div class="card p-6 space-y-5">
    <h2 class="text-sm font-semibold uppercase tracking-wider" style="color:#F5C518;">
      <i class="fa fa-globe mr-2"></i>Site Identity
    </h2>

    <div>
      <label>Website Title</label>
      <input type="text" name="site_title" value="<?= htmlspecialchars($settings['site_title']['setting_value'] ?? '') ?>">
    </div>

    <div>
      <label>Website Logo</label>
      <?php if (!empty($settings['site_logo']['setting_value'])): ?>
      <div class="mb-3">
        <img src="<?= base_url('assets/images/uploads/'.$settings['site_logo']['setting_value']) ?>"
             alt="Logo" style="max-height:60px;background:#111;padding:8px;border-radius:8px;">
        <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:4px;">Upload to replace</p>
      </div>
      <?php endif; ?>
      <input type="file" name="site_logo" accept="image/*" style="padding:8px;cursor:pointer;">
    </div>
  </div>

  <!-- Contact Info -->
  <div class="card p-6 space-y-5">
    <h2 class="text-sm font-semibold uppercase tracking-wider" style="color:#F5C518;">
      <i class="fa fa-address-card mr-2"></i>Contact Information
    </h2>

    <div>
      <label>Email Address</label>
      <input type="email" name="site_email" value="<?= htmlspecialchars($settings['site_email']['setting_value'] ?? '') ?>">
    </div>

    <div>
      <label>Phone Number</label>
      <input type="text" name="site_phone" value="<?= htmlspecialchars($settings['site_phone']['setting_value'] ?? '') ?>">
    </div>

    <div>
      <label>Address</label>
      <textarea name="site_address" rows="3"><?= htmlspecialchars($settings['site_address']['setting_value'] ?? '') ?></textarea>
    </div>
  </div>

  <!-- Hero Section -->
  <div class="card p-6 space-y-5">
    <h2 class="text-sm font-semibold uppercase tracking-wider" style="color:#F5C518;">
      <i class="fa fa-star mr-2"></i>Hero Section
    </h2>

    <div>
      <label>Hero Heading</label>
      <input type="text" name="hero_heading" value="<?= htmlspecialchars($settings['hero_heading']['setting_value'] ?? '') ?>">
    </div>

    <div>
      <label>Hero Subtext</label>
      <textarea name="hero_subtext" rows="3"><?= htmlspecialchars($settings['hero_subtext']['setting_value'] ?? '') ?></textarea>
    </div>

    <div>
      <label>About Text</label>
      <textarea name="about_text" rows="4"><?= htmlspecialchars($settings['about_text']['setting_value'] ?? '') ?></textarea>
    </div>
  </div>

  <!-- Stats -->
  <div class="card p-6 space-y-5">
    <h2 class="text-sm font-semibold uppercase tracking-wider" style="color:#F5C518;">
      <i class="fa fa-chart-bar mr-2"></i>Homepage Stats
    </h2>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label>Campaigns Stat</label>
        <input type="text" name="stat_campaigns" value="<?= htmlspecialchars($settings['stat_campaigns']['setting_value'] ?? '300+') ?>">
      </div>
      <div>
        <label>Reach Stat</label>
        <input type="text" name="stat_reach" value="<?= htmlspecialchars($settings['stat_reach']['setting_value'] ?? '12M+') ?>">
      </div>
      <div>
        <label>Movies Stat</label>
        <input type="text" name="stat_movies" value="<?= htmlspecialchars($settings['stat_movies']['setting_value'] ?? '150+') ?>">
      </div>
      <div>
        <label>Screenings Stat</label>
        <input type="text" name="stat_screenings" value="<?= htmlspecialchars($settings['stat_screenings']['setting_value'] ?? '70+') ?>">
      </div>
    </div>
  </div>

</div>

<div class="mt-6 flex justify-end">
  <button type="submit" class="btn-primary px-10 py-3 text-base">
    <i class="fa fa-save mr-2"></i>Save All Settings
  </button>
</div>

<?php echo form_close(); ?>
