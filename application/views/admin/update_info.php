<? $this->load->view("header"); ?>

	<div id="container">
			
		<section class="intro vcard">
		
			<img src="http://s3.envato.com/files/1175193/ninetydegrees.jpg" class="photo" alt="Ninety Degrees" />
		
			<h2 class="fn">Ninety Degrees</h2>
			<p class="role"><a href="http://ninetydegrees.co" class="url org">Ninety Degrees</a> are a <mark>small</mark> <mark>talented</mark> design studio specialising in WordPress theme design and plugin development.</p>
			
			<!-- Edit this to show your email address/details in the vCard/hCard. For help see: http://microformats.org/wiki/hcard -->
			<div class="hidden">
				<a class="email" href="mailto:&#x68;&#x65;&#x6c;&#x6c;&#x6f;&#00064;&#110;&#x69;&#110;&#000101;&#116;&#x79;&#x64;&#x65;&#x67;&#x72;&#x65;&#101;&#x73;&#46;&#99;&#x6f;">&#x68;&#x65;&#x6c;&#x6c;&#x6f;&#00064;&#110;&#x69;&#110;&#000101;&#116;&#x79;&#x64;&#x65;&#x67;&#x72;&#x65;&#101;&#x73;&#46;&#99;&#x6f;</a>
			</div>
		
		</section>
		
		<section class="content">
					
			<ul class="tabs">
	                    
	            <li><a href="#tab1">Update information</a></li>
	           
	    
	        </ul>
	        
	        <div class="tab_container">
	        
	            <div id="tab1" class="tab_content about">
	                
	               	<?
	               		$this->load->view('admin/reg_form'); 
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
