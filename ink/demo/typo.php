<?php include 'shared/header.php'; ?>
<!-- |||||||||||||||||||||||||||||||||  Navitation  |||||||||||||||||||||||||||||||||  -->
<div id="topbar">
	<div class="ink-container">
		<h1><a class="logoPlaceholder" href="index.php" title="Site Title">InK<small>Interface kit</small></a></h1>
		<ul>	
			
			<li><a href="grid.php">Layout</a></li>
			<li><a href="navigation.php">Navigation</a></li>
			<li class="active"><a href="typo.php">Typography & Icons</a></li>
			<li><a href="forms.php">Forms & Alerts</a></li>
			<li><a href="tables.php">Tables</a></li>
			<li><a href="widgets.php">InkJS</a></li>
		</ul>
	</div>
</div>
<!-- |||||||||||||||||||||||||||||||||  Content  |||||||||||||||||||||||||||||||||  -->
<div class="ink-container whatIs">
	<div class="ink-vspace">
		<h2>Typography & Icons</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	</div>
</div>

<nav class="menu">
	<div class="ink-container">
		<ul>
			<li class="active"><a class="home" href="#">Home</a></li>
			<li><a href="#">Headings</a></li>
			<li><a href="#">Body & Hyper text</a></li>
			<li><a href="#">Lists</a></li>
			<li><a href="#">Special cases</a></li>
			<li><a href="#">Icon Webfont</a></li>
		</ul>
	</div>
</nav>

<div class="ink-container">

	<div class="ink-section">
		<div class="ink-l30" id="headingExemple">
			<div class="ink-space">
				<h1>&lt;h1&gt; Title 1</h1>
				<h2>&lt;h2&gt; Title 2</h2>
				<h3>&lt;h3&gt; Title 3</h3>
				<h4>&lt;h4&gt; Title 4</h4>
				<h5>&lt;h5&gt; Title 5</h5>
				<h6>&lt;h6&gt; Title 6</h6>
			</div>
		</div>
		<div class="ink-l70">
			<div class="ink-space">
				<h3>Text sample</h3>
				<p>Ink's typography is designed to create a strong hierarchy with basic styles. The primary font is the die hard Helvetica Neue, but the font stack can be easily changed with just a few adjustments.</p>
			</div>
			<div class="ink-space">
				<h4>Links</h4>
				<ul class="unstyled">
					<li>Links (or hyperlinks) are defined by the tag <mark>&lt;a&gt;</mark></li>
					<li>There are 4 states for links:</li>
					<li><a href="#">Normal</a></li>
					<li><a href="#" class="visited">Visited</a></li>
					<li><a href="#" class="active">Active</a></li>
					<li><a href="#" class="hover">Hover</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="ink-section" id="listExemple">
		<div class="ink-l25 ">
			<div class="ink-space">
				<h4>List</h4>
				<ul>
					<li>Proin metus odio, aliquam eget molestie</li>
					<li>Phasellus quis est sed turpis sollicitudin</li>
					<li>In condimentum facilisis porta. Sed nec diam</li>
					<li>Vestibulum mollis mauris enim. Morbi</li>
					<li>In hac habitasse platea dictumst. Nam pulvinar, odio</li>
					<li>Nam pulvinar, odio sed rhoncus</li>
				</ul>
				<pre class="prettyprint">&lt;ul&gt;
&lt;li&gt;...&lt;/li&gt;
&lt;li&gt;...&lt;/li&gt;
&lt;/ul&gt;</pre>
			</div>
		</div>
		<div class="ink-l25">
			<div class="ink-space">
				<h4>Unstyled list</h4>
				<ul class="unstyled">
					<li>Proin metus odio, aliquam eget molestie</li>
					<li>Phasellus quis est sed turpis sollicitudin</li>
					<li>In condimentum facilisis porta. Sed nec diam</li>
					<li>Vestibulum mollis mauris enim. Morbi mauris</li>
					<li>In hac habitasse platea dictumst. Nam pulvinar, odio</li>
					<li>Nam pulvinar, odio sed rhoncus</li>
				</ul>
				<pre class="prettyprint">&lt;ul class=&quot;unstyled&quot;&gt;
&lt;li&gt;...&lt;/li&gt;
&lt;li&gt;...&lt;/li&gt;
&lt;/ul&gt;</pre>
			</div>
		</div>
		<div class="ink-l25">
			<div class="ink-space">
				<h4>Ordered list</h4>
				<ol>
					<li>Proin metus odio, aliquam eget molestie</li>
					<li>Phasellus quis est sed turpis sollicitudin</li>
					<li>In condimentum facilisis porta. Sed nec diam</li>
					<li>Vestibulum mollis mauris enim. Morbi</li>
					<li>In hac habitasse platea dictumst. Nam pulvinar, odio</li>
					<li>Nam pulvinar, odio sed rhoncus</li>
				</ol>
				<pre class="prettyprint">&lt;ol&gt;
