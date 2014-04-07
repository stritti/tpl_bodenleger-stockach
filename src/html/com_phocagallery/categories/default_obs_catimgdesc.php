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
defined('_JEXEC') or die('Restricted access');
?>
<div id="categories-list" class="column">
   <?php for ($i = 0; $i < $this->tmpl['countcategories']; $i++) { ?>
      <div class="category-box row">
         <h3 class="large-12 column">
            <a href="<?php echo $this->categories[$i]->link; ?>"
               class="category<?php echo $this->params->get('pageclass_sfx'); ?>">
               <?php echo $this->categories[$i]->title_self; ?></a>
            <?php if ($this->categories[$i]->numlinks > 0) { ?>
               <small>(<?php echo $this->categories[$i]->numlinks; ?>)</small>
            <?php } ?>
         </h3>
         <div class="row column">
            <div class="large-4 medium-4 small-12 column">
               <a href="<?php echo $this->categories[$i]->link; ?>">
                  <?php
                  if (isset($this->categories[$i]->extpic) && $this->categories[$i]->extpic) {
                     $correctImageRes = PhocaGalleryPicasa::correctSizeWithRate($this->categories[$i]->extw, $this->categories[$i]->exth, $this->tmpl['picasa_correct_width'], $this->tmpl['picasa_correct_height']);
                     echo JHtml::_('image', $this->categories[$i]->linkthumbnailpath, str_replace('&raquo;', '-', $this->categories[$i]->title), array('width' => '100%', 'style' => '', 'class' => ''));
                  } else {
                     echo JHtml::_('image', $this->categories[$i]->linkthumbnailpath, str_replace('&raquo;', '-', $this->categories[$i]->title), array('width' => '100%', 'style' => '', 'class' => ''));
                  }
                  ?>
               </a>
            </div>
            <div class="large-8 medium-8 small-12 column">
               <?php if ($this->categories[$i]->description != '') { ?>
                  <?php echo $this->categories[$i]->description; ?>
               <?php } ?>
            </div>
         </div>
      </div>
   <?php } ?>
</div>