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
?>
<ul class="breadcrumbs<?php echo $moduleclass_sfx; ?>" >
   <?php
   for ($i = 0; $i < $count; $i++) {
      // If not the last item in the breadcrumbs add the separator
      if ($i < $count -1) {
         if (!empty($list[$i]->link)) {
            echo '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
            echo '<a itemprop="url" href="' . $list[$i]->link . '"><span itemprop="title">' . $list[$i]->name . '</span></a>';
            echo '</li>';
         } else {
            echo '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">' . $list[$i]->name . '</span></li>';
         }
      }  elseif ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
          echo '<li itemprop="title" class="current">'. $list[$i]->name.'</li>';
      }
   }
   ?>
</ul>