&lt;li&gt;...&lt;/li&gt;
&lt;li&gt;...&lt;/li&gt;
&lt;/ol&gt;</pre>
			</div>
		</div>
		<div class="ink-l25">
			<div class="ink-space">
				<h4>Defenition list</h4>
				<dl>
					<dt>Proin metus odio, aliquam eget molestie</li>
					<dd>Phasellus quis est sed turpis sollicitudin</dd>
					<dt>Vestibulum mollis mauris enim</dt>
					<dd>In hac habitasse platea dictumst. Nam pulvinar, odio</dd>
					<dt>Nam pulvinar, odio sed rhoncus</dt>
					<dd>In condimentum facilisis porta. Sed nec diam</dd>

				</dl>
				<pre class="prettyprint">&lt;dl&gt;
&lt;dt&gt;Título&lt;/dt&gt;
&lt;dd&gt;Descrição&lt;/dd&gt;
&lt;/dl&gt;</pre>
			</div>
		</div>
	</div>
	<div class="ink-section">
		<div class="ink-l50">
			<div class="ink-space">
				<h4>Abbreviations</h4>
				<p>
					We can use the tag
					<mark>&lt;abbr&gt;</mark>
					to abbreviate the word <strong><abbr title="SAPO Interface Kit">InK</abbr></strong> 
				</p>
				<pre class="prettyprint">&lt;abbr title=&quot;SAPO Interface Kit&quot;&gt;InK&lt;/abbr&gt;</pre>
			</div>
		</div>
		<div class="ink-l25">
			<div class="ink-space">
				<h4>Address</h4>
				<address>
					<h6>Forum Telecom</h6>
					Avenida Fontes Pereira de Melo 40
					<br>
					1050 Lisboa
					<br></address>
			</div>
		</div>
		<div class="ink-l25">
			<div class="ink-space">
				<h4>Contacts</h4>
				<address>
					<h6>John Doe</h6> <strong>Phone:</strong>
					+351 111 222 333
					<br>
					<strong>Email:</strong>
					<a href="mailto:john@doe.com">john@doe.com</a>
				</address>
			</div>
		</div>
	</div>
	<div class="ink-section">
		<div class="ink-l50">
			<div class="ink-space">
				<h4>Quotes</h4>
				<blockquote>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<small>Author's name</small>
				</blockquote>
			</div>
		</div>
		<div class="ink-l50">
			<div class="ink-space">
				<pre class="prettyprint">&lt;blockquote&gt;
