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

echo '<div id="phocagallery-responsive" class="categories-view'.$this->params->get( 'pageclass_sfx' ).' row">';
if ( $this->params->get( 'show_page_heading' ) ) { 
	echo '<h1>'. $this->escape($this->params->get('page_heading')) . '</h1>';
}

echo '<div id="pg-icons">';
echo PhocaGalleryRenderFront::renderFeedIcon('categories');
echo '</div>';
echo '<div class="ph-cb"></div>';

if ($this->tmpl['categories_description'] != '') {
	echo '<div class="csv-desc row" >'.JHTML::_('content.prepare', $this->tmpl['categories_description']).'</div>';
}

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