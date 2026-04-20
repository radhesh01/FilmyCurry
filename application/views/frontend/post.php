<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Post Hero -->
<section style="padding-top:100px;min-height:100vh;background:#0D0D0D">

  <?php if($post['image']):?>
  <div style="width:100%;height:60vh;overflow:hidden;position:relative">
    <img src="<?= base_url('assets/images/uploads/'.$post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" style="width:100%;height:100%;object-fit:cover;filter:brightness(.55)">
    <div style="position:absolute;inset:0;background:linear-gradient(to top,#0D0D0D 0%,transparent 55%)"></div>
  </div>
  <?php endif;?>

  <div style="max-width:820px;margin:0 auto;padding:56px 40px 100px" class="px-6 md:px-10">

    <!-- Breadcrumb -->
    <a href="<?= base_url() ?>" style="display:inline-flex;align-items:center;gap:6px;font-size:12px;color:rgba(249,245,238,.35);text-decoration:none;transition:color .2s;margin-bottom:32px" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='rgba(249,245,238,.35)'">← Back to Home</a>

    <!-- Author badge + date -->
    <div style="display:flex;gap:14px;align-items:center;flex-wrap:wrap;margin-bottom:24px">
      <span style="background:rgba(245,197,24,.1);color:#F5C518;border:1px solid rgba(245,197,24,.25);padding:4px 14px;border-radius:20px;font-size:12px;letter-spacing:.07em">
        <?= htmlspecialchars($post['author']) ?>
      </span>
      <span style="font-size:12px;color:rgba(249,245,238,.28)"><?= date('d F Y',strtotime($post['created_at'])) ?></span>
    </div>

    <!-- Title -->
    <h1 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(40px,7vw,80px);line-height:.92;color:#F9F5EE;margin-bottom:24px">
      <?= htmlspecialchars($post['title']) ?>
    </h1>

    <!-- Description -->
    <p style="font-size:19px;color:rgba(249,245,238,.5);line-height:1.75;margin-bottom:52px;border-left:3px solid #F5C518;padding-left:22px">
      <?= htmlspecialchars($post['description']) ?>
    </p>

    <!-- Full content -->
    <div class="post-body" style="font-size:16px;color:rgba(249,245,238,.72);line-height:1.95">
      <?= $post['content'] ?>
    </div>

    <!-- External link -->
    <?php if($post['external_link']):?>
    <div style="margin-top:48px;padding:24px;background:#111;border:1px solid rgba(255,255,255,.06);border-radius:10px">
      <p style="font-size:10px;color:rgba(249,245,238,.28);letter-spacing:.15em;text-transform:uppercase;margin-bottom:8px">External Link</p>
      <a href="<?= htmlspecialchars($post['external_link']) ?>" target="_blank" rel="noopener" style="color:#F5C518;font-size:15px;word-break:break-all;text-decoration:none">
        <?= htmlspecialchars($post['external_link']) ?> ↗
      </a>
    </div>
    <?php endif;?>

    <!-- Back CTA -->
    <div style="margin-top:64px;padding-top:40px;border-top:1px solid rgba(255,255,255,.07)">
      <a href="<?= base_url() ?>" style="display:inline-flex;align-items:center;gap:8px;background:#F5C518;color:#0D0D0D;font-family:'Bebas Neue',sans-serif;font-size:18px;letter-spacing:.1em;padding:12px 28px;border-radius:4px;text-decoration:none;transition:all .2s" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform=''">
        ← BACK TO HOME
      </a>
    </div>
  </div>
</section>

<style>
.post-body h2,.post-body h3{font-family:'Bebas Neue',sans-serif;color:#F9F5EE;margin:36px 0 14px}
.post-body h2{font-size:38px}.post-body h3{font-size:28px}
.post-body p{margin-bottom:22px}
.post-body ul,.post-body ol{padding-left:24px;margin-bottom:22px}
.post-body li{margin-bottom:8px}
.post-body strong{color:#F9F5EE;font-weight:600}
.post-body a{color:#F5C518;text-decoration:underline}
.post-body blockquote{border-left:3px solid #F5C518;padding-left:22px;color:rgba(249,245,238,.45);font-style:italic;margin:28px 0}
.post-body img{border-radius:8px;max-width:100%;margin:24px 0}
</style>
