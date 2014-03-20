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
);

$customtags = array(
    // garanbo meta tags
    '<meta property="og:site_name" content="' . $params->get('siteTitle') . '"/>',
    '<meta property="og:description" content="' . $doc->getDescription() . '" />',
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
// Robots if you wish
//unset($head['metaTags']['standard']['robots']);

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

// New meta
$doc->setMetadata('X-UA-Compatible', 'IE=edge,chrome=1');
$doc->setMetadata('viewport', 'width=device-width, initial-scale=1.0');
// Copyrights
$doc->setMetadata('copyright', htmlspecialchars($app->getCfg('sitename')));

$doc->setMetadata('google-site-verification', 'ilE9MeNgWLovl-eaqJcltldDd_ObYSJ7Wikfq2heAXQ');

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
