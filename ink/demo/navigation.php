<?php include 'shared/header.php'; ?>
<!-- |||||||||||||||||||||||||||||||||  Navitation  |||||||||||||||||||||||||||||||||  -->
<nav id="topbar">
	<div class="ink-container">
		<h1><a class="logoPlaceholder" href="./" title="Site Title">InK<small>Interface kit</small></a></h1>
		<ul class="ink-h-navigation">
			<li><a href="grid.php">Layout</a></li>
			<li class="active"><a href="navigation.php">Navigation</a></li>
			<li><a href="typo.php">Typography & Icons</a></li>
			<li><a href="forms.php">Forms & Alerts</a></li>
			<li><a href="tables.php">Tables</a></li>
			<li><a href="widgets.php">InkJS</a></li>
		</ul>
	</div>
</nav>  
<!-- |||||||||||||||||||||||||||||||||  Content  |||||||||||||||||||||||||||||||||  -->		
<div class="ink-container whatIs">
	<div class="ink-vspace">
		<h2>Navigation</h2>
		<p>Navigation is key in any website or web application.</p>
	</div>
</div>

<nav class="menu">
	<div class="ink-container">
		<ul class="ink-h-navigation">
			<li class="active"><a class="home" href="#">Home</a></li>
			<li><a href="#">Horizontal menu</a></li>
			<li><a href="#">Vertical menu</a></li>
			<li><a href="#">Simple footer menu</a></li>
		</ul>
	</div>
</nav>  

<div class="ink-container">
	<div class="ink-section">
		<div class="ink-space">
			<h3>Horizontal menu</h3>
			<p>
				Os menus horizontais podem ser utilizados como navegação primária do site ou aplicação assim como barra de topo.
				Para construir este tipo de navegação basta usar a class <mark>.h_navigation</mark>.
			</p>
		</div>
		
		<nav class="ink-hspace">
			<ul class="ink-h-navigation example_menu">
				<li class="active"><a href="#">Item</a></li>
				<li><a href="#">Item</a></li>
				<li><a href="#">Item</a></li>
				<li><a href="#">Item</a></li>
				<li>
					<a href="#">Item</a>
					<ul class="submenu">
						<li><a href="#">Item Bastante Grande</a></li>
						<li><a href="#">Item</a></li>
						<li><a href="#">Item</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		
		<div class="ink-l100">
			<div class="ink-space">
				<p class="note">
					<strong>Nota: </strong>O menu pode ser construído de várias formas podendo usar um elemento com <mark>&lt;a&gt;</mark> ou
					<mark>&lt;ul&gt;</mark>. Pode também utilizar a nova tag <mark>&lt;nav&gt;</mark> <span class="label_new">HTML5</span>
				</p>
			
				<pre class="prettyprint">
&lt;nav&gt;
  &lt;ul class="h_navigation"&gt;
    &lt;li class=&quot;active&quot;&gt;&lt;a href=&quot;#&quot;&gt;Item&lt;/a&gt;&lt;/li&gt; 
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Item&lt;/a&gt;&lt;/li&gt; 
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Item&lt;/a&gt;&lt;/li&gt; 
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Item&lt;/a&gt;&lt;/li&gt; 
  &lt;/ul&gt;
&lt;/nav&gt;</pre>
			</div>
		
			<div class="ink-space">
				<h4>Submenu</h4>
				<p>Os menus que se baseiam em <mark>&lt;ul&gt;</mark>(Unsorted Lists) podem ter submenus respeitando a estrutura abaixo.</p>
				
				<pre class="prettyprint">
&lt;ul class="h_navigation"&gt;
  &lt;li class=&quot;active&quot;&gt;&lt;a href=&quot;#&quot;&gt;Item&lt;/a&gt;&lt;/li&gt; 
  &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Item&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href=&quot;#&quot;&gt;Item&lt;/a&gt;
  &lt;ul class=&quot;submenu&quot;&gt;
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;SubItem&lt;/a&gt;&lt;/li&gt; 
    &lt;li&gt;&lt;a href=&quot;#&quot;&gt;SubItem&lt;/a&gt;&lt;/li&gt;  
  &lt;/ul&gt;
  &lt;/li&gt; 
&lt;/ul&gt;</pre>
			</div>
		</div>
	</div>
	<div class="ink-section">
		<div class="ink-l33">
			<div class="ink-space">
				<h3>Round Menu</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
					Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
		<div class="ink-l33">
			<div class="ink-space">
				<h4>SubMenu</h4>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
					Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
		<div class="ink-l33">
			<div class="ink-space">
				<h4>Pesquisa Incorporada</h4>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
					Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
	</div>
</div>
<?php include 'shared/footer.php'; ?>