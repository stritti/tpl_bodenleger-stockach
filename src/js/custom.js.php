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

echo '
   $(function(){
        $.sublime_slideshow({
            src:[
            {url:"images/1.jpg"},
            {url:"images/2.jpg"},
            {url:"images/3.jpg"},
            {url:"images/4.jpg"},
            {url:"images/5.jpg"},
            {url:"images/6.jpg"}
            ],
            duration:   6,
            fade:       3,
            scaling:    false,
            rotating:   false,
            //overlay:    "images/pattern.png"
        });
    });';