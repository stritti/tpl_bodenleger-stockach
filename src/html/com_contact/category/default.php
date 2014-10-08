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
?>
<div class="large-12 contact-category<?php echo $this->pageclass_sfx; ?>">
   <?php if ($this->params->get('show_page_heading')) : ?>
      <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
   <?php endif; ?>
   <?php if ($this->params->get('show_category_title', 1)) : ?>
      <h2><?php echo JHtml::_('content.prepare', $this->category->title, '', 'com_contact.category.title'); ?></h2>
   <?php endif; ?>
   <?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
      <div class="large-12 category-desc">
         <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
            <img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
         <?php endif; ?>
         <?php if ($this->params->get('show_description') && $this->category->description) : ?>
            <?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_contact.category'); ?>
         <?php endif; ?>
      </div>
   <?php endif; ?>

   <?php echo $this->loadTemplate('items'); ?>

   <?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
      <div class="cat-children">
         <h3><?php echo JText::_('JGLOBAL_SUBCATEGORIES'); ?></h3>
         <?php echo $this->loadTemplate('children'); ?>
      </div>
   <?php endif; ?>
</div>