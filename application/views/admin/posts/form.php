<div class="flex items-center gap-4 mb-8">
  <a href="<?= base_url('admin/posts') ?>" class="text-white/40 hover:text-white transition-colors">
    <i class="fa fa-arrow-left"></i>
  </a>
  <div>
    <h1 class="text-2xl font-bold text-white">
      <?= ($action === 'create') ? 'Create New Post' : 'Edit Post' ?>
    </h1>
    <p class="text-white/40 text-sm mt-1">
      <?= ($action === 'create') ? 'Add a new campaign or blog post' : 'Update post details' ?>
    </p>
  </div>
</div>

<?php
$form_action = ($action === 'create') ? base_url('admin/posts/store') : base_url('admin/posts/update/'.$post['id']);
echo form_open_multipart($form_action, ['class' => 'grid grid-cols-1 lg:grid-cols-3 gap-6']);
?>

  <!-- Left: Main content -->
  <div class="lg:col-span-2 space-y-5">

    <div class="card p-6 space-y-5">
      <div>
        <label>Post Title *</label>
        <input type="text" name="title" placeholder="e.g. Tiger 3 Meme Campaign"
               value="<?= set_value('title', $post['title'] ?? '') ?>">
        <?= form_error('title', '<p style="color:#f87171;font-size:12px;margin-top:4px;">', '</p>') ?>
      </div>

      <div>
        <label>Short Description *</label>
        <textarea name="description" rows="3"
                  placeholder="Brief summary shown on the homepage card..."><?= set_value('description', $post['description'] ?? '') ?></textarea>
        <?= form_error('description', '<p style="color:#f87171;font-size:12px;margin-top:4px;">', '</p>') ?>
      </div>

      <div>
        <label>Full Content *</label>
        <textarea name="content" id="content" rows="12"
                  placeholder="Full HTML content for the post detail page..."
                  style="font-family:monospace;font-size:13px;"><?= set_value('content', $post['content'] ?? '') ?></textarea>
        <?= form_error('content', '<p style="color:#f87171;font-size:12px;margin-top:4px;">', '</p>') ?>
        <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:4px;">You can use HTML tags: &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;strong&gt;, etc.</p>
      </div>
    </div>

  </div>

  <!-- Right: Meta -->
  <div class="space-y-5">

    <!-- Publish box -->
    <div class="card p-6 space-y-4">
      <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Publish</h3>

      <div>
        <label>Status</label>
        <select name="status">
          <option value="1" <?= (isset($post) && $post['status'] == 1) ? 'selected' : ((!isset($post)) ? 'selected' : '') ?>>Active (Visible)</option>
          <option value="0" <?= (isset($post) && $post['status'] == 0) ? 'selected' : '' ?>>Hidden</option>
        </select>
      </div>

      <div>
        <label>Author *</label>
        <input type="text" name="author" placeholder="FilmyCurry Team"
               value="<?= set_value('author', $post['author'] ?? 'FilmyCurry Team') ?>">
        <?= form_error('author', '<p style="color:#f87171;font-size:12px;margin-top:4px;">', '</p>') ?>
      </div>

      <div>
        <label>External Link (Optional)</label>
        <input type="url" name="external_link" placeholder="https://..."
               value="<?= set_value('external_link', $post['external_link'] ?? '') ?>">
      </div>

      <button type="submit" class="btn-primary w-full text-center">
        <?= ($action === 'create') ? 'Publish Post' : 'Update Post' ?>
      </button>
    </div>

    <!-- Image upload -->
    <div class="card p-6 space-y-4">
      <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Cover Image</h3>

      <?php if (!empty($post['image'])): ?>
      <div>
        <img src="<?= base_url('assets/images/uploads/'.$post['image']) ?>"
             alt="Current" class="w-full rounded-lg object-cover" style="max-height:180px;">
        <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:6px;">Upload a new image to replace</p>
      </div>
      <?php endif; ?>

      <div>
        <label>Upload Image</label>
        <input type="file" name="image" accept="image/*" id="imageInput"
               style="padding:8px;cursor:pointer;">
        <p style="font-size:11px;color:rgba(249,245,238,0.3);margin-top:4px;">JPG, PNG, WebP — max 5MB</p>
      </div>

      <!-- Image preview -->
      <div id="imagePreview" style="display:none;">
        <img id="previewImg" src="" alt="Preview" class="w-full rounded-lg object-cover" style="max-height:180px;">
      </div>
    </div>

  </div>

<?php echo form_close(); ?>

<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('previewImg').src = e.target.result;
      document.getElementById('imagePreview').style.display = 'block';
    };
    reader.readAsDataURL(file);
  }
});
</script>
