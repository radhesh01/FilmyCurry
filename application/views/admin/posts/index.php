<div class="flex items-center justify-between mb-8">
  <div>
    <h1 class="text-2xl font-bold text-white">Posts & Campaigns</h1>
    <p class="text-white/40 text-sm mt-1">Manage all your campaigns and blog posts</p>
  </div>
  <a href="<?= base_url('admin/posts/create') ?>" class="btn-primary flex items-center gap-2">
    <i class="fa fa-plus"></i> New Post
  </a>
</div>

<?php if ($flash): ?><div class="flash-msg"><?= $flash ?></div><?php endif; ?>

<div class="card">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead>
        <tr class="border-b border-white/5 text-white/30 uppercase text-xs">
          <th class="text-left p-4">Image</th>
          <th class="text-left p-4">Title</th>
          <th class="text-left p-4">Author</th>
          <th class="text-left p-4">Status</th>
          <th class="text-left p-4">Date</th>
          <th class="text-left p-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($posts)): ?>
        <tr>
          <td colspan="6" class="p-10 text-center text-white/30">
            No posts yet. <a href="<?= base_url('admin/posts/create') ?>" style="color:#F5C518;">Create your first post →</a>
          </td>
        </tr>
        <?php else: ?>
        <?php foreach ($posts as $p): ?>
        <tr class="border-b border-white/5 hover:bg-white/2 transition-colors">
          <td class="p-4">
            <?php if ($p['image']): ?>
            <img src="<?= base_url('assets/images/uploads/'.$p['image']) ?>" alt="" class="w-12 h-12 object-cover rounded-lg">
            <?php else: ?>
            <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background:rgba(245,197,24,0.1);">
              <i class="fa fa-image" style="color:#F5C518;opacity:0.4;"></i>
            </div>
            <?php endif; ?>
          </td>
          <td class="p-4">
            <div class="text-white font-medium"><?= htmlspecialchars($p['title']) ?></div>
            <div class="text-white/30 text-xs mt-1">/post/<?= $p['slug'] ?></div>
          </td>
          <td class="p-4 text-white/50"><?= htmlspecialchars($p['author']) ?></td>
          <td class="p-4">
            <a href="<?= base_url('admin/posts/toggle/'.$p['id']) ?>" title="Click to toggle">
              <span class="<?= $p['status'] ? 'badge-active' : 'badge-inactive' ?>" style="cursor:pointer;">
                <?= $p['status'] ? 'Active' : 'Hidden' ?>
              </span>
            </a>
          </td>
          <td class="p-4 text-white/40 text-xs"><?= date('d M Y', strtotime($p['created_at'])) ?></td>
          <td class="p-4">
            <div class="flex gap-2 flex-wrap">
              <a href="<?= base_url('post/'.$p['slug']) ?>" target="_blank" class="btn-secondary" title="Preview">
                <i class="fa fa-eye"></i>
              </a>
              <a href="<?= base_url('admin/posts/edit/'.$p['id']) ?>" class="btn-secondary">Edit</a>
              <a href="<?= base_url('admin/posts/delete/'.$p['id']) ?>" class="btn-danger"
                 onclick="return confirm('Are you sure you want to delete this post? This cannot be undone.')">
                Delete
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
