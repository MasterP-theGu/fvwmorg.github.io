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
$title          = "FVWM - Man page - FvwmAuto";
$heading        = "FVWM - Man page - FvwmAuto";
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

<?php decoration_window_start("Manual page for FvwmAuto in stable branch (2.4.16)"); ?>

<H1>FvwmAuto</H1>
Section: User Commands  (1)<BR>Updated: 3 July 2001<BR><A HREF="#index">This page contents</A>
 - <a href="<?php echo conv_link_target('./');?>">Return to main index</A><HR>


<A NAME="lbAB">&nbsp;</A>
<H2>NAME</H2>

<I>FvwmAuto</I> - the FVWM auto-raise module
<A NAME="lbAC">&nbsp;</A>
<H2>SYNOPSIS</H2>

<I>FvwmAuto</I> is spawned by fvwm, so no command line invocation will work.
The correct syntax is:
<blockquote><PRE>Module FvwmAuto Timeout [EnterCommand [LeaveCommand]]

AddToMenu Modules
+ &quot;Auto Raise (300 ms)&quot;  Module FvwmAuto 300
+ &quot;Auto Raise/Lower&quot;     Module FvwmAuto 300 &quot;Silent Raise&quot; &quot;Silent Lower&quot;</PRE></blockquote>
<P>




The <I>Timeout</I> argument is required. It specifies how long a window must
retain the keyboard input focus before the command is executed. The
delay is measured in milliseconds, and any integer 0 or greater is
acceptable.
<P>
<I>EnterCommand</I> and <I>LeaveCommand</I> are optional.
<I>EnterCommand</I> is executed <I>Timeout</I> milliseconds after a
window gets the input focus, <I>LeaveCommand</I> is executed
<I>Timeout</I> milliseconds after the window has lost focus.
Note that you always should use the 'Silent' keyword before
the command itself.  FvwmAuto prepends &quot;Silent &quot; to the command
string on its own if yor forget this.  Without this prefix fvwm would
ask you for a window to act on if the window has died before the
command sent by FvwmAuto has been processed by fvwm.  This can for
example happen with popup menus.
<P>
&quot;Silent Raise&quot; is the default for <I>EnterCommand</I>, but any fvwm function
is allowed. I would not use &quot;Close&quot; or &quot;Destroy&quot; with a low timeout,
though.  The <I>LeaveCommand</I> can be handy for a tidy desktop.
Experiment with:
<blockquote><PRE>Module FvwmAuto 0 Nop &quot;Silent Lower&quot;
Module FvwmAuto 0 Nop &quot;Silent Iconify&quot;</PRE></blockquote>
<P>



<P>
More complex example (three FvwmAuto's are running):
<blockquote><PRE>DestroyFunc RestoreIconified
AddToFunc   RestoreIconified
+ I Current (Iconic) Iconify false

DestroyFunc RegisterFocus
AddToFunc   RegisterFocus
+ I Exec echo &quot;`date +%T` $n focussed&quot; &gt;&gt;/tmp/focus-stats.txt

DestroyFunc RegisterUnfocus
AddToFunc   RegisterUnfocus
+ I Exec echo &quot;`date +%T` $n unfocussed&quot; &gt;&gt;/tmp/focus-stats.txt

KillModule FvwmAuto
Module FvwmAuto 250 Raise Nop
Module FvwmAuto 800 RestoreIconified Nop
Module FvwmAuto   0 RegisterFocus RegisterUnfocus</PRE></blockquote>
<P>



<P>
<A NAME="lbAD">&nbsp;</A>
<H2>NOTES</H2>

<P>
There is a special Raise/Lower support in FvwmAuto. It was added to improve
Raise/Lower callbacks, since most of FvwmAuto usages is auto-raising or
auto-lowering. This imrovement includes locking on M_RAISE_WINDOW and
M_LOWER_WINDOW packets and not raising/lowering explicitely raised windows.
The special Raise/Lower support is enabled only when either
<I>EnterCommand</I> or <I>LeaveCommand</I> contain substring &quot;Raise&quot; or
&quot;Lower&quot;. You can use this fact to enable/disable any special support by
renaming these commands, if FvwmAuto does not automatically do want you
expect it to do.
<P>
<A NAME="lbAE">&nbsp;</A>
<H2>AUTHOR</H2>

<PRE>
FvwmAuto just appeared one day, nobody knows how.
FvwmAuto was simply rewritten 09/96, nobody knows by whom.

</PRE>
<HR>
<A NAME="index">&nbsp;</A><H2>Index</H2>
<DL>
<DT><A HREF="#lbAB">NAME</A><DD>
<DT><A HREF="#lbAC">SYNOPSIS</A><DD>
<DT><A HREF="#lbAD">NOTES</A><DD>
<DT><A HREF="#lbAE">AUTHOR</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 17:47:35 GMT, May 30, 2003


<?php decoration_window_end(); ?>

<!-- Automatically generated by manpages2php on 30-May-2003 -->
