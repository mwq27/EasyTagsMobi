<?php
foreach($info as $row){
		$email = $row->email;
		$username = $row->username;
		$about_l = $row->about_long;
		$business = $row->business;
		$tagline = $row->tagline;
		$tagid = $row->tag_id;
		$city = $row->city;
		$state = $row->state;
		$zip = $row->zip;
		$address1 = $row->address1;
		$address2 = $row->address2;
		$phone = $row->phone;
		
		
	}

$networks = array("fbook" => "", "twitter" => "", "flickr" => "", "youtube" => "", "vimeo" => "");

	foreach($social as $key => $val){
			$net = explode("_",$val["network"]);
			$networks[$net[0]] = $val["username"];
	}


	
foreach($hours as $row){
	if($row->day == "mon"){
		$monOpen = $row->open;
		$monClose = $row->close;
	}
	if($row->day == "tue"){
		$tueOpen = $row->open;
		$tueClose = $row->close;
	}
	if($row->day == "wed"){
		$wedOpen = $row->open;
		$wedClose = $row->close;
	}
	if($row->day == "thu"){
		$thuOpen = $row->open;
		$thuClose = $row->close;
	}
	if($row->day == "fri"){
		$friOpen = $row->open;
		$friClose = $row->close;
	}
	if($row->day == "sat"){
		$satOpen = $row->open;
		$satClose = $row->close;
	}
	if($row->day == "sun"){
		$sunOpen = $row->open;
		$sunClose = $row->close;
	}
	

}
?>
<form action="/admin/profile_info" method="post" id="multipss">
		
			<fieldset id="p1">	
			<legend>Profile Information</legend>
			<p class="input">
				<label for="username">Choose a username (easy.tg/[username])</label>
				<input type="text" name="username"  id="username" value="<?=$username?>"  class="user-input required text"/>
				<label id="username-error" class="error">Please enter your username</label>
			</p>
			
			<p class="input">
				<label for="tagline">Address</label>
				<input type="text" name="address1"  id="address1" value="<?=$address1?>"  class="user-input required text"/>
				<label id="address1-error" class="error">Please enter your business address</label>
			</p>
			
			<p class="input">
				<label for="tagline">Address line 2</label>
				<input type="text" name="address2"  id="address2" value="<?=$address2?>"  class="user-input required text"/>
				<label id="address2-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="tagline">City</label>
				<input type="text" name="city"  id="city" value="<?=$city?>"  class="user-input required text"/>
				<label id="city-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="tagline">State</label>
				<input type="text" name="state"  id="state" value="<?=$state?>"  class="user-input required text"/>
				<label id="state-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="tagline">Zip</label>
				<input type="text" name="zip"  id="zip" value="<?=$zip?>"  class="user-input required text"/>
				<label id="zip-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="tagline">Phone</label>
				<input type="text" name="phone"  id="phone" value="<?=$phone?>"  class="user-input required text"/>
				<label id="phone-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="tagline">Fax</label>
				<input type="text" name="fax"  id="fax" value="<?=$fax?>"  class="user-input required text"/>
				<label id="fax-error" class="error">Please enter your last name</label>
			</p>
			
			<article id="socialsec" class=" middlesec">
				
				<div id="">
					<img src="/images/facebook.png" alt="Facebook Easy Tag" class="tagswitch" rel="fb"/>
					<img src="/images/twitter.png" alt="Twitter Easy Tag" class="tagswitch" rel="tw"/>
				
					<p id="fb" class="input">
						<label>Enter your facebook url:</label>
						<input type="text" id="fbook_url" value="<?=$networks["fbook"]?>" name="fbook_url" class="user-input text" placeholder="http://www.facebook.com/abc" />
						
					</p>
					
					<p id="tw" class="input">
						<label>Enter your twitter name:</label>
						<input type="text" id="twitter_url" value="<?=$networks["twitter"]?>" name="twitter_url" class="user-input text" placeholder="Your twitter username" />
						
					</p>
					
					<p class="input">
						<label>Enter your Flickr username:</label>
						<input type="text"  value="<?=$networks["flickr"]?>" name="flickr_url" class="user-input text" placeholder="Your Flickr username" />
						
					</p>
					
					<p class="input">
						<label>Enter your Vimeo username:</label>
						<input type="text"  value="<?=$networks["vimeo"]?>" name="vimeo_url" class="user-input text" placeholder="Your Vimeo username" />
						
					</p>
					
					<p class="input">
						<label>Enter your Youtube username:</label>
						<input type="text"  value="<?=$networks["youtube"]?>" name="youtube_url" class="user-input text" placeholder="Your Youtube username" />
						
					</p>
				</div>
				
				
			</article>
			</fieldset>
			
			<fieldset id="p2">	
			<legend>Company Information</legend>
			<p class="input">
				
				<label for="about-long">About your company (Long description)</label>
				<textarea  name="about_long" id="about_long" class="user-input required"/><?=$about_l?></textarea>
				<label id="lname-error" class="error">Please enter your last name</label>
			</p>
			
			<h3>Hours of operation</h3>
			<p class="input">
				<label for="mon-start">Monday</label>
				<?
					$Options = array(
						'0' => "Closed",
						'1' => "1 am",
						'2' => "2 am",
						'3' => "3 am",
						'4' => "4 am",
						'5' => "5 am",
						'6' => "6 am",
						'7' => "7 am",
						'8' => "8 am",
						'9' => "9 am",
						'10' => "10 am",
						'11' => "11 am",
						'12' => "12 am",
						'13' => "1 pm",
						'14' => "2 pm",
						'15' => "3 pm",
						'16' => "4 pm",
						'17' => "5 pm",
						'18' => "6 pm",
						'19' => "7 pm",
						'20' => "8 pm",
						'21' => "9 pm",
						'22' => "10 pm",
						'23' => "11 pm",
						'24' => "12 am",
					
					);
					
					
					
					echo form_dropdown('mon-start', $Options, $monOpen);
					
				?>
			
				 <span> To </span>
				<?
					echo form_dropdown('mon-end', $Options, $monClose);
				?>
				
				
			</p>
			<p class="input">
				<label for="tue-start">Tuesday</label>
				<?
				
				echo form_dropdown('tue-start', $Options, $tueOpen);
				
				?>
				
				 <span> To </span>
				<?
				
				echo form_dropdown('tue-end', $Options, $tueClose);
				
				?>
				
				
			</p>
			<p class="input">
				<label for="wed-start">Wednesday</label>
				<?
				
				echo form_dropdown('wed-start', $Options, $wedOpen);
				
				?>
				
				 <span> To </span>
				<?
				
				echo form_dropdown('wed-end', $Options, $wedClose);
				
				?>
				
				
			</p>
			<p class="input">
				<label for="thu-start">Thursday</label>
				<?
				
				echo form_dropdown('thu-start', $Options, $thuOpen);
				
				?>
				
				 <span> To </span>
				<?
				
				echo form_dropdown('thu-start', $Options, $thuClose);
				
				?>
				
				
			</p>
			<p class="input">
				<label for="fri-start">Friday</label>
				
				<?
				
				echo form_dropdown('fri-start', $Options, $friOpen);
				
				?>
				
				 <span> To </span>
				<?
				
				echo form_dropdown('fri-end', $Options, $friClose);
				
				?>
						
			</p>
			
			<p class="input">
				<label for="sat-start">Saturday</label>
				<?
				
				echo form_dropdown('sat-start', $Options, $satOpen);
				
				?>
				
				 <span> To </span>
				<?
				
				echo form_dropdown('sat-end', $Options, $satClose);
				
				?>
			
			</p>
			<p class="input">
				<label for="sun-start">Sunday</label>
				<?
				
				echo form_dropdown('sun-start', $Options, $sunOpen);
				
				?>
				
				 <span> To </span>
				<?
				
				echo form_dropdown('sun-end', $Options, $sunClose);
				
				?>
			
				</p>
						
			</fieldset>
			
			
			
			<fieldset id="p3">	
			<legend>Profile Complete</legend>
			<p class="input">
				<h2>You're all set!  Tell your friends.</h2>
				
			</p>
			<input type="hidden" value="<?=$tagid?>"  name="tag_id">
			</fieldset>
			
			<p class="input">
				
				<input type="submit" value="Submit Information" class="button submit" id="profile-submit">
			</p>
	</form>
	