<?php
/**
 * 
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$cparams = JComponentHelper::getParams('com_media');
$document = JFactory::getDocument();
$app = JFactory::getApplication();
$tpath = '/templates/' . $app->getTemplate();
?>

<div class="blog<?php echo $this->pageclass_sfx; ?> large-12 column">

   <header class="row">
      <?php if ($this->params->get('show_page_heading', 1)) { ?>
         <h1 id="heading" class="large-12"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
      <?php } ?>

      <?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) { ?>
         <h2 id="subheading" class="large-12 hide-for-small">
            <?php echo $this->escape($this->params->get('page_subheading')); ?>
            <?php if ($this->params->get('show_category_title')) { ?>
               <?php echo $this->category->title; ?>
            <?php } ?>
         </h2>
      <?php } ?>

      <?php if ($this->params->get('show_tags', 1) && !empty($this->category->tags->itemTags)) { ?>
         <?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
         <?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
      <?php } ?>

      <?php /** start Description */ ?>
      <?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) { ?>
         <div id="description" class="large-12">
            <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) { ?>
               <div class="large-3 medium-3 hide-for-small columns">
                  <img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
               </div>
            <?php } ?>
            <?php if ($this->params->get('show_description') && $this->category->description) { ?>
               <div class="large-9 medium-9 small-12 columns">
                  <?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
               </div>
            <?php } ?>
         </div>
      <?php } /** End Description * */ ?>
   </header>

   <?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) { ?>
      <?php if ($this->params->get('show_no_articles', 1)) { ?>
         <p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
      <?php } ?>
   <?php } ?>
   <?php if (!empty($this->lead_items)) { ?>
      <div id="leading" class="row">
         <?php
         foreach ($this->lead_items as &$item) {
            $this->item = &$item;
            echo $this->loadTemplate('item');
         }
         ?>
      </div>
   <?php }/** End Leading Articles */ ?>

   <?php if (!empty($this->intro_items)) { ?>
      <?php $counter = 0; ?>
      <div class="row">
         <?php foreach ($this->intro_items as $key => &$item) { ?>
            <?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
            <?php if ($rowcount == 1) : ?>
               <?php $row = $counter / $this->columns; ?>
            <?php endif; ?>
            <div class="large-<?php echo round((12 / $this->columns)); ?> <?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
               <?php
               $this->item = & $item;
               echo $this->loadTemplate('item');
               // end item
               $counter++;
               ?>
            </div>
            <?php if (($rowcount == $this->columns) or ( $counter == $introcount)) : ?>

            <?php endif; ?>
         <?php } ?>
      </div>
   <?php } /** End Intro  Articles */ ?>

   <?php if (!empty($this->link_items)) : ?>
      <div class="items-more">
         <?php echo $this->loadTemplate('links'); ?>
      </div>
   <?php endif; ?>

   <?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
      <div class="cat-children">
         <?php if ($this->params->get('show_category_heading_title_text', 1) == 1) : ?>
            <h3> <?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?> </h3>
         <?php endif; ?>
         <?php echo $this->loadTemplate('children'); ?> </div>
   <?php endif; ?>
   <?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
      <div class="pagination">
         <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
         <?php endif; ?>
         <?php echo $this->pagination->getPagesLinks(); ?> </div>
   <?php endif; ?>
</div>