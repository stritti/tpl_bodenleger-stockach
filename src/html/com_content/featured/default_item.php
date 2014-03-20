<?php
/*
 * Leading Blog-Item
 */
?>
<?php
$images = json_decode($this->item->images);
$params = $this->item->params;
?>
<li>
   <div class="default-item small-12 columns">
       <div class="row">
       
           <?php /** Begin intro image * */
          $textcolumns = 12;
        
          if (isset($images->image_intro) and !empty($images->image_intro)) { 
                $textcolumns = 6; ?>
       
                <img src="<?php echo htmlspecialchars($images->image_intro); ?>"
                title="<?php echo htmlspecialchars($images->image_intro_caption); ?>"
                alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"
                class="small-12 large-6 columns"/>
 
         <?php } /** End caption under image* */?>
         <div class="small-12 large-<?php echo $textcolumns?> columns">
            <?php if ($params->get('show_title')) { ?>
                <div class="default-item-caption large-12 small-12 columns">
                    <h2><small>
                     <?php echo $this->escape($this->item->title); ?>
                    </small></h2>
                </div>
            <?php } ?>

            <div class="default-item-text large-12 small-12 columns">
                <?php echo $this->item->introtext; ?>
            </div>
        </div>
      </div>
   </div>
</li>
