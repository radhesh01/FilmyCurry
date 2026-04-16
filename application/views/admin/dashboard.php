<!-- Dashboard -->
<div class="flex items-center justify-between mb-8">
  <div>
    <h1 class="text-2xl font-bold text-white">Dashboard</h1>
    <p class="text-white/40 text-sm mt-1">Welcome back!</p>
  </div>
  <a href="<?= base_url('admin/posts/create') ?>" class="btn-primary flex items-center gap-2">
    <i class="fa fa-plus"></i> New Post
  </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
  <div class="card p-6">
    <div class="flex items-center gap-4">
      <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(245,197,24,0.12);">
        <i class="fa fa-film" style="color:#F5C518;font-size:20px;"></i>
      </div>
      <div>
        <div class="text-3xl font-bold text-white"><?= $total_posts ?></div>
        <div class="text-white/40 text-sm">Total Posts</div>
      </div>
    </div>
  </div>
  <div class="card p-6">
    <div class="flex items-center gap-4">
      <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(34,197,94,0.12);">
        <i class="fa fa-check-circle" style="color:#86efac;font-size:20px;"></i>
      </div>
      <div>
        <div class="text-3xl font-bold text-white"><?= $active_posts ?></div>
        <div class="text-white/40 text-sm">Active Posts</div>
      </div>
    </div>
  </div>
  <div class="card p-6">
    <div class="flex items-center gap-4">
      <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(239,68,68,0.12);">
        <i class="fa fa-eye-slash" style="color:#f87171;font-size:20px;"></i>
      </div>
      <div>
        <div class="text-3xl font-bold text-white"><?= $total_posts - $active_posts ?></div>
        <div class="text-white/40 text-sm">Hidden Posts</div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="flex items-center justify-between p-6 border-b border-white/5">
    <h2 class="font-semibold text-white">Recent Posts</h2>
    <a href="<?= base_url('admin/posts') ?>" style="color:#F5C518;font-size:13px;">View all →</a>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead>
        <tr class="border-b border-white/5 text-white/30 uppercase text-xs">
          <th class="text-left p-4">Title</th>
          <th class="text-left p-4">Author</th>
          <th class="text-left p-4">Status</th>
          <th class="text-left p-4">Date</th>
          <th class="text-left p-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($recent_posts)): ?>
        <tr><td colspan="5" class="p-8 text-center text-white/30">No posts yet. <a href="<?= base_url('admin/posts/create') ?>" style="color:#F5C518;">Create one →</a></td></tr>
        <?php else: foreach ($recent_posts as $p): ?>
        <tr class="border-b border-white/5 hover:bg-white/2 transition-colors">
          <td class="p-4 text-white font-medium"><?= htmlspecialchars($p['title']) ?></td>
          <td class="p-4 text-white/50"><?= htmlspecialchars($p['author']) ?></td>
          <td class="p-4"><span class="<?= $p['status'] ? 'badge-active' : 'badge-inactive' ?>"><?= $p['status'] ? 'Active' : 'Hidden' ?></span></td>
          <td class="p-4 text-white/40"><?= date('d M Y', strtotime($p['created_at'])) ?></td>
          <td class="p-4"><a href="<?= base_url('admin/posts/edit/'.$p['id']) ?>" class="btn-secondary">Edit</a></td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
