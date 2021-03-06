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
// No direct access
defined('_JEXEC') or die;

$app = JFactory::getApplication();
// Create shortcuts to some parameters.
$templateparams = $app->getTemplate(true)->params;
$params = $this->item->params;
$images = json_decode($this->item->images);

$urls = json_decode($this->item->urls);
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$document = JFactory::getDocument();
$server = JURI::root();
$canonical = $this->escape($this->item->readmore_link);

$document->addCustomTag('<link rel="canonical" href="' . $canonical . '"/>');
$document->addCustomTag('<meta property="og:title" content="' . $this->escape($this->item->title) . '"/>');
$document->addCustomTag('<meta property="og:type" content="article"/>');
$document->addCustomTag('<meta property="og:url" content="' . $canonical . '"/>');
if ($images->image_fulltext != "") {
   $document->addCustomTag('<meta property="og:image" content="' . $server . $images->image_fulltext . '" />');
   $document->addCustomTag('<link rel="image_src" href="' . $server . $images->image_fulltext . '" />');
}
$article_details_show = ((intval($this->item->modified) != 0 && $this->params->get('show_modify_date')) || ($this->params->get('show_author') && ($this->article->author != "")) || ($this->params->get('show_create_date')) || ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')));

$useDefList = (($params->get('show_author')) or ( $params->get('show_category')) or ( $params->get('show_parent_category')) or ( $params->get('show_create_date')) or ( $params->get('show_modify_date')) or ( $params->get('show_publish_date')) or ( $params->get('show_hits')));

/**
 *
 * @return String HTML of Author
 */
function getAuthor() {
   $retval = NULL;
   $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author);

   if (!empty($this->item->contactid) && $params->get('link_author') == true) {
      $retval = JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', JRoute::_('index.php?option=com_contact&view=contact&id=' . $this->item->contactid), $author));
   } else {
      $retval = JText::sprintf('COM_CONTENT_WRITTEN_BY', $author);
   }

   return $retval;
}
?>
<article class="article<?php echo $this->pageclass_sfx ?> large-12">
   <?php if ($this->params->get('show_page_heading')) { ?>
      <hgroup class="large-12">
         <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
         <?php
         if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
            echo $this->item->pagination;
         }
         ?>
         <?php /** Begin Article Sec/Cat * */
         if (($params->get('show_parent_category') && $this->item->parent_id != 1) || ($params->get('show_category'))) {
            ?>

         <?php }/** End Article Sec/Cat */ ?>
         <?php if ($params->get('show_title')) { ?>
            <h2><?php echo $this->escape($this->item->title); ?></h2>
         <?php } ?>
      </hgroup>
      <?php
      // END show_page_heading
   } else {
      ?>
      <?php if ($params->get('show_title')) { ?>
         <h1 class="large-12"><?php echo $this->escape($this->item->title); ?></h1>
      <?php
      }
   }
   ?>

<?php if (!$params->get('show_intro')) {
   echo $this->item->event->afterDisplayTitle;
} ?>
<?php echo $this->item->event->beforeDisplayContent; ?>

   <dl class="large-12">
      <?php if ($params->get('show_create_date')) : ?>
         <dd class="create">
            <small><?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC1'))); ?></small>
         </dd>
      <?php endif; ?>
      <?php if ($params->get('show_modify_date')) : ?>
         <dd class="modified">
            <small><?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC1'))); ?></small>
         </dd>
      <?php endif; ?>
      <?php if ($params->get('show_publish_date')) : ?>
         <dd class="published">
            <small><?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC1'))); ?></small>
         </dd>
   <?php endif; ?>
   </dl>


      <?php if ($useDefList) : ?>
      <dl>
         <?php if ($params->get('show_author') && !empty($this->item->author)) : ?>
            <dd class="createdby"><?php echo getAuthor(); ?> </dd>
      <?php endif; ?>
      <?php if ($params->get('show_hits')) : ?>
            <dd class="hits"><?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $this->item->hits); ?></dd>
      <?php endif; ?>
      </dl>
      <?php endif; ?>

   <?php if (isset($this->item->toc)) { ?>
      <div class="small-12 columns">
      <?php echo $this->item->toc; ?>
      </div>
   <?php } ?>

   <?php
   if (isset($urls) AND ( (!empty($urls->urls_position) AND ( $urls->urls_position == '0')) OR ( $params->get('urls_position') == '0' AND empty($urls->urls_position) )) OR ( empty($urls->urls_position) AND ( !$params->get('urls_position')))) {
      ?>
         <?php echo $this->loadTemplate('links'); ?>
      <?php } ?>
   <div id="article" class="row large-12 columns">

<?php if (isset($images->image_fulltext) and ! empty($images->image_fulltext)) { ?>
   <?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>

         <div class="<?php echo htmlspecialchars($imgfloat); ?> large-6 medium-6 small-12 image-fulltext">
            <img src="<?php echo htmlspecialchars($images->image_fulltext); ?>"
                 title="<?php echo htmlspecialchars($images->image_fulltext_caption); ?>"
                 alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" width="100%"/>
         <?php if ($images->image_fulltext_caption) { ?>
               <div class="image-caption"><?php echo htmlspecialchars($images->image_fulltext_caption); ?></div>
         <?php } ?>
         </div>
      <?php } ?>

      <?php
      if (!empty($this->item->pagination) AND $this->item->pagination AND ! $this->item->paginationposition AND ! $this->item->paginationrelative) {
         echo $this->item->pagination;
      }
      ?>

   <?php echo $this->item->text; ?>
   </div>


   <?php if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND ! $this->item->paginationrelative): ?>
      <div class="pagenav large-12">
      <?php echo $this->item->pagination; ?>
      </div>
   <?php endif; ?>

   <?php if (isset($urls) AND ( (!empty($urls->urls_position) AND ( $urls->urls_position == '1')) OR ( $params->get('urls_position') == '1') )): ?>
      <?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?>
</article>