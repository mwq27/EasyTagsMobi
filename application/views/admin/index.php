<? $this->load->view("header"); ?>

	<div id="container">
			
		<section class="intro vcard">
		
			<img src="http://s3.envato.com/files/1175193/ninetydegrees.jpg" class="photo" alt="Ninety Degrees" />
		
			<h2 class="fn">EasyTags</h2>
						
			<!-- Edit this to show your email address/details in the vCard/hCard. For help see: http://microformats.org/wiki/hcard -->
			<div class="hidden">
				<a class="email" href="mailto:&#x68;&#x65;&#x6c;&#x6c;&#x6f;&#00064;&#110;&#x69;&#110;&#000101;&#116;&#x79;&#x64;&#x65;&#x67;&#x72;&#x65;&#101;&#x73;&#46;&#99;&#x6f;">&#x68;&#x65;&#x6c;&#x6c;&#x6f;&#00064;&#110;&#x69;&#110;&#000101;&#116;&#x79;&#x64;&#x65;&#x67;&#x72;&#x65;&#101;&#x73;&#46;&#99;&#x6f;</a>
			</div>
		
		</section>
		
		<section class="content">
					
			<ul class="tabs">
	                    
	            <li><a href="#tab1">Login</a></li>
	            <li><a href="#tab2">Create A New Account</a></li>
	           	    
	        </ul>
	        
	        <div class="tab_container">
	        
	            <div id="tab1" class="tab_content contact">
	                
	                <? $this->load->view("admin/login"); ?>
	                
	            </div><!--/tab1-->
	            
	            <div id="tab2" class="tab_content about">
	                	               
					<? 
						$data['tagid'] = $tagid;
						$this->load->view("admin/update_form", $data); ?>
				
	            </div><!--/tab2-->
	            
	         
	            
	        </div><!--/tab_container-->
		
		</section>
	
	</div> <!--! end of #container -->
	
<? $this->load->view("footer"); ?>
