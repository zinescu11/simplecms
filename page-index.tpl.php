<!DOCTYPE html>
<html class="page" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no, viewport-fit=cover">
	<meta name="keywords" content="">
	<meta name="description" content="Temporal Games — Game Development, AI Research & Deployment">
	<meta name="title" content="Temporal Games">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="assets/images/favicon/site.webmanifest">
	<link rel="mask-icon" href="assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="assets/images/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="assets/images/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<title>Temporal Games</title>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
</head>
<body class="fadein" id="main">
	<div class="wrapper">
		<header id="header">
			<div class="content">
				<a href="index.html" class="logo_icon"><img src="assets/images/logo_icon.svg" alt="Temporal Games"></a>
				<ul class="menu">
				
					<li><a href="#about" onclick="event.preventDefault();doScrolling('about', 500, this)" id="about_link">About</a></li>
					
					<? $products = cms::items("products"); ?>
					<? $prodMenuSize = min(3, count($products)); ?>
					
					<? for ($i = 0; $i < $prodMenuSize; $i++): $v = $products[$i]; ?>
					
						<li><a href="#<?=$v->url?>" onclick="event.preventDefault();doScrolling('<?=$v->url?>', this)" id="<?=$v->url?>_link"><?=$v->title?></a></li>
						
					<? endfor ?>
					
					<li><a href="#jobs" onclick="event.preventDefault();doScrolling('jobs', 500, this)" id="jobs_link">Jobs</a></li>
					
					<li><a href="#contacts" onclick="event.preventDefault();doScrolling('contacts', this)" id="contacts_link">Contacts</a></li>
				</ul>
			</div>
		</header>
		
		<div id="about">
			<div class="content">
				<h1 class="heading_mobile">Game Development, AI&nbsp;Research &&nbsp;Deployment</h1>
			</div>
			<div class="banner" style="background-image:url('<?=cms::value("banner/image")?>')">
				<h1>Game Development,<br>AI&nbsp;Research &&nbsp;Deployment</h1>
				<img src="assets/images/logo_main.svg" alt="Temporal Games" class="logo_main">
			</div>
			<div class="content">
				<div class="quote">
					<h3><?=cms::value("banner/comment")?></h3>
					<p><a href="#jobs" onclick="event.preventDefault();doScrolling('jobs', this)" id="jobs_inner_link">Join us <span class="arrow">&darr;</span></a></p>
				</div>
			</div>
		</div>
		<div class="items">
			<div class="content">
				<div class="line"></div>
				
				<? $products = cms::items("products"); ?>
				
				<? foreach ($products as $v): ?>

					<? if ($v->page): ?>
						<div class="line"></div>
					<? endif ?>
				
					<div class="item" id="<?=$v->url?>">
						<div class="item_left">
							<div class="item_left_heading">
								<h2 class="item_left_first_heading"><?=$v->name?></h2>
								<h2><?=$v->title?></h2>
							</div>
							<div class="tags"><p><?=$v->tags?></p></div>
						</div>
						<div class="item_right">
						
							<?=$v->description?>
							
							<? if ($v->page): ?>
								<p><a href="<?=$v->url?>">View more <span class="arrow">&rarr;</span></a></p>
							<? endif ?>
							
						</div>
					</div>
				<? endforeach ?>
				
				<!--div class="item" id="fluxcortex">
					<div class="item_left">
						<div class="item_left_heading">
							<h2 class="item_left_first_heading">01</h2>
							<h2>fluxCortex</h2>
						</div>
						<div class="tags"><p>#ai</p><p>#evolvingai</p><p>#virtualbeings</p></div>
					</div>
					<div class="item_right">
						<p><b>fluxCortex Azu®</b> — next-generation Evolving AI hybrid architecture based on genetic algorithms and reinforcement learning.</p>
						<p>Virtual Beings solution for natural interaction with emotional feedback and ability for real-time acquisition of skills.</p>
					</div>
				</div>
				<div class="item" id="fluxneat">
					<div class="item_left">
						<div class="item_left_heading">
							<h2 class="item_left_first_heading">02</h2>
							<h2>fluxNEAT</h2>
						</div>
						<div class="tags"><p>#ai</p><p>#genetic</p><p>#bots</p><p>#npc</p></div>
					</div>
					<div class="item_right">
						<p><b>fluxNEAT®</b> — evolving Neural Networks solution capable of learning skills in real-time with zero to minimal pre-training data.</p>
						<p>Self-learning system for application in games providing human-like, evolving behaviors of computer-controlled characters.</p>
					</div>
				</div>
				<div class="line"></div>
				<div class="item" id="riflecore">
					<div class="item_left">
						<div class="item_left_heading">
							<h2 class="item_left_first_heading">03</h2>
							<h2>Riflecore</h2>
						</div>
						<div class="tags"><p>#gamedevelopment</p><p>#onlinegame</p><p>#brawler</p></div>
					</div>
					<div class="item_right">
						<p><b>Riflecore</b> fuses brawling fundamentals with tactical gunplay. Take map control with your teammates and demolish the enemies in a truly competitive way.</p>
						<p>Your victories and choices will shape the tides of the ongoing hybrid war on the world map, and decide the fate of key characters with each new season rollout.</p>
						<p><a href="riflecore.html">View more <span class="arrow">&rarr;</span></a></p>
					</div>
				</div-->
			</div>
		</div>
		<!-- DUBLICATE JOBS IN BOTH SECTIONS (COLUMNS AND SLIDER) -->
		<div class="jobs" id="jobs">
			<div class="content">
				<p class="heading">Join us</p>
				<div class="swiper-container">
				    <div class="swiper-wrapper">
				    
						<? $vacancies = cms::items("vacancies"); ?>

						<? foreach ($vacancies as $v): ?>
							<div class="job_list_item swiper-slide">
								<h3> <?=$v->title?> </h3>
								<p> <?=$v->description?> </p>
								<? if ($v->page): ?>
									<p><a href="<?=$v->url?>">View more <span class="arrow">&rarr;</span></a></p>
								<? endif ?>
							</div>
						<? endforeach ?>
						
				    	<!--
						<div class="job_list_item swiper-slide">
							<h3>C++ Core Engineer</h3>
							<p>Experienced C++ engineer for development of core artificial intelligence technology framework and integration modules.</p>
							<p><a href="core_engineer.html">View more <span class="arrow">&rarr;</span></a></p>
						</div>
						<div class="job_list_item swiper-slide">
							<h3>VFX Artist</h3>
							<p>Specialist capable of designing and implementing highly stylized visual effects, improving tools and optimizing pipelines.</p>
							<p><a href="vfx_artist.html">View more <span class="arrow">&rarr;</span></a></p>
						</div>
						<div class="job_list_item swiper-slide">
							<h3>UI Designer</h3>
							<p>Experienced UI/UX designer with a portfolio of game projects, capable of conceptualizing and implementing UI for Riflecore.</p>
							<p><a href="ui_designer.html">View more <span class="arrow">&rarr;</span></a></p>
						</div>
				        <div class="job_list_item swiper-slide">
							<h3>Data Scientist</h3>
							<p>Experienced data scientist interested in developing new advanced technologies related to simulating convincing human-like behavior in learning, motion, speech and decision making.</p>
							<p><a href="data_scientist.html">View more <span class="arrow">&rarr;</span></a></p>
						</div>
						<div class="job_list_item swiper-slide">
							<h3>Other</h3>
							<p>If you don’t see your position listed but you think we can work together, feel free to contact us at <a href="mailto:job@temporal.games">job@temporal.games</a>, include your targeted position in the letter subject.</p>
						</div>
						-->
						
				    </div>
				    <div class="swiper-pagination"></div>
				</div>
				<div class="job_list">
				
					<? foreach ($vacancies as $v): ?>
						<div class="job_list_item">
							<h3> <?=$v->title?> </h3>
							<p> <?=$v->description?> </p>
							<? if ($v->page): ?>
								<p><a href="<?=$v->url?>">View more <span class="arrow">&rarr;</span></a></p>
							<? endif ?>
						</div>
					<? endforeach ?>
					
					<!--
					<div class="job_list_item">
						<h3>C++ Core Engineer</h3>
						<p>Experienced C++ engineer for development of core artificial intelligence technology framework and integration modules.</p>
						<p><a href="core_engineer.html">View more <span class="arrow">&rarr;</span></a></p>
					</div>
					<div class="job_list_item">
						<h3>VFX Artist</h3>
						<p>Specialist capable of designing and implementing highly stylized visual effects, improving tools and optimizing pipelines.</p>
						<p><a href="vfx_artist.html">View more <span class="arrow">&rarr;</span></a></p>
					</div>
					<div class="job_list_item">
						<h3>UI Designer</h3>
						<p>Experienced UI/UX designer with a portfolio of game projects, capable of conceptualizing and implementing UI for Riflecore.</p>
						<p><a href="ui_designer.html">View more <span class="arrow">&rarr;</span></a></p>
					</div>
					<div class="job_list_item">
						<h3>Data Scientist</h3>
						<p>Experienced data scientist interested in developing new advanced technologies related to simulating convincing human-like behavior in learning, motion, speech and decision making.</p>
						<p><a href="data_scientist.html">View more <span class="arrow">&rarr;</span></a></p>
					</div>
					<div class="job_list_item">
						<h3>Other</h3>
						<p>If you don’t see your position listed but you think we can work together, feel free to contact us at <a href="mailto:job@temporal.games" class="mailto">job@temporal.games</a>, include your targeted position in the letter subject.</p>
					</div>
					-->
					
				</div>
			</div>
		</div>
		<div id="contacts"></div>
		<div class="contacts">
			<div class="content">
				<p class="heading">Get in touch</p>
				<h3 id="delivery">The message has been sent, thank you.</h3>
				<form id="form" onsubmit="submitForm(event)">
					<input type="text" name="name" placeholder="Name" id="name" onfocus="focusIn(this)" onfocusout="focusOut(this, 'Name')">
					<input type="text" name="email" placeholder="E-mail" id="email" onfocus="focusIn(this)" onfocusout="focusOut(this, 'E-mail')">
					<textarea type="text" name="message" placeholder="Message" id="message" onfocus="focusIn(this)" onfocusout="focusOut(this, 'Message')" maxlength="500"></textarea>
					<input type="submit" value="Send message" class="submit"> 
				</form>
			</div>
		</div>
		<div class="content">
			<footer>
				<p class="footer_left">Temporal Games 2020 </p>
				<p class="footer_middle"><a href="mailto:contact@temporal.games">contact@temporal.games</a></p>
				<p class="footer_right"><a href="https://www.facebook.com/temporalgames" target="_blank" rel="noopener">Facebook</a><a href="https://twitter.com/temporal_games" target="_blank"rel="noopener">Twitter</a><a href="https://vk.com/temporalgames" target="_blank"rel="noopener">VK</a><a href="https://www.youtube.com/c/temporalgames" target="_blank"rel="noopener">YouTube</a><a href="https://discord.gg/RFWQ6K7" target="_blank"rel="noopener">Discord</a></p>
			</footer>
		</div>
		<center>
			<p> <small><a href="cms/"> Edit Site </a></small> </p>
		</center>
	</div>
	<script src="assets/js/swiper-bundle.min.js"></script>
	<script>
		var mySwiper = new Swiper('.swiper-container', {
			direction: 'horizontal',
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			scrollbar: {
				el: '.swiper-scrollbar',
			},
			themeColor: '#fff'
		})
		var mySwiper = new Swiper('.swiper-container-2', {
			direction: 'horizontal',
			loop: true,
			pagination: {
				el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			scrollbar: {
				el: '.swiper-scrollbar',
			},
			themeColor: '#fff'
		})
	</script>
	<script src="assets/js/main.js"></script>
</body>
</html>