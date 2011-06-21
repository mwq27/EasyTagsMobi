<? $this->load->view("header"); 
foreach($info as $row){
		$email = $row->email;
		$about_s = $row->about_short;
		$about_l = $row->about_long;
		$business = $row->business;
		$tagline = $row->tagline;
	}
?>
	<header class="header">
		<hgroup>
		<h1><?=$business?></h1>
		<h4><?=$tagline?></h4>
		</hgroup>
	</header>
	
	<div id="container">
			
		<section class="intro vcard">
		
			<img src="http://s3.envato.com/files/1175193/ninetydegrees.jpg" class="photo" alt="Ninety Degrees" />
		
		<?=$about_s?>
		
		</section>
		
		<section class="content">
					
			<ul class="tabs">
	                    
	            <li><a href="#tab1">Update information</a></li>
	           
	    
	        </ul>
	        
	        <div class="tab_container">
	        
	            <div id="tab1" class="tab_content about">
	                
	               	<?
	               		$this->load->view('admin/edit_form'); 
					?>
	                
	            </div><!--/tab1-->
	            
	            
	            
	            
	            
	            
	            
	        </div><!--/tab_container-->
		
		</section>
	
	</div> <!--! end of #container -->
	
	<footer id="footer">
	
	<p>Copyright &copy; 2011 Your Name</p>
	<p class="alt">Theme by <a href="http://ninetydegrees.co/" title="Ninety Degrees">Ninety Degrees</a>, icons by <a href="http://www.wpzoom.com/" rel="nofollow">WPZOOM</a></p>
	
	</footer>
</div><!--/wrap-->
	
	<!-- Javascript at the bottom for fast page loading -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
	
	<!--[if lte IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script src="js/libs/dd_roundies.js"></script>
	<script> 
		DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images 
		DD_roundies.addRule('#container', '5px');
	</script>
	<![endif]-->
</body>
</html>
