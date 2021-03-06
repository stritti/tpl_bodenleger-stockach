<?php

defined('_JEXEC') or die;

$class = ' class="first row columns"';
$lang	= JFactory::getLanguage();

if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
         if (!isset($this->items[$this->parent->id][$id + 1])) {
            $class = ' class="last row columns"';
         }
		?>
		<div <?php echo $class; ?> >
		<?php $class = ''; ?>
			<h3 class="page-header item-title large-12">
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>"><?php echo $this->escape($item->title); ?></a>
				<?php if ($this->params->get('show_cat_num_articles_cat') == 1) {?>
					<span class="small" title="<?php echo JHtml::tooltipText('COM_CONTENT_NUM_ITEMS'); ?>"><?php echo $item->numitems; ?></span>
            <?php } ?>
				<?php if (count($item->getChildren()) > 0) { ?>
					<a href="#category-<?php echo $item->id;?>" data-toggle="collapse" data-toggle="button" class="btn btn-mini pull-right"><span class="icon-plus"></span></a>
            <?php }?>
			</h3>
			<?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) { ?>
            <div class="large-4 medium-4 small-12"><img src="<?php echo $item->getParams()->get('image'); ?>" width="100%" class="th"/></div>
         <?php } ?>
			<?php if ($this->params->get('show_subcat_desc_cat') == 1) { ?>
				<?php if ($item->description) : ?>
					<div class="large-12">
						<?php echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
					</div>
				<?php endif; ?>
			<?php } ?>

			<?php if (count($item->getChildren()) > 0) :?>
				<div class="collapse fade" id="category-<?php echo $item->id;?>">
				<?php
				$this->items[$item->id] = $item->getChildren();
				$this->parent = $item;
				$this->maxLevelcat--;
				echo $this->loadTemplate('items');
				$this->parent = $item->getParent();
				$this->maxLevelcat++;
				?>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
