<?php
//--------------------------------------------------------------------
//-  File          : documentation/manpages/template.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// This is an autogenerated file, use manpages2php to create it.

//--------------------------------------------------------------------
// this manpages should not appear in the navigation structure
// so we hide its contents from navgen
//--------------------------------------------------------------------
if(isset($navigation_check)) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include_once("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Man page - fvwm-root";
$heading        = "FVWM - Man page - fvwm-root";
$link_name      = "Man page";
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "manpages";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual page for fvwm-root in unstable branch (2.5.8)"); ?>

<H1>FVWM-ROOT</H1>
Section: FVWM Utilities (1)<BR>Updated: 25 April 2002<BR><A HREF="#index">This page contents</A>
 - <a href="<?php echo conv_link_target('./');?>">Return to main index</A><HR>


<P>
<A NAME="lbAB">&nbsp;</A>
<H2>NAME</H2>

fvwm-root - Sets the root window of the current X display to image
<P>
<A NAME="lbAC">&nbsp;</A>
<H2>SYNOPSIS</H2>

<B><u>fvwm-root</u></B>

[<B>--retain-pixmap</B>|<B>-r</B>]

[<B>--no-retain-pixmap</B>]

[<B>--dummy</B>|<B>-d</B>]

[<B>--no-dummy</B>]

[<B>--dither</B>]

[<B>--no-dither</B>]

[<B>--color-limit</B>

[<I>ncolors</I>] ]

[<B>--no-color-limit</B>]

[<B>--help</B>|<B>-h</B>|<B>-?</B>]

[<B>--version</B>|<B>-V</B>]

<I>image_file</I>

<P>
<A NAME="lbAD">&nbsp;</A>
<H2>DESCRIPTION</H2>

<I>fvwm-root</I>

reads the image file specified in the command line and displays it in the
root window.  The supported image formats are
<I>XBM</I>, <I>XPM</I> and <I>PNG</I>

if appropriated libraries are compiled in.
<P>
<A NAME="lbAE">&nbsp;</A>
<H2>OPTIONS</H2>

These command line options are recognized by fvwm-root:
<DL COMPACT>
<DT><B>--retain-pixmap</B> | <B>-r</B>

<DD>
Causes fvwm-root to retain and publish the Pixmap with which the background
has been set (the ESETROOT_PMAP_ID and _XROOTPMAP_ID properties are used).
This is useful for applications which want to use the root
Pixmap on the background to simulate transparency (for example,
Eterm and Aterm use this method). This option should also be used for the
RootTransparent colorset option, refer to the COLORSETS section of <a href="<?php echo conv_link_target('./fvwm.php');?>">fvwm</a>(1).
If this option is not used, fvwm-root sets the _XSETROOT_ID property to
None, and some programs, like FVWM modules, may use this to update their
background if the background is transparent (Transparent colorset).
<P>
Note, a well behaved program, like fvwm, should listen to both _XSETROOT_ID
and _XROOTPMAP_ID property changes and update itself correspondingly.
However some programs listen only to one of them, so you should either use
this option or not depending on what part is implemented by these programs.
You should also use this option to get fast root-transparent menus in fvwm.
<DT><B>--no-retain-pixmap</B>

<DD>
This is a default. May be useful to explicitely force the default even
if &quot;--retain-pixmap&quot; is specified earlier.
<DT><B>--dummy</B> | <B>-d</B>

<DD>
Causes fvwm-root NOT to set the background, but to only free a memory
associated with the ESETROOT_PMAP_ID property (if any).
In any case the _XSETROOT_ID property is set to None.
<DT><B>--no-dummy</B>

<DD>
This is a default. May be useful to explicitely force the default even
if &quot;--dummy&quot; is specified earlier.
<DT><B>--dither</B>

<DD>
Causes fvwm-root to dither images for &quot;smoother&quot; rendition on displays
with color depth of 16 or lower. This the defaut with color depth  less
or equal to 8.
<DT><B>--no-dither</B>

<DD>
Causes fvwm-root NOT to dither images. This is the default with color depth
greater than 8.
<DT><B>--color-limit </B><I>ncolors</I>

<DD>
Causes fvwm-root to limit its color use to
<I>ncolors</I>

(if specified). This option is taken in account only with color depth  less
or equal to 8 (and a TrueColor or GrayScale visual). The default is
to use the same color limit than fvwm. So in normal situation this option
is not useful. However, if fvwm use a private colors map, as fvwm-root
always use the default colors map you should use this option for
limiting colors correctly. If
<I>ncolors</I>

is not specified a default is used.
<DT><B>--no-color-limit</B>

<DD>
Causes fvwm-root NOT to limit its color use.
<DT><B>--help</B>

<DD>
Shows a short usage.
<DT><B>--version</B>

<DD>
Shows a version number.
<P>
</DL>
<A NAME="lbAF">&nbsp;</A>
<H2>COMPATIBILITY</H2>

In the past this utility was called
<I>xpmroot</I>.

This name is still supported as a symlink.
<P>
<A NAME="lbAG">&nbsp;</A>
<H2>BUGS</H2>

Repeated use of fvwm-root with different xpm pixmaps will use up slots in
your color table pretty darn fast.
<P>
<A NAME="lbAH">&nbsp;</A>
<H2>AUTHOR</H2>

Rob Nation
<P>
Rewritten and enhanced by fvwm-workers.
<P>

<HR>
<A NAME="index">&nbsp;</A><H2>Index</H2>
<DL>
<DT><A HREF="#lbAB">NAME</A><DD>
<DT><A HREF="#lbAC">SYNOPSIS</A><DD>
<DT><A HREF="#lbAD">DESCRIPTION</A><DD>
<DT><A HREF="#lbAE">OPTIONS</A><DD>
<DT><A HREF="#lbAF">COMPATIBILITY</A><DD>
<DT><A HREF="#lbAG">BUGS</A><DD>
<DT><A HREF="#lbAH">AUTHOR</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 00:48:09 GMT, November 01, 2003


<?php decoration_window_end(); ?>

<!-- Automatically generated by manpages2php on 01-Nov-2003 -->
