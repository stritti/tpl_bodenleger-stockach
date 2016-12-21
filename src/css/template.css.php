<?php

// parameter
$debug = $_GET['debug'];
$view = $_GET['v'];
$component = $_GET['c'];

$cssFiles = array(
    'normalize.css',
    'fonts/foundation-icons/foundation-icons.min.css',
    'fonts/general_foundicons/general_foundicons.min.css',
    'fonts/social_foundicons/social_foundicons.min.css',
    'fonts/webicons/webicons.min.css',
    'app.min.css',
    'pages/' . $component . '/' . $component . '.min.css',
    'pages/' . $component . '/views/' . $view . '.min.css'
);


$cssDebugFiles = array(
    'normalize.css',
    'fonts/foundation-icons/foundation-icons.css',
    'fonts/general_foundicons/general_foundicons.css',
    'fonts/social_foundicons/social_foundicons.css',
    'fonts/webicons/webicons.css',
    'app.css',
    'pages/' . $component . '/' . $component . '.css',
    'pages/' . $component . '/views/' . $view . '.css'
);

// initialize ob_gzhandler to send and compress data
ob_start("ob_gzhandler");

// initialize compress function for whitespace removal
if ($debug === 0) {
   ob_start("compress");
}
// required header info and character set
header("Content-type:text/css; charset=UTF-8");

// duration of cached content (1 hour)
$offset = 60 * 60;

// expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";

// send cache expiration header to browser
header($ExpStr);

if ($debug == 0) {
   // Enable caching
   header('Cache-Control: public');
   $buffer = "";
   foreach ($cssFiles as $file) {
      if (is_file($file)) {
         $buffer .= file_get_contents($file);
      }
   }
//see: https://gist.github.com/brentonstrine/5f56a24c7d34bb2d4655
// Remove comments
   $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);

// Remove space after colons
   $buffer = str_replace(': ', ':', $buffer);

// Remove whitespace
   $buffer = str_replace(array("\r\n", "\r", "\n", "\t"), '', $buffer);

// Collapse adjacent spaces into a single space
   $buffer = preg_replace('!\s+!', ' ', $buffer);

   // Remove spaces that might still be left where we know they aren't needed
   $buffer = str_replace(array('} '), '}', $buffer);
   $buffer = str_replace(array('{ '), '{', $buffer);
   $buffer = str_replace(array('; '), ';', $buffer);
   $buffer = str_replace(array(', '), ',', $buffer);
   $buffer = str_replace(array(' }'), '}', $buffer);
   $buffer = str_replace(array(' {'), '{', $buffer);
   $buffer = str_replace(array(' ;'), ';', $buffer);
   $buffer = str_replace(array(' ,'), ',', $buffer);
   // Write everything out
   echo($buffer);
} else {
   // cache control to process
   header("Cache-Control:must-revalidate");
   foreach ($cssDebugFiles as $file) {
      if (is_file($file)) {
         require($file);
      } else {
         echo "//File not found: " . $file;
      }
   }
}