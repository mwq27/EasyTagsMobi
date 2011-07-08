<? $this->load->view("header"); 
	
	
?>
	<header class="header">
		<hgroup>
		<h1>Welcome to Easy.tg!</h1>
		<h4><?=$tagline?></h4>
		<?php 
			if($this->session->userdata("logged_in") == true){
				echo "<h4><a href='/admin/logout'>Logout</a></h4>";
				
			}
		?>
	
		</hgroup>
	</header>
	
	<div id="container">
			
		<section class="intro vcard">
		
			<div class="floatLeft">
				
			</div>
			<img src="http://youscan.me/images/onecode.jpg" style="width:575px;" />
			
		
		
		</section>
		
		
		<section class="content">
			<article class="splash-block">
				<h1>Some stuff</h1>
				<p>
					Adipiscing mauris aenean natoque rhoncus ut facilisis augue sit magna tempor, enim dolor nisi sociis. 
					Et placerat odio elementum massa, vut placerat tristique, integer, lundium ridiculus etiam. 
					Vel, placerat sociis? Aliquet in, in a tortor ac! Vel nec, turpis! 
					Eros risus ac rhoncus habitasse, lorem est sociis augue! 
					Sit ac? Lectus est dolor massa? A rhoncus aenean aenean mattis sociis mattis cras turpis, urna?
				</p>
				
			</article>	
			
			<article class="splash-block">
				<img src="/images/multipleactionsuscn.png" />
			</article>
			
			<article class="splash-block">
				<h1>Codes that work</h1>
				<p>
					Adipiscing mauris aenean natoque rhoncus ut facilisis augue sit magna tempor, enim dolor nisi sociis. 
					Et placerat odio elementum massa, vut placerat tristique, integer, lundium ridiculus etiam. 
					Vel, placerat sociis? Aliquet in, in a tortor ac! Vel nec, turpis! 
					Eros risus ac rhoncus habitasse, lorem est sociis augue! 
					Sit ac? Lectus est dolor massa? A rhoncus aenean aenean mattis sociis mattis cras turpis, urna?
				</p>
				
			</article>	
			
			<article class="splash-block">
				<img src="/images/multipleactionsuscn.png" />
			</article>
			
	        
		</section>
	
	</div> <!--! end of #container -->
<? $this->load->view("footer"); ?>

	