<form action="/admin/register" method="post">
	<p class="input">
				<label for="name">Name</label>
				<input  type="text" name="name" value="<? echo set_value('name'); ?>"   id="name" class="user-input required text"/>
				<label  id="fname-error" class="error">Please enter your name</label>
			</p>
			
			<p class="input">
				<label for="email">Email</label>
				<input type="text" name="email" value="<? echo set_value('email'); ?>"  id="email" class="user-input required text"/>
				<label  id="fname-error"  class="error">Please enter your first name</label>
			</p>
			
			<p class= "input">
				<label for="password">Password</label>
				<input type="password" name="password"  id="password" class="user-input required text"/>
				<label id="fname-error" class="error">Please enter your first name</label>
			</p>
				
			<p class="input">
				<label for="bname">Business Name</label>
				
			<input  type="text" name="bname"  id="bname" class="user-input required text" value="<? echo set_value('username'); ?>" />
				
				<label id="fname-error" class="error">Please enter your first name</label>
				
			</p>
			
			<p class="input">
				<input type="hidden" value="<?=$tagid?>"  name="tagid">
				<input type="submit" value="Submit Information" class="button submit" id="profile-submit">
			</p>
	</form>