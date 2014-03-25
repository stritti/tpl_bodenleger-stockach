<?php
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