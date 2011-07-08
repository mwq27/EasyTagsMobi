// remap jQuery to $
(function($){
	//Tabs
	$(".tab_content:not(.tab_content:first)").hide(); //Hide all content except first
	$("ul.tabs li:first").addClass("active"); //Activate first tab
	
	//On Click Event
	$("ul.tabs li a").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).parent().addClass("active"); //Add "active" class to selected tab
		var activeTab = $(this).attr("href"); //Find the rel attribute value to identify the active tab + content
		$(".tab_content:visible").slideUp('500', function() {
			$(activeTab).slideDown('500'); // Slide in the active content
		});
		return false;
	});
	
	// Contact form
	$("form.contact").submit(function(){
		$("form.contact .error, form.contact .success").remove();
		$.ajax({
			type: 'POST',
			url: 'contact.php',
			data: $("form.contact").serialize(),
			success: function(result) {
				if (result=="SUCCESS") {
					$('#name, #email, #message').val('');
					$("form.contact").prepend('<p class="success" style="display:none">Mail sent successfully</p>');
				} else {
					$("form.contact").prepend('<p class="error" style="display:none">' + result + '</p>');
				}
				$("form.contact .error, form.contact .success").slideDown('500');
			}
		});
		return false;
	});
	
	// Tipsy
	$('.tooltip').tipsy({gravity: 's', offset: 2});
	
	// Fancybox
	$('a.fancybox').fancybox({
		'opacity'		: true,
		'overlayShow'	: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
	
	if($("form#regform")[0]){
		
			$("form#regform").validate({
				rules:{
				
						name: "required",
						email: {
							required: true,
							email: true,
							remote:{
								url:	"/admin/check_email/",
								type:	"post"
							}
						},
						password: {
							required: true,
							minlength: 5
						},
						confirm_password: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						bname: {
							required: true
							
						},
						tagline: {
							required: true
							
						},
						tagid:	{
							required: true,
							remote:{
								url:	"/admin/check_tagid",
								type:	"post"
							}
						}
			},
			messages: {
				name: "Please enter your full name",
				bname: "Please enter your business name",
				tagline: "Please enter your tagline",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: {
					required:"Please enter a valid email address",
					email:"Can you enter a valid email address",
					remote: jQuery.format("{0} is already in use")
				},
				
				tagid:	{
					required:"Please enter a valid Tag ID",
					remote: jQuery.format("{0} is already in use")
				}
				
			},
			success: function(label) {
			// set &nbsp; as text for IE
		
			label.html("&nbsp;").addClass("checked");
			
		}
				
		});
		
		
	}
	
		if($("#multipss").length > 0){
        	$('#multipss').multipage();
      	}
			
		function transition(from,to) {
			$(from).fadeOut('fast',function(){$(to).fadeIn('fast');});
		
		}
		function textpages(obj,page,pages) { 
			$(obj).html(page + ' of ' + pages);
		}
 
})(window.jQuery);





