&lt;p&gt;O Texto deve ser dividido por parágrafos&lt;/p&gt;
Pode tambem ser quebrado por line-breaks&lt;br&gt;
&lt;small&gt;Nome do Autor&lt;/small&gt;
&lt;/blockquote&gt;</pre>
			</div>
		</div>
	</div>
	<div class="ink-section">
		<div class="ink-space">
			<h4>Notes</h4>
			<p class="note">
				<strong>Note:</strong>
				To use the notes style you just need to add the <mark>.note</mark> class to the element.
				<br>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			</p>
		</div>
	</div>

	<div class="ink-section">
		<div class="ink-l50">
			<div class="ink-space">
				<h4>Labels</h4>
				<p>
					Labels can be created by adding the
					<mark>ink-label</mark>
					class to an element. 
			When combined with the
					<mark>ink-success</mark>
					,
					<mark>ink-warning</mark>
					,
					<mark>ink-caution</mark>
					or
					<mark>ink-info</mark>
					classes further meaning is added by the means of color.
				</p>
				<p>
					<mark class="ink-label ink-success">New</mark>
					For success and new messages
				</p>
				<p>
					<mark class="ink-label ink-warning">Warning</mark>
					For warnings
				</p>
				<p>
					<mark class="ink-label ink-caution">Error</mark>
					For presenting errors
				</p>
				<p>
					<mark class="ink-label ink-info">Info</mark>
					For informative notes
				</p>

			</div>
		</div>
		<div class="ink-l50">
			<div class="ink-space">
				<h4>Mark <span class="label_new">HTML5</span></h4>
				<p>The new <mark>&lt;mark&gt;</mark> tag present in the HTML5 spec is particularly useful to mark content in inline text.</p>
			</div>
		</div>
	</div>
	<div class="ink-section">
		
		<div class="ink-space">
			<h2>Icon webfont</h2>
		</div>

		<div class="ink-hspace">
			<ul class="ink-l25 unstyled">
				<li><i class="icon-beaker"></i> icon-beaker</li>
				<li><i class="icon-bell"></i> icon-bell</li>
				<li><i class="icon-bolt"></i> icon-bolt</li>
				<li><i class="icon-bookmark-empty"></i> icon-bookmark-empty</li>
				<li><i class="icon-briefcase"></i> icon-briefcase</li>
				<li><i class="icon-bullhorn"></i> icon-bullhorn</li>
				<li><i class="icon-caret-down"></i> icon-caret-down</li>
				<li><i class="icon-caret-left"></i> icon-caret-left</li>
				<li><i class="icon-caret-right"></i> icon-caret-right</li>
				<li><i class="icon-caret-up"></i> icon-caret-up</li>
				<li><i class="icon-certificate"></i> icon-certificate</li>
				<li><i class="icon-check-empty"></i> icon-check-empty</li>
				<li><i class="icon-circle-arrow-down"></i> icon-circle-arrow-down</li>
				<li><i class="icon-circle-arrow-left"></i> icon-circle-arrow-left</li>
				<li><i class="icon-circle-arrow-right"></i> icon-circle-arrow-right</li>
				<li><i class="icon-circle-arrow-up"></i> icon-circle-arrow-up</li>
				<li><i class="icon-cloud"></i> icon-cloud</li>
				<li><i class="icon-columns"></i> icon-columns</li>
			</ul>
			<ul class="ink-l25 unstyled">
				<li><i class="icon-comment-alt"></i> icon-comment-alt</li>
				<li><i class="icon-comments-alt"></i> icon-comments-alt</li>
				<li><i class="icon-copy"></i> icon-copy</li>
				<li><i class="icon-credit-card"></i> icon-credit-card</li>
				<li><i class="icon-cut"></i> icon-cut</li>
				<li><i class="icon-dashboard"></i> icon-dashboard</li>
				<li><i class="icon-envelope-alt"></i> icon-envelope-alt</li>
				<li><i class="icon-facebook"></i> icon-facebook</li>
				<li><i class="icon-filter"></i> icon-filter</li>
				<li><i class="icon-fullscreen"></i> icon-fullscreen</li>
				<li><i class="icon-github"></i> icon-github</li>
				<li><i class="icon-globe"></i> icon-globe</li>
				<li><i class="icon-google-plus-sign"></i> icon-google-plus-sign</li>
				<li><i class="icon-google-plus"></i> icon-google-plus</li>
				<li><i class="icon-group"></i> icon-group</li>
				<li><i class="icon-hand-down"></i> icon-hand-down</li>
				<li><i class="icon-hand-left"></i> icon-hand-left</li>
				<li><i class="icon-hand-right"></i> icon-hand-right</li>
			</ul>
			<ul class="ink-l25 unstyled">
				<li><i class="icon-hand-up"></i> icon-hand-up</li>
				<li><i class="icon-hdd"></i> icon-hdd</li>
				<li><i class="icon-legal"></i> icon-legal</li>
				<li><i class="icon-link"></i> icon-link</li>
				<li><i class="icon-linkedin"></i> icon-linkedin</li>
				<li><i class="icon-list-ol"></i> icon-list-ol</li>
				<li><i class="icon-list-ul"></i> icon-list-ul</li>
				<li><i class="icon-magic"></i> icon-magic</li>
				<li><i class="icon-money"></i> icon-money</li>
				<li><i class="icon-paper-clip"></i> icon-paper-clip</li>
				<li><i class="icon-paste"></i> icon-paste</li>
				<li><i class="icon-phone-sign"></i> icon-phone-sign</li>
				<li><i class="icon-phone"></i> icon-phone</li>
				<li><i class="icon-pinterest-sign"></i> icon-pinterest-sign</li>
				<li><i class="icon-pinterest"></i> icon-pinterest</li>
				<li><i class="icon-reorder"></i> icon-reorder</li>
				<li><i class="icon-rss"></i> icon-rss</li>
			</ul>
			<ul class="ink-l25 unstyled">
				<li><i class="icon-save"></i> icon-save</li>
				<li><i class="icon-sign-blank"></i> icon-sign-blank</li>
				<li><i class="icon-sitemap"></i> icon-sitemap</li>
				<li><i class="icon-sort-down"></i> icon-sort-down</li>
				<li><i class="icon-sort-up"></i> icon-sort-up</li>
				<li><i class="icon-sort"></i> icon-sort</li>
				<li><i class="icon-strikethrough"></i> icon-strikethrough</li>
				<li><i class="icon-table"></i> icon-table</li>
				<li><i class="icon-tasks"></i> icon-tasks</li>
				<li><i class="icon-truck"></i> icon-truck</li>
				<li><i class="icon-twitter"></i> icon-twitter</li>
				<li><i class="icon-umbrella"></i> icon-umbrella</li>
				<li><i class="icon-underline"></i> icon-underline</li>
				<li><i class="icon-undo"></i> icon-undo</li>
				<li><i class="icon-unlock"></i> icon-unlock</li>
				<li><i class="icon-user-md"></i> icon-user-md</li>
				<li><i class="icon-wrench"></i> icon-wrench</li>
			</ul>
		</div>
	</div>

</div>

<?php include 'shared/footer.php'; ?>