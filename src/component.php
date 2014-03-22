<?php
defined('_JEXEC') or die;
?><!DOCTYPE html>

<!--[if IE 9]><html class="lt-ie10" lang="<?php echo $doc->language; ?>"  > <![endif]-->
<html class="no-js" lang="<?php echo $doc->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta charset="utf-8">
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/css/print.css" type="text/css" />
</head>
<body class="contentpane">
<jdoc:include type="message" />
<jdoc:include type="component" />
</body>
</html>
