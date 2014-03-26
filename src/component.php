<?php
defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

$doc->addStyleSheet($this->baseurl .'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl .'/templates/system/css/general.css');
$doc->addStyleSheet($tpath.'/css/print.css?v=1');
?><!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
 <jdoc:include type="head" />
</head>
<body class="contentpane">
 <jdoc:include type="message" />
 <jdoc:include type="component" />
 <?php if ($_GET['print'] == '1') echo '<script type="text/javascript">window.print();</script>'; ?>
</body>
</html>
