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
/*
 * Leading Blog-Item
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php
$images = json_decode($this->item->images);

?>
<h2 class="large-12"><?php echo $this->escape($this->item->title); ?></h2>
<?php echo $this->item->event->beforeDisplayContent; ?>
<div class="large-12">   
   <?php if($images->image_intro) { ?>
      <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>"
         title="<?php echo $this->escape($this->item->title); ?>">
         <img src="<?php echo htmlspecialchars($images->image_intro); ?>"
              alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"
              title="<?php echo $this->escape($this->item->title); ?>"
              class="blog-img" width="100%"/>
      </a>
   <?php } ?>
   <div class="large-12">
      <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>"
         title="<?php echo $this->escape($this->item->title); ?>">

         <?php if ($images->image_intro_caption) { ?>
            <div class="caption"><?php echo htmlspecialchars($images->image_intro_caption); ?></div>
         <?php } ?>
      </a>
   </div>
</div>
<?php echo $this->item->event->afterDisplayContent; ?>