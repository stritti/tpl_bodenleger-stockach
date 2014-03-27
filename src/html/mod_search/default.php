<?php
/*
 * Copyright 2014
 * An free open source Joomla! Template
 * http://www.bodenleger-stockach.de
 * By @stritti
 *
 * Licensed under the Apache 2.0 license. Please see LICENSE for more information.
 */

defined('_JEXEC') or die;
?>
<ul class="right">
   <li class="has-form">
      <form action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-inline">
         <div class="search<?php echo $moduleclass_sfx ?> row">
            <?php
            $output = '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> ';
            $output .= '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '" type="text" size="' . $width . '" placeholder="' . $text . '" />';

            if ($button) :
               if ($imagebutton) :
                  $btn_output = ' <input type="image" value="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
               else :
                  $btn_output = ' <button class="button btn btn-primary" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
               endif;

               switch ($button_pos) :
                  case 'top' :
                     $output = $btn_output . '<br />' . $output;
                     break;

                  case 'bottom' :
                     $output .= '<br />' . $btn_output;
                     break;

                  case 'right' :
                     $output .= $btn_output;
                     break;

                  case 'left' :
                  default :
                     $output = $btn_output . $output;
                     break;
               endswitch;

            endif;

            echo $output;
            ?>
            <input type="hidden" name="task" value="search" />
            <input type="hidden" name="option" value="com_search" />
            <input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
         </div>
      </form>
   </li>
</ul>
