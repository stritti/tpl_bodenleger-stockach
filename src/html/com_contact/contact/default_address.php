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

if (($this->params->get('address_check') > 0) &&
        ($this->contact->address || $this->contact->suburb || $this->contact->state || $this->contact->country || $this->contact->postcode)) :
   ?>
   <?php if ($this->params->get('marker_address') > 0) : ?>
      <span class="<?php echo $this->params->get('marker_class'); ?>" ><?php echo $this->params->get('marker_address'); ?></span>
   <?php endif; ?>
   <div class="vcard large-6 medium-9 small-12 ">
      <?php if ($this->contact->image && $this->params->get('show_image')) { ?>
         <?php echo JHtml::_('image', $this->contact->image, $this->contact->name, array('class' => 'large-4 column th')); ?>
         <div class="large-8 column">
      <?php } else { ?>
         <div class="large-12 column">
      <?php } ?>
         <ul class="adr">
            <?php if ($this->contact->name && $this->params->get('show_name')) { ?>
               <li class="fn"><?php echo $this->contact->name; ?></li>
            <?php } ?>
            <?php if ($this->contact->address && $this->params->get('show_street_address')) { ?>
               <li class="street-address"><?php echo nl2br($this->contact->address); ?></li>
            <?php } ?>
            <li>
               <?php if ($this->contact->postcode && $this->params->get('show_postcode')) { ?>
                  <span class="postal-code"><?php echo $this->contact->postcode; ?></span>
               <?php } ?>
               <?php if ($this->contact->suburb && $this->params->get('show_suburb')) { ?>
                  <span class="locality"><?php echo $this->contact->suburb; ?></span>
               <?php } ?>
            </li>
            <?php if ($this->contact->state && $this->params->get('show_state')) { ?>
               <li class="state"><?php echo $this->contact->state; ?></li>
            <?php } ?>
            <?php if ($this->contact->country && $this->params->get('show_country')) { ?>
               <li class="country-name"><?php echo $this->contact->country; ?></li>
            <?php } ?>
         </ul>
       </div>
   <?php endif; ?>


   <?php if ($this->params->get('show_email') || $this->params->get('show_telephone') || $this->params->get('show_fax') || $this->params->get('show_mobile') || $this->params->get('show_webpage')) : ?>
      <?php echo $this->loadTemplate('communication'); ?>
   <?php endif; ?>
</div>