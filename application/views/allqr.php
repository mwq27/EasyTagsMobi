<!doctype html>  

<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>vCard CI</title>
	<meta name="description" content="A simple theme for displaying information about you!" />
	<meta name="author" content="NinetyDegrees" />
	<meta name="keywords" content="vCard, hCard, theme, personal, social networks" />
	
	<!--  Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- CSS : Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" />
	
	<!-- CSS : Change this if you want a different colour scheme -->
	<link rel="stylesheet" href="css/default.css?v=1" />
	
	<!-- CSS : Fancybox -->
	<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	
	<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
	<script src="js/libs/modernizr.min.js"></script>
	<style>
		.columm {  
		  width:220px;
		  float:left;
		  font-family:Helvetica;
		  letter-spacing:2px;
}  

.columm p{
	margin:0px;
	margin-top:-10px;
	font-size:12px;
}

.columm img{
	width:200px;
	height:200px;
}
	</style>
</head>
<body>

<div class="wrap">
	
	<header class="header">
		<hgroup>
		
		</hgroup>
	</header>
	
	<div id="container">
			
		<section class="intro vcard">
			<div style="width:100%;float:left;">
			<?
				asort($files);
				
				foreach($files as $key => $val){
					$fnamearr = explode(".", $val);
					$filename = $fnamearr[0];
					if($filename >= "00001" && $filename <="00300"){ ?>
					
						
						
			<?			echo "<div class='columm'  style=\"page-break-before: always\"><img src = '/qr/".$val."'/>";
						echo "<p style='text-align:center;'>easy.tg/".$filename. "</p></div>";
					}
				}

?>
		</div>
		</section>
		
	
	
	</div> <!--! end of #container -->
	
	<footer id="footer">
	
	
	</footer>
</div><!--/wrap-->


</div>
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