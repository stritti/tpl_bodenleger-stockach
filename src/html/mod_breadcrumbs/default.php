<?php
/**
 *
 */

// no direct access
defined('_JEXEC') or die;
?>
<ul class="breadcrumbs<?php echo $moduleclass_sfx; ?>" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
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