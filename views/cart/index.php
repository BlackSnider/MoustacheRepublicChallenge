<?php
/**
 * Load the default page
*/
if (!isset($contents)) {
	$contents="home";
}


/**
 * Header Section of the page
 */
include 'header.php';

/**
 * Body Section of the page
 */

  if(file_exists('contents/'.$contents.'.php')) {
	  
	include 'contents/'.$contents.'.php';
	
  } else {
	  
	include 'contents/404.php';
	
  }
 
/**
 * Footer Section of the page
 */
include 'footer.php';

?>
