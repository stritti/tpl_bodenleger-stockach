<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

 <?php /** start leading-article * */ ?>
    <div class="small-12 columns">
        <?php if (!empty($this->lead_items)) {
            foreach ($this->lead_items as &$item) {
                $this->item = &$item;
                echo $this->loadTemplate('leading');
            }
        } ?>
    </div>
    <?php /** end leading-article * */ ?>

    <div style="clear: both; height: 40px;"></div>
    
    
     <?php /** start garanbo 1 2 3 **/?>
       
     <div class="row large-12 large-centered columns">
      <?php  
          $zone = "garanbo-home-teaser";
          $modules =& JModuleHelper::getModules($zone);
          $attribs['style'] = 'xhtml';
          foreach ($modules as $module){
             echo JModuleHelper::renderModule($module, $attribs);
          }?>
       </div>
    
    <div style="clear: both; height: 40px;"></div>
    
    <div class="row home large-12 large-centered columns">
    <?php /** start bottom boxes * */ ?>
    <div class="three-boxes small-12 large-4 columns">
          <?php
          $zone = "content-bottom-a";
          $modules =& JModuleHelper::getModules($zone);
          $attribs['style'] = 'xhtml';
          foreach ($modules as $module){
             echo JModuleHelper::renderModule($module, $attribs);
          }
          ?>
    </div>
    <div class="three-boxes small-12 large-4 columns">
          <?php
          $zone = "content-bottom-b";
          $modules =& JModuleHelper::getModules($zone);
          $attribs['style'] = 'xhtml';
          foreach ($modules as $module){
             echo JModuleHelper::renderModule($module, $attribs);
          }
          ?>
    </div>
    
    <div class="three-boxes large-4 hide-for-small columns">
          <?php
          $zone = "content-bottom-c";
          $modules =& JModuleHelper::getModules($zone);
          $attribs['style'] = 'xhtml';
          foreach ($modules as $module){
             echo JModuleHelper::renderModule($module, $attribs);
          }
          ?>
    </div>
       
        <div class="three-boxes large-12 small-12 columns">
          <?php
          $zone = "content-bottom-large";
          $modules =& JModuleHelper::getModules($zone);
          $attribs['style'] = 'xhtml';
          foreach ($modules as $module){
             echo JModuleHelper::renderModule($module, $attribs);
          }
          ?>
    </div>
       
<!--    <div class="signup small-12 large-3 columns">
        <h2>Neu bei garanbo?</h2>
        <p>Nutzen Sie garanbo, um Ihre Garantieunterlagen effizient zu verwalten.</p>
		<p id="signup-btn">
                    <a href="/component/users/?view=registration" id="signup_submit" tabindex="10">
                    <span>Jetzt anfangen ›</span>
                    </a>
                </p>
	<p>Benachrichtigung vor Ablauf der Garantie oder bei Produktrückrufen. Schnelles Auffinden der Unterlagen.</p> 
    </div>-->
    <?php /** end bottom boxes * */ ?>
    
</div>
