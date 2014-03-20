<?php
/*
 * Leading Blog-Item
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php
$images = json_decode($this->item->images);
echo $this->item->event->beforeDisplayContent;
?>
<li class="large-12">
   <div >
      <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>"
         title="<?php echo $this->escape($this->item->title); ?>">
         <img src="<?php echo htmlspecialchars($images->image_intro); ?>"
              alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"
              title="<?php echo $this->escape($this->item->title); ?>"
              class="blog-img"/>
      </a>
      <div class="orbit-caption">
         <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>"
            title="<?php echo $this->escape($this->item->title); ?>">
            <h2><?php echo $this->escape($this->item->title); ?></h2>
            <?php if ($images->image_intro_caption) { ?>
               <div class="orbit-intro">
                  <?php echo htmlspecialchars($images->image_intro_caption); ?>
               </div>
            <?php } ?>
         </a>
      </div>
   </div>
</li>
<?php echo $this->item->event->afterDisplayContent; ?>