<?php

/*
 * Copyright 2014
 * An free open source Joomla! Template
 * http://www.bodenleger-stockach.de
 * By @stritti
 *
 *  Full source at https://github.com/stritti/tpl_bodenleger-stockach
 *  Licensed under the MIT License (MIT) license. Please see LICENSE for more information.
 *
 *  Our templates are downloadable for everyone and for free. You are allowed
 *  to modify this template to suite your needs and as you wish, the only thing not allowed
 *  is removing the backlink to www.bodenleger-stockach.de - if you like to move it,  place the link
 *  somewhere else in your site for example in your links section or impressum.
 */
defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$params = $app->getParams();
$head = $doc->getHeadData();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$pageclass = $params->get('pageclass_sfx');
$templateUrl = $doc->baseurl . '/templates/' . $doc->template;
$view = JRequest::getVar('view');
$component = JRequest::getVar('option');
$user = JFactory::getUser();

$metatags = array(
    // force latest IE & chrome frame
    'x-ua-compatible' => 'IE=edge,chrome=1',
    // viewport for media queries
    'viewport' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0',
    'copyright' => $app->getCfg('sitename'),
);

$customtags = array(
    // meta tags
    '<meta property="og:locale" content="' . $doc->language . '" />',
    '<meta property="og:title" content="' . $doc->getTitle() . '" />',
    '<meta property="og:description" content="' . $doc->getDescription() . '" />',
    '<meta property="og:url" content="' . JURI::current() . '" />',
    '<meta property="og:site_name" content="' . $app->getCfg('sitename') . '"/>',
    // apple touch icons
    '<link rel="apple-touch-icon-precomposed" href="' . $templateUrl . '/images/apple-touch-icon-57x57-precomposed.png">',
    '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $templateUrl . '/images/apple-touch-icon-72x72-precomposed.png">',
    '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $templateUrl . '/images/apple-touch-icon-114x114-precomposed.png">',
    '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $templateUrl . '/images/apple-touch-icon-144x144-precomposed.png">',
);

// productive javascripts
$prodScripts = array(
    '/js/modernizr.min.js',
    '/js/jquery.min.js',
    '/js/app.min.js',
    //'/js/jquery.fullscreenCycler.min.js',
    '/js/custom.min.js',
);

// debugging javascripts
$debugScripts = array(
    '/js/modernizr.js',
    '/js/jquery.js',
    '/js/app.js',
    //'/js/jquery.fullscreenCycler.js',
    '/js/custom.js',
);

// remove deprecated meta-data (html5)
unset($head['metaTags']['http-equiv']);
unset($head['metaTags']['standard']['title']);
unset($head['metaTags']['standard']['rights']);
unset($head['metaTags']['standard']['language']);

if ($user->guest) {
// Mootools remove for unregistered
   unset($head['scripts'][$doc->baseurl . '/media/system/js/mootools-core.js']);
   unset($head['scripts'][$doc->baseurl . '/media/system/js/mootools-more.js']);
   unset($head['scripts'][$doc->baseurl . '/media/system/js/core.js']);
   unset($head['scripts'][$doc->baseurl . '/media/system/js/modal.js']);

   unset($head['scripts'][$doc->baseurl . '/media/jui/js/jquery.js']);
   unset($head['scripts'][$doc->baseurl . '/media/jui/js/jquery.min.js']);
   unset($head['scripts'][$doc->baseurl . '/media/jui/js/jquery-noconflict.js']);
   unset($head['scripts'][$doc->baseurl . '/media/jui/js/jquery-migrate.js']);
   unset($head['scripts'][$doc->baseurl . '/media/jui/js/jquery-migrate.min.js']);
   unset($head['scripts'][$doc->baseurl . '/media/jui/js/bootstrap.js']);
   unset($head['scripts'][$doc->baseurl . '/media/jui/js/bootstrap.min.js']);
   unset($head['scripts'][$doc->baseurl . '/media/system/js/tabs-state.js']);
} else {
   //Styles sheets for admin
   $doc->addStyleSheet($doc->baseurl . '/templates/system/css/system.css');
   $doc->addStyleSheet($doc->baseurl . '/templates/system/css/general.css');
}
$doc->setHeadData($head);

