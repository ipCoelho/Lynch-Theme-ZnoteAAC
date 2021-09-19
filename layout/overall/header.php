<!-- Lynch Theme Created by Alex45
     Forum: https://lepiigortv.com/forum
     GitHub: https://github.com/open-games-community -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="Tibia, private server, online, real map, internacional, international, english, 1x, 5x, 10x, 30x, 50x, 70x, 100x, 150x, 200x, 300x, 1000x, free fun, new server, pt, es, mmropg, alex45, webdesigner, forum, server, custom map, 8.6, 10.98, 12x" />
<meta name="description" content="Tibia Server" />
<link rel="shortcut icon" href="imgs/favicon.ico">
<title>Tibia Mmorpg Server</title>
<meta property="og:title" content="Tibia Server" />
<meta property="og:url" content="index.php" />
<meta property="og:description" content="Tibia Server" />
<link rel="stylesheet" type="text/css" href="css/lynch.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" media="all" />
<script type="f85177f0a69a7dbb5202a20e-text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="f85177f0a69a7dbb5202a20e-text/javascript" src="js/lynch.js"></script>

</head>
<body>
<div id="fb-root"></div>
<div class='all en'>
<div class='status-bar '>
	
<div class='langs'>
</div>
<!-- You can Add here a Google Translate element https://www.w3schools.com/howto/howto_google_translate.asp -->
<div class='stt-txt'>
 &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;Server <span class='on'>Online</span> Players Online:<a href="onlinelist.php"> <?php echo user_count_online();?></a></div>
</div>

<section>
<nav>
<a href='index.php' class='o1'>
<span class='ntxt'></span>
</a>
<span class="o2">
<span class='ntxt'></span>
<span class='ndesc'>Server Info</span>
<div style='left: -23px;'>
<a href='highscores.php'>Highscores</a>
<a href='killers.php'>Top Frags</a>
<a href='guilds.php'>Guilds</a>
<a href='guildwar.php'>Guild Wars</a>
<a href='powergamers.php'>PowerGamers</a>
<a href='deaths.php'>Latest Deaths</a>
<a href='Market.php'>Items Market</a>
<a href='houses.php'>Houses</a>
<a href='toponline.php'>Top Online</a>
<a href='topguilds.php'>Top Guilds</a>
<a href='onlinelist.php'>Online Players</a>
</div>
</span>
<a href='register.php' class='o3'>
<span class='ntxt'></span>
</a>
<a href='downloads.php' class='o4'>
<span class='ntxt'></span>
</a>
<span class='o5'>
<span class='ntxt'></span>
<div style='left: -23px;'>
<a href='myaccount.php'>My Account</a>
<a href='register.php'>Register</a>
<a href='helpdesk.php'>Create Ticket</a>
<a href='forum.php'>Forum</a>
<a href='changelog.php'>Changelogs</a>
<a href='mailto:your@email.com'>Contact Us</a>
<a href='auctionchar.php'>Character Auction</a>
<a href='buypoints.php'><font color="lime">Buy Points</font></a>
<a href='shop.php'><font color="orange">Store</font></a>

</div>
</span>
</nav>
<div>
</div>
<a href='forum.php' class='forum-button' target='_blank'></a>
<br>
<aside>
<?php if (user_logged_in() === true): ?>
<div class='box'>
<div class='title'>
<div class='bg'></div>
<div class='txt'>User Control Panel</div>
</div>
<a href="myaccount.php" class="default">
				My Account</a>

			<a href="createcharacter.php" class="default">
				Create Character</a>

			<a href="changepassword.php" class="default">
				Change Password</a>

			<a href="settings.php" class="default">
			Settings</a>
			
			<a href="logout.php" class="default">
				Logout</a>

<?php else: ?>
<div class='box'>
<div class='title'>
<div class='bg'></div>
<div class='txt'>User Control Panel</div>
</div>
<div class='loginarea'>
<img src='imgs/nm/loader.gif' style='width:0;height:0;display:none;' />
<form class="loginForm" action="login.php" method="post">
<div class='fieldsBox'>
<label>
<input type='text' name='username' class='inpt' id="login_username" />
<div class='acc_icon user'></div>
</label>
<label>
<input type='password' name='password' class='inpt pass' id="login_password" />
<div class='acc_icon pass'></div>
</label>
<input type='submit' class='default gologin submitButton' value='Log in' /> </div>
<div class='anpc'>Don't have account? <a href='register.php'>Register</a></div>
</form>
</div>
<?php endif; ?>
</div><div class='box'>
<div class='title'>
<div class='bg'></div>
<div class='txt'>Top Players</div>
</div>


<?php
            $cache = new Cache('engine/cache/topPlayer');
            if ($cache->hasExpired()) {
                $players = mysql_select_multi('SELECT `name`, `level`, `experience`, `looktype`, `lookaddons`, `lookhead`, `lookbody`, `looklegs`, `lookfeet` FROM `players` WHERE `group_id` < ' . $config['highscore']['ignoreGroupId'] . ' ORDER BY `experience` DESC LIMIT 5;');
                $cache->setContent($players);
                $cache->save();
            } else {
                $players = $cache->load();
            }
            if ($players) {
            $count = 1;
            foreach($players as $player) {
            echo '<img style="margin-top: -35px; margin-left: -35px;" src="https://lepiigortv.com/animatedoutfits/animoutfit.php?id='.$player['looktype'].'&addons='.$player['lookaddons'].'&head='.$player['lookhead'].'&body='.$player['lookbody'].'&legs='.$player['looklegs'].'&feet='.$player['lookfeet'].'&g=0&h=3&i=1"></img> <a href="characterprofile.php?name='.$player['name'].'" style="color:orange">'.$player['name'].'&ensp;</a><strong><font color="green">'. $player['level'].'</font></strong><br>';
           $count++;
            }
            }
            ?>
            	
           <br>
<a style='margin-top:4px;' class='default' href='highscores.php'>view more</a>
</div>

</aside>