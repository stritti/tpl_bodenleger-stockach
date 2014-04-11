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
   <div class="vcard">
      <?php if ($this->params->get('marker_address') > 0) : ?>
         <span class="<?php echo $this->params->get('marker_class'); ?>" >
            <?php echo $this->params->get('marker_address'); ?>
         </span>
      <?php endif; ?>
      <ul class="adr">
         <?php if ($this->contact->name && $this->params->get('show_name')) : ?>
            <li class="fn"><?php echo $this->contact->name; ?></li>
         <?php endif; ?>

         <?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
            <li class="street-address"><?php echo nl2br($this->contact->address); ?></li>
         <?php endif; ?>
         <li>
            <?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
               <span class="postal-code"><?php echo $this->contact->postcode; ?></span>
            <?php endif; ?>
            <?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
               <span class="locality"><?php echo $this->contact->suburb; ?></span>
            <?php endif; ?>
         </li>
         <?php if ($this->contact->state && $this->params->get('show_state')) : ?>
            <li class="state"><?php echo $this->contact->state; ?></li>
         <?php endif; ?>
         <?php if ($this->contact->country && $this->params->get('show_country')) : ?>
            <li class="country-name"><?php echo $this->contact->country; ?></li>
         <?php endif; ?>
      </ul>
   <?php endif; ?>


   <?php if ($this->params->get('show_email') || $this->params->get('show_telephone') || $this->params->get('show_fax') || $this->params->get('show_mobile') || $this->params->get('show_webpage')) : ?>
      <ul class="">
      <?php endif; ?>
      <?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
         <li>
            <span class="<?php echo $this->params->get('marker_class'); ?>" >
               <i class="fi-mail"></i> <?php //echo $this->params->get('marker_email'); ?>
            </span>
            <span class="contact-emailto">
               <?php echo $this->contact->email_to; ?>
            </span>
         </li>
      <?php endif; ?>

      <?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
         <li>
            <span class="<?php echo $this->params->get('marker_class'); ?>" >
               <i class="fi-telephone"></i><?php //echo $this->params->get('marker_telephone'); ?>
            </span>
            <span class="tel work">
               <?php echo nl2br($this->contact->telephone); ?>
            </span>
         </li>
      <?php endif; ?>
      <?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
         <li>
            <span class="<?php echo $this->params->get('marker_class'); ?>" >
               <?php echo $this->params->get('marker_fax'); ?>
            </span>
            <span class="tel fax"> <?php echo nl2br($this->contact->fax); ?></span>
         </li>
      <?php endif; ?>
      <?php if ($this->contact->mobile && $this->params->get('show_mobile')) : ?>
         <li>
            <span class="<?php echo $this->params->get('marker_class'); ?>" >
               <?php echo $this->params->get('marker_mobile'); ?>
            </span>
            <span class="tel mobile">
               <!--a href="tel:<?php echo preg_replace("/[\+\D]/",'', $this->contact->mobile); ?>" -->
               <?php echo nl2br($this->contact->mobile); ?>
               <!-- /a -->
            </span>
         </li>
      <?php endif; ?>
      <?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
         <li>
            <span class="<?php echo $this->params->get('marker_class'); ?>" >
               <?php echo $this->params->get('marker_webpage'); ?>
            </span>
            <span class="url">
               <a href="<?php echo $this->contact->webpage; ?>"><?php echo $this->contact->webpage; ?></a>
            </span>
         </li>
      <?php endif; ?>

      <?php if ($this->params->get('show_email') || $this->params->get('show_telephone') || $this->params->get('show_fax') || $this->params->get('show_mobile') || $this->params->get('show_webpage')) : ?>
      </ul>
   <?php endif; ?>
</div>