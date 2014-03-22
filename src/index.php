<?php
/*
 * License: Creative Commons Attribution 2.5 License
 *
 * Our templates are downloadable for everyone and for free. You are allowed
 * to modify this template to suite your needs and as you wish, the only thing not allowed
 * is removing the backlink to www.bodenleger-stockach.de - if you like to move it,  place the link
 * somewhere else in your site for example in your links section or impressum.
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';
?><!DOCTYPE html>

<!--[if IE 9]><html class="lt-ie10" lang="<?php echo $doc->language; ?>"  > <![endif]-->
<html class="no-js" lang="<?php echo $doc->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
   <meta charset="utf-8">
   <jdoc:include type="head" />

   <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-29149707-1']);
      _gaq.push(['_trackPageview']);

      (function() {
         var ga = document.createElement('script');
         ga.type = 'text/javascript';
         ga.async = true;
         ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
         var s = document.getElementsByTagName('script')[0];
         s.parentNode.insertBefore(ga, s);
      })();
   </script>
</head>
<body itemscope itemtype="http://schema.org/WebPage" class="antialiased" >

   <div class="contain-to-grid">
      <nav class="top-bar" data-topbar>
         <ul class="title-area">
            <li class="name">
               <h1><a href="<?php echo $doc->baseurl; ?>"><?php echo $this->params->get('siteTitle'); ?></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
         </ul>

         <section id="navigation" class="top-bar-section">
            <jdoc:include type="modules" name="position-1" />
         </section>

         <jdoc:include type="modules" name="position-0" />
      </nav>
   </div>

   <header id="header" class="row" role="banner">
      <a href="<?php echo $doc->baseurl; ?>">
         <div class="logo">
            <h1 class="logo-name"><?php echo $this->params->get('siteTitle'); ?></h1>
            <h2 class="logo-text"><?php echo $this->params->get('siteDescription'); ?></h2>
         </div>
      </a>
   </header>

   <div id="banner" class="row">
      <jdoc:include type="modules" name="banner" />
   </div>

   <div class="nav">
      <div class="hmenu-extra1">
         <jdoc:include type="modules" name="extra1" />
      </div>
      <div class="hmenu-extra2">
         <jdoc:include type="modules" name="extra2" />
      </div>
      <jdoc:include type="modules" name="user3" />
   </div>

   <div id="breadcrumb" class="row">
      <jdoc:include type="modules" name="position-2" />
   </div>

   <div id="top" class="row">
      <div id="top1" class="small-4">
         <jdoc:include type="modules" name="top1" />
      </div>
      <div id="top2" class="small-4">
         <jdoc:include type="modules" name="top2" />
      </div>
      <div id="top3" class="small-4">
         <jdoc:include type="modules" name="top3" />
      </div>
   </div>

   <div id="content" class="row">
      <?php if($showLeftSidebar) { ?>
      <div id="leftSidebar" class="<?php echo $columnSizeLeftSideBar;?>">
         <jdoc:include type="modules" name="position-8" />
      </div>
      <?php } ?>
      <main id="component" class="<?php echo $columnSizeContent;?>">
         <jdoc:include type="component" />
      </main>
      <?php if($showRightSidebar) { ?>
      <div id="rightSidebar" class="<?php echo $columnSizeRightSideBar;?>">
         <jdoc:include type="modules" name="position-7" />
      </div>
      <?php } ?>
   </div>

   <div id="bottom" class="row">
      <div id="bottom-1" class="large-4 medium-4 column">
         <jdoc:include type="modules" name="position-4" />
      </div>
      <div id="bottom-2" class="large-4 medium-4 column">
         <jdoc:include type="modules" name="position-5" />
      </div>
      <div id="bottom-3" class="large-4 medium-4 column">
         <jdoc:include type="modules" name="position-6" />
      </div>
   </div>

   <footer id="footer" class="row" role="contentinfo">
      <div id="user1" class="small-4">
         <img src="<?php echo $templateUrl; ?>/images/bodenleger-j-schmid-stockach.png" alt="Bodenleger J. & J. Schmid GbR" />
         <jdoc:include type="modules" name="user1" />
      </div>
      <div id="user2" class="small-4">
         <jdoc:include type="modules" name="user2" />
      </div>
      <div id="user3" class="small-4">
         <jdoc:include type="modules" name="user3" />
      </div>
      <div id="user4" class="small-4">
         <jdoc:include type="modules" name="user4" />
      </div>
      <div id="user5" class="small-4">
         <jdoc:include type="modules" name="user5" />
      </div>
   </footer>

   <div id="syndicate" class="small-4">
      <jdoc:include type="modules" name="syndicate" />
   </div>

   <div id="copyright" class="row">
      <jdoc:include type="modules" name="copyright" />
   </div>

   <script>
      $(document).foundation();
   </script>
<jdoc:include type="modules" name="debug" />
</body>
</html>