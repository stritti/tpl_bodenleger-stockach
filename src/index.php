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

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';

$doc = JFactory::getDocument();
$templateUrl = $doc->baseurl . '/templates/' . $doc->template;
?><!DOCTYPE html>

<!--[if IE 9]><html class="lt-ie10" lang="<?php echo $doc->language; ?>"  > <![endif]-->
<html class="no-js" lang="<?php echo $doc->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
   <meta charset="utf-8">
   <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
   
   <link rel="dns-prefetch" href="//ajax.googleapis.com" />
   <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
   
   <jdoc:include type="head" />
</head>
<body class="antialiased" >
   <div id="fsCycler" class="hide-for-small hide-for-print"></div>
   <div id="nav" class="contain-to-grid hide-for-print">
      <nav class="top-bar" data-topbar>
         <ul class="title-area hide-for-medium-up">
            <li class="name"><a href="<?php echo $doc->baseurl; ?>"><?php echo $this->params->get('siteTitle'); ?></a></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
         </ul>
         <section id="navigation" class="top-bar-section">
            <jdoc:include type="modules" name="position-1" />
            <jdoc:include type="modules" name="position-0" />
         </section>
      </nav>
   </div>

   <div id="header" class="row hide-for-small" role="banner">
      <a href="<?php echo $doc->baseurl; ?>">
         <div class="logo">
            <div id="logo-name"><?php echo $this->params->get('siteTitle'); ?></div>
            <div id="logo-text"><?php echo $this->params->get('siteDescription'); ?></div>
         </div>
      </a>
   </div>

   <div id="banner" class="row">
      <jdoc:include type="modules" name="banner" />
   </div>
   <div id="breadcrumb" class="row hide-for-small">
      <jdoc:include type="modules" name="position-2" />
   </div>

   <div id="content" class="row">
      <?php if ($showLeftSidebar) { ?>
         <div id="left-sidebar" class="<?php echo $columnSizeLeftSideBar; ?>">
            <jdoc:include type="modules" name="position-8" />
         </div>
      <?php } ?>
      <main id="component" class="<?php echo $columnSizeContent; ?>">
         <jdoc:include type="component" />
      </main>
      <?php if ($showRightSidebar) { ?>
         <div id="right-sidebar" class="<?php echo $columnSizeRightSideBar; ?>">
            <jdoc:include type="modules" name="position-7" />
         </div>
      <?php } ?>
   </div>
   <?php if(hasBottomModules()){ ?>
   <div id="bottom" class="row">
      <div id="bottom-1" class="large-4 medium-4 column">
         <jdoc:include type="modules" name="position-4" />
      </div>
      <div id="bottom-2" class="large-4 medium-4 column">
         <jdoc:include type="modules" name="position-5" />
      </div>
      <div id="bottom-3" class="large-4 medium-4 column end">
         <jdoc:include type="modules" name="position-6" />
      </div>
   </div>
   <?php } ?>
   <footer id="footer" class="row">
      <div id="footer-1" class="large-2 medium-2 small-12 column">
         <img src="<?php echo $templateUrl; ?>/images/bodenleger-j-schmid-stockach.png" alt="Bodenleger J. & J. Schmid GbR" />
      </div>
      <div id="footer-2" class="large-3 medium-3 small-12 column">
         <jdoc:include type="modules" name="position-9" style="footer"/>
      </div>
      <div id="footer-3" class="large-3 medium-3 small-12 column">
         <jdoc:include type="modules" name="position-10" style="footer"/>
      </div>
      <div id="footer-4" class="large-3 medium-3 small-12 column">
         <jdoc:include type="modules" name="position-11" style="footer"/>
      </div>
      <div id="footer-5" class="large-1 medium-1 small-12 end column">
         <div>
         <?php if ($this->params->get('facebookFanpage') != " ") { ?>
            <a class="webicon facebook" href="<?php echo $this->params->get('facebookFanpage'); ?>">Facebook</a>
         <?php } ?>
         <?php if ($this->params->get('googlePublisher') != " ") { ?>
            <a class="webicon googleplus" href="<?php echo $this->params->get('googlePublisher'); ?>">Google+</a>
         <?php } ?>
         <?php if ($this->params->get('twitterAccount') != " ") { ?>
            <a class="webicon twitter" href="<?php echo $this->params->get('twitterAccount'); ?>">Twitter</a>
         <?php } ?>
         </div> 
      </div>
   </footer>
   <div id="copyright" class="row">
      <div class="large-12 column">
         <jdoc:include type="modules" name="copyright" />
      </div>
   </div>  
<jdoc:include type="modules" name="debug" />
<script><?php echo getSlideImages($this->params); //custom Tag, because addScript has wrong order...?></script>
<script src="<?php echo $templateUrl; ?>/js/jquery.fullscreenCycler.min.js"></script>
<script src="<?php echo $templateUrl; ?>/js/final.js?debug=<?php echo JDEBUG; ?>&c=<?php echo $component; ?>&v=<?php echo $view; ?>" type="text/javascript"></script>
<?php if($this->params->get('googleAnalytics') != "") { ?>
<script type="text/javascript">
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
   ga('create', '<?php echo $this->params->get('googleAnalytics'); ?>', 'auto');
   ga('set', 'anonymizeIp', true);
   ga('require', 'linkid');
   ga('send', 'pageview');
</script>
<?php } ?>
</body>
</html>
