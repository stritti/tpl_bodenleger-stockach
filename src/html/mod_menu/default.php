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
$user = JFactory::getUser();

// Note. It is important to remove spaces between elements.

$tag = '';
if ($params->get('tag_id') != NULL) {
   $tag = $params->get('tag_id') . '';
}
?>

<ul class="<?php echo $class_sfx; ?>" id="<?php echo $tag; ?>">
   <?php
   foreach ($list as $i => &$item) {
      $class = 'item-' . $item->id;
      if ($item->id == $active_id) {
         $class .= ' current';
      }

      if (in_array($item->id, $path)) {
         $class .= ' active';
      } elseif ($item->type == 'alias') {
         $aliasToId = $item->params->get('aliasoptions');
         if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
            $class .= ' active';
         } elseif (in_array($aliasToId, $path)) {
            $class .= ' alias-parent-active';
         }
      }

      if ($item->deeper) {
         $class .= ' has-dropdown';
      }

      if ($item->parent) {
         $class .= ' parent';
      }

      if (!empty($class)) {
         $class = ' class="' . trim($class) . '"';
      }

      echo '<li' . $class . '>';

      // Render the menu item.
      switch ($item->type) {
         case 'separator':
         case 'url':
         case 'component':
            require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
            break;

         default:
            require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
            break;
      }

      // The next item is deeper.
      if ($item->deeper) {
         echo '<ul class="dropdown">';
      }
      // The next item is shallower.
      elseif ($item->shallower) {
         echo '</li>';
         echo str_repeat('</ul></li>', $item->level_diff);
      }
      // The next item is on the same level.
      else {
         echo '</li>';
      }
   }
   ?>
</ul>