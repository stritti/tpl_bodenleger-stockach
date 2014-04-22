<?php
defined('_JEXEC') or die('Restricted access');
$app = JFactory::getApplication();
// - - - - - - - - - -
// Images
// - - - - - - - - - -

$firstImage = NULL; //set first Image below for meta tags;
?>

<?php if (!empty($this->items)) { ?>

   <ul data-orbit>

      <?php foreach ($this->items as $ck => $cv) { ?>

         <?php
         if ($this->checkRights == 1) {
            // USER RIGHT - Access of categories (if file is included in some not accessed category) - - - - -
            // ACCESS is handled in SQL query, ACCESS USER ID is handled here (specific users)
            $rightDisplay = 0;
            if (isset($cv->catid) && isset($cv->cataccessuserid) && isset($cv->cataccess)) {
               $rightDisplay = PhocaGalleryAccess::getUserRight('accessuserid', $cv->cataccessuserid, $cv->cataccess, $this->tmpl['user']->getAuthorisedViewLevels(), $this->tmpl['user']->get('id', 0), 0);
            }
            // - - - - - - - - - - - - - - - - - - - - - -
         } else {
            $rightDisplay = 1;
         }
         // Display back button to categories list
         if ($cv->item_type == 'categorieslist') {
            $rightDisplay = 1;
         }
         ?>
         <?php if ($rightDisplay == 1) { ?>

            <li>
               <?php //echo ' title="' . htmlentities($cv->odesctitletag, ENT_QUOTES, 'UTF-8') . '"'; ?>
               <?php
               // Correct size for external Image (Picasa) - subcategory
               if (isset($cv->extid)) {
                  $extImage = PhocaGalleryImage::isExtImage($cv->extid);
               } else {
                  $extImage = false;
               }
               ?>
               <?php
               if ($extImage) {
                  echo JHtml::_('image', $cv->extm, $cv->altvalue, array('class' => 'pg-image'));
                  if($firstImage === NULL) {
                     $firstImage =  $cv->extm;
                  }
               } else {
                  if(property_exists($cv, 'oimgalt')) {
                     $alt = $cv->oimgalt;
                  } else {
                     $alt = $cv->altvalue;
                  }
                  echo JHtml::_('image', $cv->link, $alt,  array('class' => 'pg-image'));

                  if($firstImage === NULL) {
                     $firstImage =  $cv->link;
                  }
               }
               ?>

               <div class="orbit-caption">
                  <h4><?php echo $cv->title; ?></h4>

                  <?php
                  // Tags
                  if ($cv->type == 2 && isset($cv->otags) && $cv->otags != '') {
                     echo '<div class="pg-cv-tags">' . $cv->otags . '</div>' . "\n";
                  }
                  ?>
                  <?php
                  // Description in Box
                  if ($this->tmpl['display_img_desc_box'] == 1 && $cv->description != '') {
                     echo '<div class="pg-cv-descbox">' . strip_tags($cv->description) . '</div>' . "\n";
                  } else if ($this->tmpl['display_img_desc_box'] == 2 && $cv->description != '') {
                     echo '<div class="pg-cv-descbox">' . (JHtml::_('content.prepare', $cv->description, 'com_phocagallery.image')) . '</div>' . "\n";
                  }
                  ?>
               </div>
            </li>
         <?php } ?>
      <?php } ?>
   </ul>

   <?php

   if($firstImage != NULL) {
      $doc = JFactory::getDocument();
      $doc->addCustomTag('<meta property="og:image" content="' . $firstImage . '" />');
      $doc->addCustomTag('<link rel="image_src" href="' . $firstImage . '" />');
   }
} else {
   // Will be not displayed
   //echo JText::_('COM_PHOCAGALLERY_THERE_IS_NO_IMAGE');
}