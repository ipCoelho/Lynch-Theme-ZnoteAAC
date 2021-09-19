<?php
if ($config['UseChangelogTicker']) {
	//////////////////////
	// Changelog ticker //
	// Load from cache
	$changelogCache = new Cache('engine/cache/changelog');
	$changelogs = $changelogCache->load();

	if (isset($changelogs) && !empty($changelogs) && $changelogs !== false) {
		?>
		<section>
		<article>
<div class='page'>
<div class='news'>
<div class='contentn' style='width: auto;'>
			<table id="changelogTable">
				<tr>
					<td colspan="2">Latest Changelog Updates (<a href="changelog.php">Click here to see full changelog</a>)</td>
				</tr>
				<?php
				for ($i = 0; $i < count($changelogs) && $i < 5; $i++) {
					?>
					<tr>
						<td><?php echo getClock($changelogs[$i]['time'], true, true); ?></td>
						<td><?php echo $changelogs[$i]['text']; ?></td>
					</tr>
					<?php
				}
				?>
			</table>
</div></div></div>
</article>

		
		<?php
	} else echo "<article>
<div class='page'>
<div class='news'>
<div class='contentn' style='width: auto;'>No changelogs submitted.</div></div></div></article>";
}

$cache = new Cache('engine/cache/news');
if ($cache->hasExpired()) {
	$news = fetchAllNews();
	$cache->setContent($news);
	$cache->save();
} else {
	$news = $cache->load();
}

