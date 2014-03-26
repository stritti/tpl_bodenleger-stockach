<?php
$debug = $_GET['debug'];
// initialize ob_gzhandler to send and compress data
ob_start("ob_gzhandler");

// initialize compress function for whitespace removal
if ($debug === 0) {
   ob_start("compress");
}
// required header info and character set
header("Content-type:text/javascript; charset=UTF-8");
// cache control to process
header("Cache-Control:must-revalidate");
?>

$(function() {
   $.sublime_slideshow({
      src: [
         {url: "/templates/bodenleger-stockach/images/1.jpg"},
         {url: "/templates/bodenleger-stockach/images/2.jpg"},
         {url: "/templates/bodenleger-stockach/images/3.jpg"},
         {url: "/templates/bodenleger-stockach/images/4.jpg"},
         {url: "/templates/bodenleger-stockach/images/5.jpg"},
         {url: "/templates/bodenleger-stockach/images/6.jpg"}
      ],
      duration: 12,
      fade: 4,
      scaling: false,
      rotating: false,
      overlay: false
   });
});