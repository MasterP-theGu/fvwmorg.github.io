<?php
//--------------------------------------------------------------------
//-  File          : @FILENAME@
//-  Project       : FVWM Home page
//-  Programmer    : Logo Competitor
//--------------------------------------------------------------------

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path."/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Logo Competition - VosVuur logos";
$link_name      = "Logo Competition";
$link_picture   = "pictures/icons/logo_competition";
$parent_site    = "news";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "logo_competition";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if (strlen($navigation_check) > 0) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("By VosVuur", "100%", ""); ?>

<p>
<!--
Date: Thu, 01 May 2003 05:03:04 -0400
From: VosVuur@netscape.net (VosVuur)
To: fvwm-logo@lists.sourceforge.net
Subject: [FVWM-LOGO] entry
X-Mailer: Atlas Mailer 2.0

[-- Attachment #1 --]
[-- Type: text/plain, Encoding: 8bit, Size: 0.6K --]

:)
-->
Heres an entry for the contest, all requested formats are done... pasted all
of them onto 1 transparent bg... cut at will... the 300x180 is unfortunately 49k
bs (as opposed to maximal 40kbs), I'm working on getting that down furthur.
<!--
not so far over tho :)
cheers
VosVuur
-->
</p>

<p><img src="jungle-set.png">

<?php decoration_window_end(); ?>

<p>Return to <a href="<?php echo conv_link_target('../../logos_new.php');?>">index</a>.</p>