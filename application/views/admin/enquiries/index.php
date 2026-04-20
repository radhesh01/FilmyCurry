<!-- FILE: application/views/admin/enquiries/index.php -->
<div class="flex items-center justify-between mb-8">
  <div>
    <h1 class="text-2xl font-bold text-white">Enquiries</h1>
    <p class="text-white/40 text-sm mt-1">Contact form submissions from the website</p>
  </div>
  <?php if($unread > 0): ?>
  <span style="background:rgba(245,197,24,.15);color:#F5C518;border:1px solid rgba(245,197,24,.3);padding:6px 14px;border-radius:20px;font-size:13px;font-weight:600">
    <?= $unread ?> unread
  </span>
  <?php endif; ?>
</div>

<?php if ($flash): ?><div class="flash-msg"><?= $flash ?></div><?php endif; ?>

<div class="card">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead>
        <tr class="border-b border-white/5 text-white/30 uppercase text-xs">
          <th class="text-left p-4">Name</th>
          <th class="text-left p-4">Email</th>
          <th class="text-left p-4">Phone</th>
          <th class="text-left p-4">Service</th>
          <th class="text-left p-4">Budget</th>
          <th class="text-left p-4">Status</th>
          <th class="text-left p-4">Date</th>
          <th class="text-left p-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($enquiries)): ?>
        <tr>
          <td colspan="8" class="p-10 text-center text-white/30">No enquiries yet.</td>
        </tr>
        <?php else: ?>
        <?php foreach ($enquiries as $e): ?>
        <tr class="border-b border-white/5 hover:bg-white/2 transition-colors <?= !$e['is_read'] ? 'bg-yellow-500/3' : '' ?>">
          <td class="p-4">
            <div class="text-white font-medium flex items-center gap-2">
              <?php if(!$e['is_read']): ?>
              <span style="width:6px;height:6px;background:#F5C518;border-radius:50%;flex-shrink:0;display:inline-block"></span>
              <?php endif; ?>
              <?= htmlspecialchars($e['name']) ?>
            </div>
            <?php if($e['company']): ?>
            <div class="text-white/30 text-xs mt-1"><?= htmlspecialchars($e['company']) ?></div>
            <?php endif; ?>
          </td>
          <td class="p-4 text-white/60"><a href="mailto:<?= htmlspecialchars($e['email']) ?>" style="color:inherit;text-decoration:none" onmouseover="this.style.color='#F5C518'" onmouseout="this.style.color='inherit'"><?= htmlspecialchars($e['email']) ?></a></td>
          <td class="p-4 text-white/50"><?= htmlspecialchars($e['phone'] ?: '—') ?></td>
          <td class="p-4 text-white/50"><?= htmlspecialchars($e['service'] ?: '—') ?></td>
          <td class="p-4 text-white/50"><?= htmlspecialchars($e['budget'] ?: '—') ?></td>
          <td class="p-4">
            <?php if(!$e['is_read']): ?>
            <span class="badge-active">New</span>
            <?php else: ?>
            <span class="badge-inactive">Read</span>
            <?php endif; ?>
          </td>
          <td class="p-4 text-white/40 text-xs"><?= date('d M Y', strtotime($e['created_at'])) ?></td>
          <td class="p-4">
            <div class="flex gap-2 flex-wrap">
              <a href="<?= base_url('admin/enquiries/view/'.$e['id']) ?>" class="btn-secondary">View</a>
              <a href="<?= base_url('admin/enquiries/delete/'.$e['id']) ?>" class="btn-danger" onclick="return confirm('Delete this enquiry?')">Delete</a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
