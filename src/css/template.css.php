<?php

// parameter
$debug = $_GET['debug'];
$view = $_GET['v'];
$component = $_GET['c'];

$cssFiles = array(
    'normalize.css',
    'fonts/fonts.css',
    'fonts/foundation-icons/foundation-icons.css',
    'fonts/webicons/webicons.css',
    'foundation.css',
    'custom.css',
    'print.css',
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
// cache control to process
header("Cache-Control:must-revalidate");

// duration of cached content (1 hour)
$offset = 60 * 60;

// expiration header format
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";

// send cache expiration header to broswer
header($ExpStr);

/**
 * begin function compress
 * 
 * @param type $buffer
 * @return type String
 */
function compress($buffer) {
// remove comments
   $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
// remove tabs, spaces, new lines, etc.        
   $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
// remove unnecessary spaces        
   $buffer = str_replace('{ ', '{', $buffer);
   $buffer = str_replace(' }', '}', $buffer);
   $buffer = str_replace('; ', ';', $buffer);
   $buffer = str_replace(', ', ',', $buffer);
   $buffer = str_replace(' {', '{', $buffer);
   $buffer = str_replace('} ', '}', $buffer);
   $buffer = str_replace(': ', ':', $buffer);
   $buffer = str_replace(' ,', ',', $buffer);
   $buffer = str_replace(' ;', ';', $buffer);
   $buffer = str_replace(';}', '}', $buffer);

   return $buffer;
}

foreach ($cssFiles as $file) {
   if (is_file($file)) {
      require($file);
   }
}