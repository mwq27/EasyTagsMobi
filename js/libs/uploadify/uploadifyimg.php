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
$eq_id = $_POST['eq_id'];
$make = $_POST['make'];
$type=$_POST['type'];

$randstr = rand_str();
	
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	if($type == "1"){
		$type_id = '1';
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/cranes/'.$make.'/';
	
	$targetPaththmb = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/cranes/'.$make.'/thumbs/';
	
	}else{
		$type_id = 2;
	
		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/crane-parts/';
		$targetPaththmb = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/crane-parts/thumbs/';
	
	}
	
	$targetFile =  str_replace('//','/',$targetPath).$randstr.$_FILES['Filedata']['name'];
	$targetFilethmb = str_replace('//','/',$targetPaththmb).$randstr.$_FILES['Filedata']['name'];
	
	$shortpath = $randstr.$_FILES['Filedata']['name'];
	$shortpathThmb = "$make/thumbs/".$randstr.$_FILES['Filedata']['name'];

	$db->customQuery("INSERT INTO test SET txt = '$targetFile -- $shortpath -- $targetFilethmb --- $shortpathThmb'");
	
	$check_img = $db->customQuery("select * from equipment_images where equipment_id = '{$eq_id}' order by img_order desc");
	if(mysql_num_rows($check_img)>1){
		$img_ro = mysql_fetch_array($check_img);
		$img_order = $img_ro[img_order];
		$img_order += 1;
	}else{
		$img_order = 1;
	}
	$spec_ins = $db->customQuery("insert into equipment_images set equipment_id = '{$eq_id}', image_url ='{$shortpath}',thmb_url = '{$shortpathThmb}', equipment_type_id = '{$type_id}', orig_url='{$_FILES[Filedata][name]}', img_order='{$img_order}'");
		move_uploaded_file($tempFile,$targetFile);
		 $thumb=new thumbnail($targetFile);			// generate image_file, set filename to resize
		$thumb->size_width(600);				// set width for thumbnail, or
		$thumb->size_height(600);				// set height for thumbnail, or
		$thumb->size_auto(600);					// set the biggest width or height for thumbnail
		$thumb->jpeg_quality(100);				// [OPTIONAL] set quality for jpeg only (0 - 100) (worst - best), default = 75

		//$thumb->show();						// show your thumbnail

		$thumb->save("{$targetFile}");

		$thumb->size_width(105);				// set width for thumbnail, or
		$thumb->size_height(105);				// set height for thumbnail, or
		$thumb->size_auto(200);					// set the biggest width or height for thumbnail
		$thumb->jpeg_quality(100);	
		
		$thumb->save("{$targetFilethmb}");
		
		
			
		echo "1";
	// } else {
	// 	echo 'Invalid file type.';
	// }
}
?>