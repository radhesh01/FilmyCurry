<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>FilmyCurry — Admin Login</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#0D0D0D;font-family:'Inter',system-ui,sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden}

/* Animated grid background */
.bg-grid{position:fixed;inset:0;pointer-events:none;z-index:0;
  background-image:linear-gradient(rgba(245,197,24,.04) 1px,transparent 1px),linear-gradient(90deg,rgba(245,197,24,.04) 1px,transparent 1px);
  background-size:60px 60px}
.glow{position:fixed;top:30%;left:50%;transform:translate(-50%,-50%);width:600px;height:600px;background:radial-gradient(circle,rgba(245,197,24,.06) 0%,transparent 70%);pointer-events:none;z-index:0}

/* Form */
.card{background:#111;border:1px solid rgba(255,255,255,.07);border-radius:16px;padding:40px;width:100%;max-width:400px;position:relative;z-index:1}
.fc-input{width:100%;background:#0D0D0D;border:1px solid rgba(255,255,255,.1);color:#F9F5EE;border-radius:8px;padding:12px 16px;font-size:14px;outline:none;transition:border-color .2s}
.fc-input:focus{border-color:#F5C518}
.fc-input::placeholder{color:rgba(249,245,238,.2)}
label{display:block;font-size:11px;color:rgba(249,245,238,.4);text-transform:uppercase;letter-spacing:.1em;margin-bottom:8px}
.btn-login{width:100%;background:#F5C518;color:#0D0D0D;font-weight:700;font-size:14px;letter-spacing:.08em;padding:14px;border:none;border-radius:8px;cursor:pointer;transition:all .2s}
.btn-login:hover{filter:brightness(1.08);transform:translateY(-1px)}
.error-box{background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.25);color:#fca5a5;border-radius:8px;padding:12px 14px;font-size:13px;margin-bottom:20px}
</style>
</head>
<body>

<div class="bg-grid"></div>
<div class="glow"></div>

<div class="card">
  <!-- Logo -->
  <div style="text-align:center;margin-bottom:32px">
    <div style="font-family:'Bebas Neue',Impact,sans-serif;font-size:36px;color:#F9F5EE;letter-spacing:.1em">
      FILMY<span style="color:#F5C518">CURRY</span>
    </div>
    <div style="font-size:11px;color:rgba(249,245,238,.25);letter-spacing:.2em;text-transform:uppercase;margin-top:4px">Admin Panel</div>
  </div>

  <?php if(!empty($error)):?>
  <div class="error-box"><?= htmlspecialchars($error) ?></div>
  <?php endif;?>

  <form method="post" action="<?= base_url('admin/login') ?>">
    <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>

    <div style="margin-bottom:20px">
      <label>Username</label>
      <input type="text" name="username" class="fc-input" placeholder="admin" value="<?= set_value('username') ?>" autocomplete="username">
    </div>

    <div style="margin-bottom:28px">
      <label>Password</label>
      <input type="password" name="password" class="fc-input" placeholder="••••••••" autocomplete="current-password">
    </div>

    <button type="submit" class="btn-login">SIGN IN →</button>
  </form>

  <p style="text-align:center;font-size:11px;color:rgba(249,245,238,.15);margin-top:24px">FilmyCurry CMS © <?= date('Y') ?></p>
</div>

</body>
</html>
