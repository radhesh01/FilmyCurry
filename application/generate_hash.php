<?php
// Run this file ONCE in browser to generate password hash
// Then DELETE it immediately
// Usage: http://yoursite.com/filmycurry/generate_hash.php?pass=YourNewPassword
if (isset($_GET['pass'])) {
    echo '<pre>Hash: ' . password_hash($_GET['pass'], PASSWORD_DEFAULT) . '</pre>';
    echo '<p style="color:red">DELETE THIS FILE NOW!</p>';
} else {
    echo 'Add ?pass=YourPassword to the URL';
}
