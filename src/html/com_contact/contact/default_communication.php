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
?>

<ul class="large-12 column">
   <?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
      <li>
         <i class="fi-mail" title="<?php echo $this->params->get('marker_email'); ?>"></i>
         <span class="contact-emailto"><?php echo $this->contact->email_to; ?></span>
      </li>
   <?php endif; ?>
   <?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
      <li>
         <i class="fi-telephone" title="<?php echo $this->params->get('marker_telephone'); ?>"></i>
         <span class="tel work"><?php echo nl2br($this->contact->telephone); ?></span>
      </li>
   <?php endif; ?>
   <?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
      <li>
         <span class="<?php echo $this->params->get('marker_class'); ?>" ><?php echo $this->params->get('marker_fax'); ?></span>
         <span class="tel fax"> <?php echo nl2br($this->contact->fax); ?></span>
      </li>
   <?php endif; ?>
   <?php if ($this->contact->mobile && $this->params->get('show_mobile')) : ?>
      <li>
         <span class="<?php echo $this->params->get('marker_class'); ?>" ><?php echo $this->params->get('marker_mobile'); ?></span>
         <span class="tel mobile">
            <!--a href="tel:<?php echo preg_replace("/[\+\D]/", '', $this->contact->mobile); ?>" -->
            <?php echo nl2br($this->contact->mobile); ?>
            <!-- /a -->
         </span>
      </li>
   <?php endif; ?>
   <?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
      <li>
         <span class="<?php echo $this->params->get('marker_class'); ?>" ><?php echo $this->params->get('marker_webpage'); ?></span>
         <span class="url"><a href="<?php echo $this->contact->webpage; ?>"><?php echo $this->contact->webpage; ?></a></span>
      </li>
   <?php endif; ?>
</ul>