//Remove or rewrite ($doc->setGenerator('your generator');)
$doc->setGenerator('');

// add metatags
foreach ($metatags as $metaname => $metacontent) {
   $doc->setMetadata($metaname, $metacontent);
}

// add customtags
foreach ($customtags as $customtag) {
   $doc->addCustomTag($customtag);
}

setPublisherTags($doc, $this->params);

if (JDEBUG == 0) {
   //add productive JavaScripts
   foreach ($prodScripts as $script) {
      $doc->addScript($templateUrl . $script);
   }
} else {
   //add development JavaScripts
   foreach ($debugScripts as $script) {
      $doc->addScript($templateUrl . $script);
   }
}

//Styles sheets
//$doc->addStyleSheet($this->baseurl . '/templates/system/css/system.css');
//$doc->addStyleSheet($this->baseurl . '/templates/system/css/general.css');
//rest of styles are loaded within following css
$doc->addStyleSheet($templateUrl . '/css/template.css.php?debug=' . JDEBUG . '&c=' . $component . '&v=' . $view);

/**
 * Calculate colums wether left or right sidebar is used
 * position-7: right sidebar
 * position-8: left sidebar
 */
if (!$this->countModules('position-8') && !$this->countModules('position-7')) {
   $showLeftSidebar = false;
   $showRightSidebar = false;
   $columnSizeContent = "large-12";
} else if ($this->countModules('position-8') && !$this->countModules('position-7')) {
   $showLeftSidebar = true;
   $showRightSidebar = false;

   $columnSizeContent = "large-9 medium-9 column end";
   $columnSizeLeftSideBar = "large-3 medium-3 column hide-on-print";
} else if ($this->countModules('position-7') && !$this->countModules('position-8')) {
   $showLeftSidebar = false;
   $showRightSidebar = true;

   $columnSizeContent = "large-9 medium-9";
   $columnSizeRightSideBar = "large-3 medium-3 column hide-on-print end";
} else {
   $showLeftSidebar = true;
   $showRightSidebar = true;

   $columnSizeContent = "large-6 medium-6 column";
   $columnSizeLeftSideBar = "large-3 medium-3 column hide-on-print";
   $columnSizeRightSideBar = "large-3 medium-3 column hide-on-print end";
}

function setPublisherTags($doc, $params) {
   if ($params->get('facebookFanpage') != NULL) {
      //Facebook Publisher
      $doc->addCustomTag('<meta property="article:publisher" content="' . $params->get('facebookFanpage') . '" />');
   }
   if ($params->get('googlePublisher') != NULL) {
      //Google+ Publisher
      $doc->addCustomTag('<link rel="publisher" href="' . $params->get('googlePublisher') . '" />');
   }
}

/**
 * Load the images for background slide show.
 * @param type $params
 * @return String JavaScript
 */
function getSlideImages($params) {
   $slideImageArray = "";
   $maximages = 6;

   for ($index = 1; $index <= $maximages; $index++) {
      $filename = $params->get('slide-' . $index);
      //if(file_exists($filename)) {
      //$slideImageArray .= '{url: "' . $filename . '"},';
      $slideImageArray .= ' "' . $filename . '"';
      if ($index < $maximages) {
         $slideImageArray .= ', ';
      }
      //}
   }
   return "var bslides = new Array(" . $slideImageArray . ");";
   //return "var bslides = [" . $slideImageArray . "];";
}

/**
 * Check wether there are modules in the bottom area.
 *
 * @return boolean true if there are modules in bottom area
 */
function hasBottomModules() {
   $retval = false;
   $doc = JFactory::getDocument();
   if ($doc->countModules('position-4') || $doc->countModules('position-5') || $doc->countModules('position-6')) {
      $retval = true;
   } else {
      $retval = false;
   }
   return $retval;
}
