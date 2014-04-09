<?php
/**
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

$params = $this->item->params;
$images = json_decode($this->item->images);
$app = JFactory::getApplication();

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$dispatcher = JDispatcher::getInstance();
$dispatcher->trigger('onContentPrepare', array('com_content.article', &$this->item, &$this->item->params, 0));

$article_details_show = ((intval($this->item->modified) != 0 && $params->get('show_modify_date')) ||
        ($params->get('show_author') && ($this->item->author != "")) || ($params->get('show_create_date')) ||
        ($params->get('show_pdf_icon') || $params->get('show_print_icon') ||
        $params->get('show_email_icon')));


/** get Link for Read More * */
if ($params->get('access-view')) {
   $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
} else {
   $menu = JFactory::getApplication()->getMenu();
   $active = $menu->getActive();
   $itemId = $active->id;
   $link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
   $returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
   $link = new JURI($link1);
   $link->setVar('return', base64_encode($returnURL));
}
?>
<section class="article row column large-12 <?php if ($this->item->state == 0) { echo 'unpublished';} ?>">
      <?php if ($params->get('show_title')) { /** Begin Article Title */ ?>
      <h2 class="large-12">
         <?php if ($params->get('link_titles')) { ?>
            <a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>"><?php echo $this->escape($this->item->title); ?></a>
         <?php } else { ?>
         <?php echo $this->escape($this->item->title); ?>
      <?php } ?>
      </h2>
   <?php }/** End Article Title * */ ?>
   <?php if (!$params->get('show_intro')) { ?>
      <?php echo $this->item->event->afterDisplayTitle; ?>
   <?php } ?>
   <?php echo $this->item->event->beforeDisplayContent; ?>

<?php if (isset($images->image_intro) and ! empty($images->image_intro)) { /** Begin intro image * */ ?>
   <?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
      <div class="large-6 medium-6 <?php echo $imgfloat; ?>">
         <a href="<?php echo $link; ?>" >
            <img src="<?php echo htmlspecialchars($images->image_intro); ?>"
                 title="<?php echo htmlspecialchars($images->image_intro_caption); ?>"
                 alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>" />
               <?php if ($images->image_intro_caption) { /** Begin caption under image * */ ?>
               <div class="image-caption">
               <?php echo htmlspecialchars($images->image_intro_caption); ?>
               </div>
      <?php } /** End caption under image* */ ?>
         </a>
      </div>
      <?php } /** End Intro Image * */ ?>
   <div class="large-12 medium-12 small-12 end">
      <?php echo $this->item->introtext; ?>
      <?php if ($params->get('show_readmore') && $this->item->readmore) { /** Begin Read More * */ ?>
         <?php
         if ($params->get('access-view')) {
            $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
         } else {
            $menu = JFactory::getApplication()->getMenu();
            $active = $menu->getActive();
            $itemId = $active->id;
            $link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
            $returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug));
            $link = new JURI($link1);
            $link->setVar('return', base64_encode($returnURL));
         }
         ?>
            <a href="<?php echo $link; ?>" class="readmore button tiny radius">
               <?php
               if (!$params->get('access-view')) :
                  echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
               elseif ($readmore = $this->item->alternative_readmore) :
                  echo $readmore;
                  if ($params->get('show_readmore_title', 0) != 0) :
                     echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
                  endif;
               elseif ($params->get('show_readmore_title', 0) == 0) :
                  echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
               else :
                  echo JText::_('COM_CONTENT_READ_MORE');
                  echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
               endif;
               ?></a>
<?php } ?>
<?php echo $this->item->event->afterDisplayContent; ?>
   </div>
</section>