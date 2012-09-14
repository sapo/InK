<?php include 'shared/header.php'; ?>
<!-- |||||||||||||||||||||||||||||||||  Navitation  |||||||||||||||||||||||||||||||||  -->

<!-- |||||||||||||||||||||||||||||||||  Content  |||||||||||||||||||||||||||||||||  -->		
    
<nav id="topbar">
	<div class="ink-container">
		<h1><a class="logoPlaceholder" href="./" title="Site Title">InK<small>Interface kit</small></a></h1>
		<ul>
			<li><a href="grid.php">Layout</a></li>
			<li><a href="navigation.php">Navigation</a></li>
			<li><a href="typo.php">Typography & Icons</a></li>
			<li><a href="forms.php">Forms & Alerts</a></li>
			<li><a href="tables.php">Tables</a></li>
			<li><a href="alerts.php">InkJS</a></li>
		</ul>
	</div>
</nav>  

<div class="callToAction">
	<img src="<?php echo base_url() ?>../ink/demo/styles/imgs/logo_home.png" alt="Logo Home" class="logo_hp">
	<div class="glow">
		<img src="styles/imgs/glow1.png" alt="Glow1"></div>
</div>

<div class="ink-container">

	<div class="ink-l100 whatIs">
		<div class="ink-vspace">
			<h3>Welcome to Ink</h3>
			<p>
				Ink is an interface kit for quick development of web interfaces, simple to use and expand on. 
				It uses a combination of HTML, CSS and JavaScript to offer modern solutions for building layouts, 
				display common interface elements and implement interactive features that are content-centric and user friendly for both your audience and your designers & developers.
			</p>
		</div>
	</div>
	<div class="ink-l100" id="download">
		<div class="ink-l33">
			<div class="ink-space">
				<a href="#" >Version 1.0</a>
				<p>Download InK's current build</p>
			</div>
		</div>
		<div class="ink-l33">
			<div class="ink-space">
				<a href="<?php echo site_url() . '/custom' ?>" >Custom</a>
				<p>
					Customize your basic layout - site width, gutters, spacers, and much more
				</p>
			</div>
		</div>
		<div class="ink-l33">
			<div class="ink-space">
				<a href="#" >Github repo</a>
				<p>Download, fork, pull, comment or report bugs at InK's Github</p>
			</div>
		</div>
	</div>

</div>		
		
<?php include 'shared/footer.php'; ?>