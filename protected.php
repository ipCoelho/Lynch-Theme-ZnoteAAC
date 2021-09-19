<?php
require_once 'engine/init.php';
// To direct users here, add: protect_page(); Here before loading header.
include 'layout/overall/header.php';
if (user_logged_in() === true) {
?>
<article>
<div class='page'>
<div class='news'>
<div class='contentn' style='width: auto;'>
<h1>STOP!</h1>
<p>Ummh... Why are you sniffing around here?</p>
</div></div></div></article>
<?php
} else {
?>
<article>
<div class='page'>
<div class='news'>
<div class='contentn' style='width: auto;'>
<h1>Sorry, you need to be logged in to do that!</h1>
<p>Please register or log in.</p>
</div></div></div></article>
<?php
}
include 'layout/overall/footer.php'; ?>
