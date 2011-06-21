<?php
define('access', true);
include_once("classes/db_class.php");
require_once 'classes/ThumbLib.inc.php';
require_once 'classes/pic.php';
session_start();
$db = new Database('cranenetwork');
$db->connect();

	function rand_str($length = 16, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890')
		{
		    // Length of character list
		    $chars_length = (strlen($chars) - 1);
		
		    // Start our string
		    $string = $chars{rand(0, $chars_length)};
		   
		    // Generate random string
		    for ($i = 1; $i < $length; $i = strlen($string))
		    {
		        // Grab a random character from our list
		        $r = $chars{rand(0, $chars_length)};
		       
		        // Make sure the same two characters don't appear next to each other
		        if ($r != $string{$i - 1}) $string .=  $r;
		    }
		   
		    // Return the string
		    return $string;
		}
/*
Uploadify v2.1.0
Release Date: August 24, 2009

Copyright (c) 2009 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

if (!empty($_FILES)) {
//pass the equipment_type and ID and make, $make = explode(":", $_POST[mfr]);
//targetPath equipment-pics/cranes/make/img.jpg	
	
$user_info = $_SESSION['user_obj'];
$uid = $user_info->user_id;
$user_id = $_POST['user_id'];


$now = $db->customQuery("SELECT logo FROM registered_users WHERE user_id = $user_id");
$n = mysql_num_rows($now);


if ($n > 0)
{
	$go = mysql_fetch_array($now);
	unlink("../../equipment-pics/logos/{$go[0]}");
}



$randstr = rand_str();
	
	
$tempFile = $_FILES['Filedata']['tmp_name'];
$targetPath = $_SERVER['DOCUMENT_ROOT']. $_REQUEST['folder'];

$targetFile =  str_replace('//','/',$targetPath).$randstr.$_FILES['Filedata']['name'];
	
$shortpath = $randstr.$_FILES['Filedata']['name'];
	
move_uploaded_file($tempFile,$targetFile);



$thumb=new thumbnail($targetFile);			// generate image_file, set filename to resize
$thumb->size_width(296);				// set width for thumbnail, or
$thumb->size_height(160);				// set height for thumbnail, or
//$thumb->size_auto(296);					// set the biggest width or height for thumbnail
$thumb->jpeg_quality(100);				// [OPTIONAL] set quality for jpeg only (0 - 100) (worst - best), default = 75

		//$thumb->show();						// show your thumbnail

		$thumb->save("{$targetFile}");

		echo "1";
	// } else {
	// 	echo 'Invalid file type.';
	// }
$db->customQuery("UPDATE registered_users SET logo = '$shortpath' WHERE user_id = $user_id");
}
?>