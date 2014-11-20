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

//TODO: wird nicht raus genommen?
unset($this->_styleSheets[JURI::root(true).'/media/com_phocagallery/css/main/bootstrap.min.css']);

?>
<div id="phocagallery-responsive" class="categories-view<?php echo $this->params->get( 'pageclass_sfx' ) ?> row">
<?php if ( $this->params->get( 'show_page_heading' ) ) { ?>
	<?php echo '<h1>'. $this->escape($this->params->get('page_heading')) . '</h1>';?>
<?php } ?>

<div id="pg-icons">
<?php echo PhocaGalleryRenderFront::renderFeedIcon('categories');?>
</div>

<?php if ($this->tmpl['categories_description'] != '') {?>
   <div class="csv-desc row" >
	<?php echo JHTML::_('content.prepare', $this->tmpl['categories_description']);?>
   </div>
<?php } ?>

<?php
// Obsolete methods
switch($this->tmpl['display_image_categories']) {

	case 0:
		echo $this->loadTemplate('obs_catimgdetailtitleonly');
	break;
	
	case 2:
		echo $this->loadTemplate('obs_catimgdetail');
	break;
	
	case 3:
		echo $this->loadTemplate('obs_catimgdetailfloat');
	break;
	
	case 4:
		echo $this->loadTemplate('obs_catimgdesc');
	break;
	
	case 5:
		echo $this->loadTemplate('obs_custom');
	break;
	
	case 1:
	default:
		echo $this->loadTemplate('categories');
	break;
}

echo $this->loadTemplate('pagination');
//echo $this->tmpl['tl'];
echo '</div>';