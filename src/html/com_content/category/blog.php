<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$cparams = JComponentHelper::getParams('com_media');
$document = JFactory::getDocument();
$app = JFactory::getApplication();
$tpath = '/templates/' . $app->getTemplate();

$scripts = array(
    'modernizr.js',
    'foundation.js',
    'foundation/foundation.orbit.js'
);

JHtml::_('garanbo.jquery');
JHtml::_('garanbo.custom', 'foundation', substr($tpath, 1) . '/', $scripts);

?>
<header>
   <?php if ($this->params->get('show_page_heading')) { ?>
      <h1 id="heading" class="row large-12 columns"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
   <?php } ?>

   <?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) { ?>
      <h2 id="subheading" class="subheader gray row large-12 columns hide-for-small">
         <?php echo $this->escape($this->params->get('page_subheading')); ?>
         <?php if ($this->params->get('show_category_title')) : ?>
            <?php echo $this->category->title; ?>
         <?php endif; ?>
      </h2>
   <?php } ?>

   <?php /** start Description */ ?>
   <?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) { ?>
        <div id="description" class="row large-12 columns">
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

<div class="blog row large-12 columns <?php echo $this->pageclass_sfx; ?>">

  <?php /** Start leading Articles in Content Slider **/?>
      <div id="leading" class="row large-12 hide-for-small columns">
         <?php
         /** Begin Leading Articles only for large-Style* */
         /** show leading galery  only on first page-> limitstart==0 * */
         $leadingcount = 0;
         if (!empty($this->lead_items) && $this->pagination->limitstart == 0) {
            ?>
            <div class="slideshow-wrapper">
               <div class="preloader"></div>
               <ul data-orbit>
                  <?php
                  //Tabs
                  foreach ($this->lead_items as &$item) {
                     $this->item = &$item;
                     echo $this->loadTemplate('leading');
                     $leadingcount++;
                  }
                  ?>
               </ul>
            </div>
            <?php
            /** End Leading Articles * */
         } else {
            $i = $this->pagination->limitstart;
         }
         ?>
   </div>

   <?php
   /** Begin Articles * */
   $itemcounter = 0; //counting the items printed
   $itemrowcounter = 0; //counting the items per row 
   $largeColumns = 6; //Columns for Large Style
   if (!empty($this->items)) {
      ?>

      <div class="row">
         <?php
         foreach ($this->items as $key => &$item) {

            if ($itemrowcounter > 1) { //If more then one item per row, continue
               $itemrowcounter--;
               continue;
            }

            $itemsperrow = floor(12 / $largeColumns);
            $rowcount = ( ((int) $key - 1) % (int) $this->columns) + 1;
            $row = $counter / $this->columns;

            if ($itemcounter < $leadingcount) { /** if item already printed as lead-item * */
               ?>

               <div class="small-12 small-centered show-for-small columns <?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
                  <?php
                  /** print item only for small-style * */
                  $this->item = &$item;
                  echo $this->loadTemplate('item');
                  $itemcounter++;
                  $key = $key + 1;
                  ?>
               </div>

            <?php } else { //here starts a new row  ?>
               <div class="blogcontent">
                  <?php
                  $itemrowcounter = 0; // reset the itemrowcounter for each row

                  while ($itemsperrow > 0 && $this->items[$key] != null) { //do for each item in a row 
                     ?> 

                     <div class="large-<?php echo $largeColumns; ?> medium-12 small-12 columns <?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
                        <?php
                        $this->item = $this->items[$key];
                        echo $this->loadTemplate('item');
                        $key = $key + 1;
                        $itemcounter++;
                        $itemsperrow--;
                        $itemrowcounter++;
                        ?>
                  </div>
                  <?php } ?>  
               </div>
         <?php
            }
         }
         ?>
      </div>
   <?php } /** End Articles * */ ?>

   <?php if (!empty($this->link_items)) : ?>
      <div class="row">
         <?php echo $this->loadTemplate('links'); ?>
      </div>
   <?php endif; ?>
   <div id="blogFooter" class="row">
      <?php
      /** Begin Pagination * */
      if ($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) {
         ?>
         <div class="large-12 columns">
            <div class="pagination pagination-centered">
               <?php echo $this->pagination->getPagesLinks(); ?>
            </div>
            <?php if ($this->params->def('show_pagination_results', 1)) { ?>
               <div class="pagination-results">
                  <?php echo $this->pagination->getPagesCounter(); ?>
               </div>
            <?php } ?>
         </div>
      <?php } /** End Pagination * */ ?>
      <?php
      /** Begin Article Links * */
      if ($this->params->def('num_links', 4) && ($i < $this->total)) {
         ?>
         <div class="large-12 columns">
            <?php
            $this->links = array_splice($this->items, $i - $this->pagination->limitstart);
            echo $this->loadTemplate('links');
            ?>
         </div>
      <?php }/** End Article Links * */ ?>
   </div>
</div><?php /** End Blog * */ ?>
