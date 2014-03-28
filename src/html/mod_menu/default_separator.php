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
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';

$arraytitle = explode("||",$item->title);

if(count($arraytitle)>1){
	$item->title=$arraytitle[1];
	switch($arraytitle[0]){
		case "#":
			$linktype="break";
			break;
		case "*#":
			$linktype = "<span class=\"blanktext\">&nbsp;</span>";
			break;
		case "modul":
			$document = JFactory::getDocument();
			$menumodul = &JModuleHelper::getModule($arraytitle[2],$arraytitle[1]);
			$renderer = $document->loadRenderer('module');
			?><div class="menumodul"><?php echo $renderer->render($menumodul, array('style' => $arraytitle[3])); ?></div><?php
			return;
			break;
		case "**":
			$linktype="<strong>".$arraytitle[1]."</strong>";
			break;
		default:
			$linktype = "<span class=\"title\">".$arraytitle[0]."</span><span class=\"title\">".$arraytitle[1]."</span>";
			break;
	}
}
else $linktype = $item->title;

if ($item->menu_image) {
	$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}


?><span class="separator"><?php echo $title; ?><?php echo $linktype; ?></span>