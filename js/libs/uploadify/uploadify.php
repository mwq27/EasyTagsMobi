<?php
define('access', true);
include_once("classes/db_class.php");
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
$user_info = $_SESSION['user_obj'];
$uid = $user_info->user_id;
$eq_id = $_POST['eq_id'];
$date_created = date("Y-m-d g:i:s");
$randstr = rand_str();
	
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath).$randstr.$_FILES['Filedata']['name'];
	
	$shortpath = $_REQUEST['folder'].'/'.$randstr.$_FILES['Filedata']['name'];
	$get_make = $db->runSelect("equipment", "equipment_id = '$eq_id'", "equipment_make_id, model");
	$make = mysql_fetch_array($get_make);
	
	$db->customQuery("insert into equipment_specs set make_id = '{$make[0]}', model = '{$make[1]}', spec_url ='{$shortpath}', date_created = '{$date_created}'");
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$targetFile);
		echo "1";
	// } else {
	// 	echo 'Invalid file type.';
	// }
}
?>