// Design and present the list
if ($news) {

	$total_news = count($news);
	$row_news = $total_news / $config['news_per_page'];
	$page_amount = ceil($total_news / $config['news_per_page']);
	$current = $config['news_per_page'] * $page;

	function TransformToBBCode($string) {
		$tags = array(
			'[center]{$1}[/center]' => '<center>$1</center>',
			'[b]{$1}[/b]' => '<b>$1</b>',
			'[size={$1}]{$2}[/size]' => '<font size="$1">$2</font>',
			'[img]{$1}[/img]'    => '<a href="$1" target="_BLANK"><img src="$1" alt="image" style="width: 100%"></a>',
			'[link]{$1}[/link]'    => '<a href="$1">$1</a>',
			'[link={$1}]{$2}[/link]'   => '<a href="$1" target="_BLANK">$2</a>',
			'[color={$1}]{$2}[/color]' => '<font color="$1">$2</font>',
			'[*]{$1}[/*]' => '<li>$1</li>',
			'[youtube]{$1}[/youtube]' => '<div class="youtube"><div class="aspectratio"><iframe src="//www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe></div></div>',
		);
		foreach ($tags as $tag => $value) {
			$code = preg_replace('/placeholder([0-9]+)/', '(.*?)', preg_quote(preg_replace('/\{\$([0-9]+)\}/', 'placeholder$1', $tag), '/'));
			$string = preg_replace('/'.$code.'/i', $value, $string);
		}
		return $string;
	}

	if ($view !== "") { // We want to view a specific news post
		$si = false;
		if (ctype_digit($view) === false) {
			for ($i = 0; $i < count($news); $i++) if ($view === urlencode($news[$i]['title'])) $si = $i;
		} else {
			for ($i = 0; $i < count($news); $i++) if ((int)$view === (int)$news[$i]['id']) $si = $i;
		}

		if ($si !== false) {
			echo "hello world!";
			?>
			<aside>
<div class='box'>
<div class='title'>
  
<div class='bg'></div>
<div class='txt'>User Control Panel</div>
</div>
<div class='loginarea'>
<img src='imgs/nm/loader.gif' style='width:0;height:0;display:none;' />
<form id='login_form' action='http://rzwow.ru/modules/login_m.php' method='POST'>
<div class='fieldsBox'>
<label>
<input type='text' name='ucp_login' class='inpt' placeholder='Login' title='Username' autocomplete='off' />
<div class='acc_icon user'></div>
</label>
<label>
<input type='password' name='ucp_passw' class='inpt pass' placeholder='Password' title='Password' autocomplete='off' />
<div class='acc_icon pass'></div>
</label>
<input type='button' onclick="if (!window.__cfRLUnblockHandlers) return false; opencaptcha();" class='default gologin' value='Login' data-cf-modified-f85177f0a69a7dbb5202a20e-="" /> </div>
<div class='ess'><a href='forgot.php.html'>Forgot your password?</a></div>
<input type='hidden' value='ecd13566a6d20492b52f57aad2be4216' name='ucp_uniqid' id='ucp_uniqid' />
<input type='hidden' value='' name='captcha' id='ucp_captcha' />
<div class='anpc'>Don't have account? <a href='register.php.html'>Register</a></div>
</form>
</div>
</div><div class='box'>
<div class='title'>
<div class='bg'></div>
<div class='txt'>Top Players</div>
</div>
<div class='indexRank'><br><center>RZWOW[x3000]</center>
<div>1&ordm;&nbsp;&nbsp; [MOD]JericoSanta<span>100005 pk</span></div><div>2&ordm;&nbsp;&nbsp; MihiDesuntVerda<span>52996 pk</span></div><div>3&ordm;&nbsp;&nbsp; DrakoZd<span>51463 pk</span></div></div>
<a style='margin-top:4px;' class='default' href='toppk.php.html'>view more</a>
<div class='indexRank'><br><center>RZWOW[x450]</center>
<div>1&ordm;&nbsp;&nbsp; DoRS<span>849 pk</span></div><div>2&ordm;&nbsp;&nbsp; РождествО<span>587 pk</span></div><div>3&ordm;&nbsp;&nbsp; CRONUS<span>484 pk</span></div></div>
<a style='margin-top:4px;' class='default' href='toppk_x450.php.html'>view more</a></div>
<div class='box'>
<div class='title'>
<div class='bg'></div>
<div class='txt'>Vote</div>
</div>
<a href='http://topofgames.com/index.php?do=votes&id=82659' class='default' target='_blank'>TOPOFGAMES</a>
<a href='https://private-server.ws/index.php?a=in&u=Heroes73' class='default' target='_blank'>PRIVATE-SERVER</a>
<a href='https://gtop100.com/topsites/Rappelz/sitedetails/Rappelz-War-Of-The-Worlds-94034?vote=1' class='default' target='_blank'>GTOP100</a>
<a href='https://www.xtremetop100.com/in.php?site=1132362144' class='default' target='_blank'>XTREMETOP100</a>
<a href='https://www.elitepvpers.com/' class='default' target='_blank'>ELITEPVPERS</a>
</div>
</aside>
			<div class="postHolder">
				<div class="well">
					<div class="header">
						<?php echo '<a href="?view='.$news[$si]['id'].'">[#'.$news[$si]['id'].']</a> '. getClock($news[$si]['date'], true) .' by <a href="characterprofile.php?name='. $news[$si]['name'] .'">'. $news[$si]['name'] .'</a> - <b>'. TransformToBBCode($news[$si]['title']) .'</b>'; ?>
					</div>
					<div class="body">
						<p><?php echo TransformToBBCode(nl2br($news[$si]['text'])); ?></p>
					</div>
				</div>
			</div>
			<!-- OLD DESIGN: -->
			<?php
		} else {
			?>
			<table id="news">
				<tr class="yellow">
					<td class="zheadline">News post not found.</td>
				</tr>
				<tr>
					<td>
						<p>We failed to find the post you where looking for.</p>
					</td>
				</tr>
			</table>
			<?php
		}

	} else { // We want to view latest news or a page of news.
		for ($i = $current; $i < $current + $config['news_per_page']; $i++) {
			if (isset($news[$i])) {
				?>
				
				<article>
<div class='page'>
<div class='news'>
<div class='contentn' style='width: auto;'>
							<?php echo '<a href="?view='.urlencode($news[$i]['title']).'">'.getClock($news[$i]['date'], true).'</a> by <a href="characterprofile.php?name='. $news[$i]['name'] .'">'. $news[$i]['name'] .'</a> - <b>'. TransformToBBCode($news[$i]['title']) .'</b>'; ?>
						
							<p><?php echo TransformToBBCode(nl2br($news[$i]['text'])); ?></p>
						
				
</div>
					</div>
				</div>
			</article>

				<?php
			}
		}

		echo '';

		for ($i = 0; $i < $page_amount; $i++) {

			if ($i == $page) {

				echo '';

			} else {

				echo '';
			}
		}

		echo '';

	}

} else {
	echo '<p>No news exist.</p>';
}
?>
