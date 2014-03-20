<?php
/**
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

$params = $this->item->params;
$images = json_decode($this->item->images);

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$dispatcher = JDispatcher::getInstance();
$dispatcher->trigger('onContentPrepare', array('com_content.article', &$this->item, &$this->item->params, 0));

?>

<?php
 if ($this->item->state == 0) {
    //do not render unpublished articles!
 } else {
    
 ?>
<article class="home-leading <?php if ($this->item->state == 0) echo 'unpublished' ?>">

    <div class="row">
        
          <?php /** Begin intro image * */
          $textcolumns = 12;
        
          if (isset($images->image_intro) and !empty($images->image_intro)) { 
                $textcolumns = 6; ?>
       
                <img src="<?php echo htmlspecialchars($images->image_intro); ?>"
                title="<?php echo htmlspecialchars($images->image_intro_caption); ?>"
                alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"
                class="small-12 large-6 columns"/>
 
         <?php } ?>
        
       
         <div class="small-12 large-<?php echo $textcolumns?> columns">
            <?php if ($params->get('show_title')) { ?>
                <div class="large-12 small-12 columns">
                    <h2><?php echo $this->escape($this->item->title); ?></h2>
                </div>
            <?php } ?>
            <div class="large-12 small-12 columns start-page-content">
                <?php echo $this->item->introtext; ?>
            </div>
        </div>
    </div>
</article>
 <?php } ?>