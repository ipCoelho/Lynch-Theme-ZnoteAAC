<?php require_once 'engine/init.php'; include 'layout/overall/header.php'; ?>
<article>
<div class='page'>
<div class='news'>
<div class='contentn' style='width: auto;'>
<h1><strong>Downloads</strong></h1>
<a href="your/local/path/download/direct/link" class="default">Download Client</a><br>
<p> <strong>How to edit the button below ?</strong>
	<p> Enter on <strong>download.php</strong> file, found the <code>a href=""</code> style, then just add your local link, if you dont know please visit forum how to create a direct download link from your computer / host, <a href="https://lepiigortv.com/forum/index.php?threads/descarga-directa-del-cliente-desde-la-web.46/">here</a>, just translate page on your language.<br>
		<p> Then just remove this lines from your php folder about this text.<br></br>
<p>In order to play, you need an compatible IP changer and a Tibia client.</p>

<p>Download IP changer <a href="https://github.com/jo3bingham/tibia-ip-changer/releases/latest">HERE</a>.</p>
<p>Download Tibia client <?php echo ($config['client'] / 100); ?> for windows <a href="<?php echo $config['client_download']; ?>">HERE</a>.</p>
<p>Download Tibia client <?php echo ($config['client'] / 100); ?> for linux <a href="<?php echo $config['client_download_linux']; ?>">HERE</a>.</p>

<h2>How to connect and play:</h2>
<ol>
	<li>
		<a href="<?php echo $config['client_download']; ?>">Download</a> and install the tibia client if you havent already.
	</li>
	<li>
		<a href="https://github.com/jo3bingham/tibia-ip-changer/releases/latest">Download</a> and run the IP changer.
	</li>
	<li>
		In the IP changer, change Client Path to the tibia.exe file where you installed the client.</strong>
	</li>
	<li>
		In the IP changer, write this in the IP field: <?php echo $_SERVER['SERVER_NAME']; ?>
	</li>
	<li>
		Now you can successfully login on the tibia client and play clicking on <strong>Apply</strong>.<br>
		If you do not have an account to login with, you need to register an account <a href="register.php">HERE</a>.
	</li>
</ol>
</div></div></div></article>
<?php
include 'layout/overall/footer.php'; ?>
