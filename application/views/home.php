<? $this->load->view("header"); 
	foreach($info as $row){
		$email = $row->email;
		$about_s = $row->about_short;
		$about_l = $row->about_long;
		$business = $row->business;
		$tagline = $row->tagline;
		$tagid = $row->tag_id;
		$fbook = $row->fbook_url;
		$twitter = $row->twitter_url;
		$logo = $row->logo;
	}
	
	$networks = array("fbook" => "", "twitter" => "", "flickr" => "", "youtube" => "", "vimeo" => "");

	foreach($social as $key => $val){
			$net = explode("_",$val["network"]);
			$networks[$net[0]] = $val["username"];
	}
	
?>
	<header class="header">
		<hgroup>
		<h1><?=$business?></h1>
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
				
				<img id="logo-img" src="<?=$logo?>" class="photo" alt="Ninety Degrees" />
				
			
				<?=$about_s?>
			</div>
			
			<div class="clear"></div>
			<? if($this->session->userdata("logged_in") == true){?>
			<section class="floatLeft">
					<h1>Update your logo</h1>
					<h3>Select Images to Upload</h3>
					
					<input type="file" id="uploadimg" name="uploadimg"/><br/>
					<input type='hidden' name='tagid' value='<?=$tagid?>' >
					<!--<a href="javascript:$('#uploadimg').uploadifyUpload();">Upload Image(s)</a>-->
					<br/>
					
					<div id="filesUploaded" style="margin:20px;"></div>
					
					<div id="img-prev"></div>
				
			</section>
		<? } ?>
		
		</section>
		
		
		<section class="content">
					
			<ul class="tabs">
	                    
	            <li><a href="#tab1">Social</a></li>
	            <li><a href="#tab2">About</a></li>
	            <li><a href="#tab3">Contact</a></li>
	            <li><a href="#tab4">Work</a></li>
				<? if($this->session->userdata("logged_in") == true){?><li><a href="#tab5">Profile</a></li><? } ?>
				<? if($this->session->userdata("logged_in") == true){?><li><a href="#tab6">Payment info</a></li><? } ?>
	        </ul>
	        
	        <div class="tab_container">
	        
	            <div id="tab1" class="tab_content social">
	               
	                <ul>
					<?php
					if($networks["twitter"] != ""){ ?>
	                	<li class="odd">
	                		<a href="#" class="tooltip" title="Follow us on Twitter"><img src="images/icons/twitter.png" alt="Twitter" /> Twitter</a>
	                	</li>
					<?php
						}
					?>
					<?php if($networks["fbook"] != ""){ ?>
						
						<li class="even">
	                		<a href="#" class="tooltip" title="Find us on Facebook"><img src="images/icons/facebook.png" alt="Facebook" /> Facebook</a>
	                	</li>
					<?php
						}
					?>
					
					<?php if($networks["flickr"]){ ?>
	                	<li class="odd">
	                		<a href="#" class="tooltip" title="View us on Flickr"><img src="images/icons/flickr.png" alt="Flickr" /> Flickr</a>
	                	</li>
					<?php
						}
					?>	
					
					<?php if($networks["vimeo"]){ ?>
	                	<li class="even">
	                		<a href="#" class="tooltip" title="Watch us at Vimeo"><img src="images/icons/vimeo.png" alt="Vimeo" /> Vimeo</a>
	                	</li>
					<?php
						}
					?>	
					<?php if($networks["youtube"]){ ?>
	                    <li class="odd">
	                		<a href="#" class="tooltip" title="Watch us at Youtube"><img src="images/icons/youtube.png" alt="Youtube" /> Youtube</a>
	                	</li>
					<?php
						}
					?>	
					
	                	
	                </ul>
	                
	            </div><!--/tab1-->
	            
	            <div id="tab2" class="tab_content about">
	                
	                <h2>About</h2>
	               	<p><?=$about_l?></p> 
	               
	                
	            </div><!--/tab2-->
	            
	            <div id="tab3" class="tab_content contact">
	                
	                <h2>Contact us</h2>
	                
	                <form method="post" class="contact" action="contact.php">
	                	
	                	<p class="input">
	                		<label for="name">Name</label>
	                		<input type="text" class="text" name="name" id="name" placeholder="Your Name" />
	                	</p>
	                	<p class="input">
	                		<label for="email">Email</label>
	                		<input type="text" class="text" name="email" id="email" placeholder="you@yourdomain.com" />
	                	</p>
	                	<p class="input">
	                		<label for="message">Message</label>
	                		<textarea name="message" class="text" id="message" placeholder="Your Message" rows="5" cols="20"></textarea>
	                	</p>
	                	<p class="input">
	                		<input class="submit" type="submit" value="Send" />
	                		<input type="text" class="honeypot" title="Leave Blank" name="honeypot" value="" />
	                	</p>
	                	
	                </form>
	                
	            </div><!--/tab3-->
	            
	            <div id="tab4" class="tab_content work">
	            	
	            	<h2>Work</h2>
	            	<p>Below is some examples of my work.</p>
	            	
	            	<ul class="works">
	            		<li>
	            			<a href="images/samples/1.jpg" title="Image 1" class="fancybox" rel="work">
	            				<img src="images/samples/1.jpg" alt="1" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/2.jpg" title="Image 2" class="fancybox" rel="work">
	            				<img src="images/samples/2.jpg" alt="2" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/3.jpg" title="Image 3" class="fancybox" rel="work">
	            				<img src="images/samples/3.jpg" alt="3" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/4.jpg" title="Image 4" class="fancybox" rel="work">
	            				<img src="images/samples/4.jpg" alt="4" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/5.jpg" title="Image 5" class="fancybox" rel="work">
	            				<img src="images/samples/5.jpg" alt="5" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/6.jpg" title="Image 6" class="fancybox" rel="work">
	            				<img src="images/samples/6.jpg" alt="6" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/7.jpg" title="Image 7" class="fancybox" rel="work">
	            				<img src="images/samples/7.jpg" alt="7" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/8.jpg" title="Image 8" class="fancybox" rel="work">
	            				<img src="images/samples/8.jpg" alt="8" />
	            			</a>
	            		</li>
	            		<li>
	            			<a href="images/samples/9.jpg" title="Image 9" class="fancybox" rel="work">
	            				<img src="images/samples/9.jpg" alt="9" />
	            			</a>
	            		</li>
	            	</ul>
	            	
	            </div><!--/tab4-->
				<? if($this->session->userdata("logged_in") == true){?>
				<div id="tab5" class="tab_content">
	            	
	            	<h2>Finish Your Profile</h2>
	            	<? 
	            		$data['tagid'] = $tagid;
						$data['info'] = $info;
	            		$this->load->view("admin/profile", $data); ?>
	            	
	            	
	            	
	            </div><!--/tab5-->
	            
	            <div id="tab6" class="tab_content">
	            	
	            	<h2>Please complete your easy.tg payment</h2>
	            	<? $this->load->view("admin/payment", $data); ?>
	            	
	            	
	            	
	            </div><!--/tab6-->
	            <? } ?>
	        </div><!--/tab_container-->
		
		</section>
	
	</div> <!--! end of #container -->
<? $this->load->view("footer"); ?>
<script>

	$('#uploadimg').uploadify({
			
			'uploader': '/js/libs/uploadify/uploadify.swf',
			'script': 	'/admin/uploadify/',
			'scriptData': {"tagid" :'<?=$tagid?>' },
			'folder':	'/images/uploads',
		    'sizeLimit': '3000000',
		    'auto' : true,
                       
			'multi':  false,
			'cancelImg':  '/images/icons/001_05.png', 
			'method': 		'POST',
			'onError': function(event, queueID, fileObj, errorObj, data, response){
				var msg;
				msg = response;
				alert(msg);
				
				alert(errorObj.info);
			},
			onComplete: function(event, queueID, fileObj, response, data) {
				if (response !== '1')
           		//alert(response);
           		$("#logo-img").attr("src", response);
     			$('#filesUploaded').append('Successfully uploaded image(s): '+fileObj.name+'<br/>');
     			$("#img-prev").append('<img src="'+response+'" alt="'+fileObj.name+'" />');
				}
		});
	
	</script>
	