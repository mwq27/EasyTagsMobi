	<h2>Edit your information</h2>
	<?php
		foreach($info as $row){
			$name = $row->name;
			$email = $row->email;
			$bname = $row->business;
			$tagline = $row->tagline;
			$about_s = $row->about_short;
			$about_l = $row->about_long;
			$tagid = $row->tag_id;
			
			$networks = $row->networks;
			
			
			
		}
		$networks = explode(",", $networks);
			$fbc = "";
			$twbc = "";
			$ytbc = "";
			$frbc = "";
			foreach($networks as $key => $val){
				
				($val == 'fb') ? $fbc = "checked" : $fbc;
				($val == 'tw') ? $twbc = "checked" : $twbc ;
				($val == 'yt') ? $ytbc = "checked" : $ytbc ;
				($val == 'fr') ? $frbc = "checked" : $frbc ;
				
				
			}
	 echo validation_errors('<p class="error">', '</p>'); ?>
	<form action="/admin/edit" method="post">
	
			<p class="input">
				<label for="name">Name</label>
				<input type="text" name="name" value="<?php echo $name; ?>"   id="name" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your name</label>
			</p>
			
			<p class="input">
				<label for="bname">Email</label>
				<input type="text" name="email" value="<?php echo $email; ?>"  id="bname" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
			
			<p class="input">
				<label for="bname">Password</label>
				<input type="password" name="password"  id="bname" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
				
			<p class="input">
				<label for="bname">Business Name</label>
				<input type="text" name="bname"  id="bname" class="user-input required text" value="<?=$bname?>" />
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
			
			<p class="input">
				<label for="tagline">Tagline</label>
				<input type="text" name="tagline"  id="tagline" value="<?=$tagline?>"  class="user-input required text"/>
				<label id="lname-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="about-short">About your company (Short description, 1-2 sentences)</label>
				<textarea  name="about-short" id="about-short" class="user-input required"/><?=$about_s?></textarea>
				<label id="lname-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="about-long">About your company (Long description)</label>
				<textarea  name="about-long" id="about-long" class="user-input required"/><?=$about_l?></textarea>
				<label id="lname-error" class="error">Please enter your last name</label>
			</p>
			
			<p class="input">
				<label for="networks">Social Networks</label>
				<input type="checkbox"  name="networks[]" id="fb" value="fb" <?php echo $fbc; ?> class="user-input" validate="required:true, minlength:1"/>Facebook<br/>
				<input type="checkbox"  name="networks[]" id="tw" value="tw" <?php echo $twbc; ?> class="user-input "/>Twitter<br/>
				<input type="checkbox"  name="networks[]" id="fr" value="fr" <?php echo $ytbc; ?> class="user-input "/>Flickr<br/>
				<input type="checkbox"  name="networks[]" id="yt" value="yt" <?php echo $frbc; ?> class="user-input "/>YouTube<br/>
				
				
				<label id="lname-error" class="error">Please enter your last name</label>
			</p>
			
			
			<p class="input">
				<input type="hidden" value="<? echo $tagid; ?>"  name="tagid">
				<input type="submit" value="Submit Information" class="button submit" id="profile-submit">
			</p>
</form>