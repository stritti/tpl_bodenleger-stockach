<?php
/*
  Copyright 2014
  An free open source Joomla! Template
  http://www.bodenleger-stockach.de
  By @stritti

  Full source at https://github.com/stritti/tpl_bodenleger-stockach
  Licensed under the MIT License (MIT) license. Please see LICENSE for more information.

  Our templates are downloadable for everyone and for free. You are allowed
  to modify this template to suite your needs and as you wish, the only thing not allowed
  is removing the backlink to www.bodenleger-stockach.de - if you like to move it,  place the link
  somewhere else in your site for example in your links section or impressum.
 */

defined('_JEXEC') or die;
$class = ' class="first"';
if (count($this->children[$this->category->id]) > 0 && $this->maxLevel != 0) :
   ?>
   <ul class="list-striped list-condensed">
      <?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
         <?php
         if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) :
            if (!isset($this->children[$this->category->id][$id + 1])) {
               $class = ' class="last"';
            }
            ?>
            <li<?php echo $class; ?>>
               <?php $class = ''; ?>
               <h4 class="item-title">
                  <a href="<?php echo JRoute::_(ContactHelperRoute::getCategoryRoute($child->id)); ?>">
                     <?php echo $this->escape($child->title); ?>
                  </a>

                  <?php if ($this->params->get('show_cat_items') == 1) : ?>
                     <span class="badge badge-info pull-right" title="<?php echo JText::_('COM_CONTACT_CAT_NUM'); ?>"><?php echo $child->numitems; ?></span>
                  <?php endif; ?>
               </h4>

               <?php if ($this->params->get('show_subcat_desc') == 1) : ?>
                  <?php if ($child->description) : ?>
                     <div class="category-desc">
                        <?php echo JHtml::_('content.prepare', $child->description, '', 'com_contact.category'); ?>
                     </div>
                  <?php endif; ?>
               <?php endif; ?>

               <?php
               if (count($child->getChildren()) > 0) :
                  $this->children[$child->id] = $child->getChildren();
                  $this->category = $child;
                  $this->maxLevel--;
                  echo $this->loadTemplate('children');
                  $this->category = $child->getParent();
                  $this->maxLevel++;
               endif;
               ?>
            </li>
         <?php endif; ?>
   <?php endforeach; ?>
   </ul>
<?php endif; ?>
