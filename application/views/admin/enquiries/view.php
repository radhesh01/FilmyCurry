<!-- FILE: application/views/admin/enquiries/view.php -->
<div class="flex items-center gap-4 mb-8">
  <a href="<?= base_url('admin/enquiries') ?>" class="text-white/40 hover:text-white transition-colors">
    <i class="fa fa-arrow-left"></i>
  </a>
  <div>
    <h1 class="text-2xl font-bold text-white">Enquiry from <?= htmlspecialchars($enquiry['name']) ?></h1>
    <p class="text-white/40 text-sm mt-1"><?= date('d F Y, h:i A', strtotime($enquiry['created_at'])) ?></p>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

  <!-- Main info -->
  <div class="lg:col-span-2 card p-6 space-y-5">
    <div>
      <label>Message</label>
      <div style="background:#0D0D0D;border:1px solid rgba(255,255,255,.08);border-radius:8px;padding:16px;font-size:14px;line-height:1.8;color:rgba(249,245,238,.7);white-space:pre-wrap"><?= htmlspecialchars($enquiry['message']) ?></div>
    </div>

    <?php if($enquiry['attachment']): ?>
    <div>
      <label>Attachment</label>
      <a href="<?= base_url('assets/images/uploads/enquiries/'.$enquiry['attachment']) ?>" target="_blank" style="display:inline-flex;align-items:center;gap:8px;background:rgba(245,197,24,.1);color:#F5C518;border:1px solid rgba(245,197,24,.2);padding:10px 16px;border-radius:6px;font-size:13px;text-decoration:none;transition:all .2s" onmouseover="this.style.background='rgba(245,197,24,.15)'" onmouseout="this.style.background='rgba(245,197,24,.1)'">
        <i class="fa fa-download"></i> Download Attachment
      </a>
    </div>
    <?php endif; ?>

    <div class="flex gap-3 pt-2">
      <a href="mailto:<?= htmlspecialchars($enquiry['email']) ?>" class="btn-primary" style="text-decoration:none">
        <i class="fa fa-envelope mr-2"></i>Reply via Email
      </a>
      <?php if($enquiry['phone']): ?>
      <a href="tel:<?= htmlspecialchars($enquiry['phone']) ?>" class="btn-secondary" style="text-decoration:none">
        <i class="fa fa-phone mr-2"></i>Call
      </a>
      <?php endif; ?>
      <a href="<?= base_url('admin/enquiries/delete/'.$enquiry['id']) ?>" class="btn-danger" onclick="return confirm('Delete this enquiry?')">
        <i class="fa fa-trash mr-1"></i>Delete
      </a>
    </div>
  </div>

  <!-- Sidebar -->
  <div class="space-y-5">
    <div class="card p-6 space-y-4">
      <h3 class="text-sm font-semibold uppercase tracking-wider" style="color:#F5C518">Contact Details</h3>
      <?php
      $fields = [
        'Name'    => $enquiry['name'],
        'Email'   => $enquiry['email'],
        'Phone'   => $enquiry['phone'] ?: '—',
        'Company' => $enquiry['company'] ?: '—',
      ];
      foreach($fields as $k=>$v): ?>
      <div>
        <label><?= $k ?></label>
        <div style="font-size:14px;color:rgba(249,245,238,.7)"><?= htmlspecialchars($v) ?></div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="card p-6 space-y-4">
      <h3 class="text-sm font-semibold uppercase tracking-wider" style="color:#F5C518">Campaign Info</h3>
      <?php
      $fields2 = [
        'Service'  => $enquiry['service'] ?: '—',
        'Budget'   => $enquiry['budget'] ?: '—',
        'Received' => date('d M Y', strtotime($enquiry['created_at'])),
      ];
      foreach($fields2 as $k=>$v): ?>
      <div>
        <label><?= $k ?></label>
        <div style="font-size:14px;color:rgba(249,245,238,.7)"><?= htmlspecialchars($v) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
