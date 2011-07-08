<?
	($tagid == NULL) ? $notag = true : $notag = false;
	
?>
<form action="/admin/register" method="post" id="regform">
	<p class="input">
				<label for="name">Full Name</label>
				<input type="text" name="name" value="<? echo set_value('name'); ?>"   id="name" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your name</label>
			</p>
			
			<p class="input">
				<label for="email">Email</label>
				<input type="text" name="email" value="<? echo set_value('email'); ?>"  id="email" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
			
			<p class="input">
				<label for="password">Password</label>
				<input type="password" name="password"  id="password" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
			
			<p class="input">
				<label for="password_conf">Confirm Password</label>
				<input type="password" name="password_conf"  id="confirm_password" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
				
			<p class="input">
				<label for="bname">Business Name</label>
				<input type="text" name="bname"  id="bname" class="user-input required text" value="<? echo set_value('username'); ?>" />
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
			
			<p class="input">
				<label for="tagline">Tagline</label>
				<input type="text" name="tagline"  id="tagline" value="<? echo set_value('tagline'); ?>"  class="user-input required text"/>
				<label id="lname-error" class="error">Please enter your last name</label>
			</p>
			
			<? if($notag){ ?>
			<p class="input">
				<label for="tagid">Tag Id (Must be 5 digits, ex: 00024)</label>
				<input type="text" name="tagid" id="tagid" value="<? echo set_value('tagid'); ?>"  class="user-input required text"/>
				<label id="tag_id-error" class="error">Please enter your Tag Id</label>
			</p>
			
			<? } ?>
			
			
			<p class="input">
				<? if(!$notag){ ?>
					<input type="hidden" value="<?=$tagid?>"  name="tagid">
				<? } ?>
				<input type="submit" value="Submit Information" class="button submit" id="profile-submit">
			</p>
	</form>