<?php

defined('_JEXEC') or die;

jimport('joomla.html.html');

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
    'copyright' => htmlspecialchars($app->getCfg('sitename')),
);

$customtags = array(
    // meta tags
    '<meta property="og:locale" content="' . $doc->language . '" />',
    '<meta property="og:type" content="website" />',
    '<meta property="og:title" content="' . $doc->getTitle() . '" />',
    '<meta property="og:description" content="' . $doc->getDescription() . '" />',
    '<meta property="og:url" content="' . JURI::current() . '" />',
    '<meta property="og:site_name" content="' . $params->get('siteTitle') . '"/>',
    //Google+ Publisher
    '<link rel="publisher" href="' . $params->get('googlePublisher') . '" />',
    // apple touch icons
    '<link rel="apple-touch-icon-precomposed" href="' . $templateUrl . '/images/apple-touch-icon-57x57-precomposed.png">',
    '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $templateUrl . '/images/apple-touch-icon-72x72-precomposed.png">',
    '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $templateUrl . '/images/apple-touch-icon-114x114-precomposed.png">',
    '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $templateUrl . '/images/apple-touch-icon-144x144-precomposed.png">',
);

// javascripts
$scripts = array(
    '/js/vendor/modernizr.js',
    '/js/vendor/jquery.js',
    '/js/vendor/fastclick.js',
    '/js/foundation.min.js',
    '/js/jquery.sublimeSlideshow.js',
    '/js/custom.js',
);

// remove deprecated meta-data (html5)
unset($head['metaTags']['http-equiv']);
unset($head['metaTags']['standard']['title']);
unset($head['metaTags']['standard']['rights']);
unset($head['metaTags']['standard']['language']);

if ($user->guest) {
// Mootools remove for unregistered
   unset($head['scripts'][$this->baseurl . '/media/system/js/mootools-core.js']);
   unset($head['scripts'][$this->baseurl . '/media/system/js/mootools-more.js']);
   unset($head['scripts'][$this->baseurl . '/media/system/js/core.js']);
//unset($head['scripts'][$this->baseurl . '/media/system/js/caption.js']);
   unset($head['scripts'][$this->baseurl . '/media/system/js/modal.js']);

   unset($head['scripts'][$this->baseurl . '/media/jui/js/jquery.js']);
   unset($head['scripts'][$this->baseurl . '/media/jui/js/jquery-migrate.js']);
   unset($head['scripts'][$this->baseurl . '/media/jui/js/jquery.min.js']);
   unset($head['scripts'][$this->baseurl . '/media/jui/js/jquery-noconflict.js']);
   unset($head['scripts'][$this->baseurl . '/media/jui/js/jquery-migrate.js']);
   unset($head['scripts'][$this->baseurl . '/media/jui/js/jquery-migrate.min.js']);
   unset($head['scripts'][$this->baseurl . '/media/jui/js/bootstrap.js']);
   unset($head['scripts'][$this->baseurl . '/media/system/js/tabs-state.js']);
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

//JA SCripts
foreach ($scripts as $script) {
   $doc->addScript($templateUrl . $script);
}

//Styles sheets
$doc->addStyleSheet($this->baseurl . '/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl . '/templates/system/css/general.css');
$doc->addStyleSheet($templateUrl . '/css/template.css.php?debug=' . JDEBUG . '&c=' . $component . '&v=' . $view);


/**
 * Calculate colums wether left or right sidebar is used
 * position-7: right sidebar
 * position-8: left sidebar
 */
if ($this->error || !$this->countModules('position-8') && !$this->countModules('position-7')) {
   $showLeftSidebar = false;
   $showRightSidebar = false;
   $columnSizeContent = "large-12";
} else if ($this->countModules('position-8') && !$this->countModules('position-7')) {
   $showLeftSidebar = true;
   $showRightSidebar = false;

   $columnSizeContent = "large-9 medium-8 column";
   $columnSizeLeftSideBar = "large-3 medium-4 column hide-on-print";
} else if ($this->countModules('position-7') && !$this->countModules('position-8')) {
   $showLeftSidebar = false;
   $showRightSidebar = true;

   $columnSizeContent = "large-9 medium-8";
   $columnSizeRightSideBar = "large-3 medium-4 column hide-on-print";
} else {
   $showLeftSidebar = true;
   $showRightSidebar = true;

   $columnSizeContent = "large-6 medium-6 column";
   $columnSizeLeftSideBar = "large-3 medium-3 column hide-on-print";
   $columnSizeRightSideBar = "large-3 medium-3 column hide-on-print";
}