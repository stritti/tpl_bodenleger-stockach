<?php
/*
 * License: The MIT License (MIT)
 *
 * Our templates are downloadable for everyone and for free. You are allowed
 * to modify this template to suite your needs and as you wish, the only thing not allowed
 * is removing the backlink to www.bodenleger-stockach.de - if you like to move it,  place the link
 * somewhere else in your site for example in your links section or impressum.
 */

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

/**
 * Shuffle an array.
 * see http://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
 */
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {
    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

var backgroundSlides = [
   {url: "/templates/bodenleger-stockach/images/1.jpg"},
   {url: "/templates/bodenleger-stockach/images/2.jpg"},
   {url: "/templates/bodenleger-stockach/images/3.jpg"},
   {url: "/templates/bodenleger-stockach/images/4.jpg"},
   {url: "/templates/bodenleger-stockach/images/5.jpg"},
   {url: "/templates/bodenleger-stockach/images/6.jpg"}];
backgroundSlides= shuffle(backgroundSlides);

$(function() {
   $.sublime_slideshow({
      src: backgroundSlides,
      duration: 12,
      fade: 4,
      scaling: false,
      rotating: false,
      overlay: false
   });
});