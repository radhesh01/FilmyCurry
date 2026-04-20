<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($site_title) ? htmlspecialchars($site_title) : 'FilmyCurry' ?> — Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            fc: {
              yellow: '#F5C518',
              black: '#0D0D0D',
              gray: '#1A1A1A',
              cream: '#F9F5EE'
            }
          }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: #0D0D0D;
      color: #F9F5EE;
      font-family: 'Inter', sans-serif;
    }

    .sidebar-link {
      transition: all 0.2s;
    }

    .sidebar-link:hover,
    .sidebar-link.active {
      background: rgba(245, 197, 24, 0.1);
      color: #F5C518;
      border-left: 3px solid #F5C518;
    }

    .card {
      background: #1A1A1A;
      border: 1px solid rgba(255, 255, 255, 0.06);
      border-radius: 12px;
    }

    .btn-primary {
      background: #F5C518;
      color: #0D0D0D;
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 8px;
      transition: all 0.2s;
      border: none;
      cursor: pointer;
    }

    .btn-primary:hover {
      filter: brightness(1.1);
      transform: translateY(-1px);
    }

    .btn-danger {
      background: rgba(239, 68, 68, 0.15);
      color: #f87171;
      border: 1px solid rgba(239, 68, 68, 0.3);
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      cursor: pointer;
      transition: all 0.2s;
    }

    .btn-danger:hover {
      background: rgba(239, 68, 68, 0.3);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.06);
      color: #F9F5EE;
      border: 1px solid rgba(255, 255, 255, 0.1);
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      cursor: pointer;
      transition: all 0.2s;
    }

    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.12);
    }

    input,
    textarea,
    select {
      background: #0D0D0D !important;
      border: 1px solid rgba(255, 255, 255, 0.12) !important;
      color: #F9F5EE !important;
      border-radius: 8px;
      padding: 10px 14px;
      width: 100%;
      outline: none;
      transition: border 0.2s;
    }

    input:focus,
    textarea:focus,
    select:focus {
      border-color: #F5C518 !important;
    }

    label {
      font-size: 13px;
      color: rgba(249, 245, 238, 0.5);
      display: block;
      margin-bottom: 6px;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }

    .badge-active {
      background: rgba(34, 197, 94, 0.15);
      color: #86efac;
      border: 1px solid rgba(34, 197, 94, 0.3);
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 12px;
    }

    .badge-inactive {
      background: rgba(239, 68, 68, 0.12);
      color: #fca5a5;
      border: 1px solid rgba(239, 68, 68, 0.2);
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 12px;
    }

    .flash-msg {
      background: rgba(34, 197, 94, 0.15);
      border: 1px solid rgba(34, 197, 94, 0.3);
      color: #86efac;
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    ::-webkit-scrollbar {
      width: 3px;
    }

    ::-webkit-scrollbar-thumb {
      background: #F5C518;
    }
  </style>
</head>

<body class="flex min-h-screen">

  <!-- Sidebar -->
  <aside class="w-64 bg-[#111] border-r border-white/5 flex flex-col min-h-screen fixed left-0 top-0 z-10">
    <div class="p-6 border-b border-white/5">
      <div class="text-2xl font-black tracking-wider">
        FILMY<span style="color:#F5C518">CURRY</span>
      </div>
      <div class="text-xs text-white/30 mt-1 tracking-widest uppercase">Admin Panel</div>
    </div>

    <nav class="flex-1 p-4 space-y-1 mt-2">
      <?php $uri = uri_string(); ?>
      <a href="<?= base_url('admin/dashboard') ?>"
        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-white/60 <?= (strpos($uri, 'dashboard') !== FALSE) ? 'active' : '' ?>">
        <i class="fa fa-home w-4"></i> Dashboard
      </a>
      <a href="<?= base_url('admin/posts') ?>"
        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-white/60 <?= (strpos($uri, 'posts') !== FALSE) ? 'active' : '' ?>">
        <i class="fa fa-film w-4"></i> Posts / Campaigns
      </a>
      <a href="<?= base_url('admin/settings') ?>"
        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-white/60 <?= (strpos($uri, 'settings') !== FALSE) ? 'active' : '' ?>">
        <i class="fa fa-cog w-4"></i> Settings
      </a>
      <a href="<?= base_url('admin/enquiries') ?>"
        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-white/60 <?= (strpos($uri, 'enquiries') !== FALSE) ? 'active' : '' ?>">
        <i class="fa fa-envelope w-4"></i> Enquiries
      </a>
      <a href="<?= base_url() ?>" target="_blank"
        class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg text-sm text-white/60">
        <i class="fa fa-external-link w-4"></i> View Website
      </a>
    </nav>

    <div class="p-4 border-t border-white/5">
      <div class="flex items-center gap-3 mb-3">
        <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold text-fc-black"
          style="background:#F5C518">
          <?= strtoupper(substr($this->session->userdata('admin_username') ?? 'A', 0, 1)) ?>
        </div>
        <div>
          <div class="text-sm font-medium">
            <?= htmlspecialchars($this->session->userdata('admin_username') ?? 'Admin') ?></div>
          <div class="text-xs text-white/30">Administrator</div>
        </div>
      </div>
      <a href="<?= base_url('admin/logout') ?>"
        class="flex items-center gap-2 text-sm text-white/40 hover:text-red-400 transition-colors px-2 py-1">
        <i class="fa fa-sign-out"></i> Logout
      </a>
    </div>
  </aside>

  <!-- Main content wrapper -->
  <main class="ml-64 flex-1 min-h-screen">
    <div class="p-8">