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
if (strlen("$navigation_check") > 0) return;

$rel_path = "../../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include("$rel_path/definitions.inc");

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
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	if (strlen($layout) > 0) {
		$file = "$rel_path/layout_$layout.inc";
		if (file_exists($file)) $layout_file = $file;
	}
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual page for FvwmAuto in unstable branch (2.5.7)"); ?>

<H1>FvwmAuto</H1>
Section: FVWM Modules (1)<BR>Updated: 25 April 2002<BR><A HREF="#index">This page contents</A>
 - <a href="./">Return to main index</A><HR>


<A NAME="lbAB">&nbsp;</A>
<H2>NAME</H2>

<I>FvwmAuto</I> - the FVWM auto-raise module
<A NAME="lbAC">&nbsp;</A>
<H2>SYNOPSIS</H2>

<PRE>
Module FvwmAuto Timeout [-passid] [-menter|-menterleave|-mfocus] [EnterCommand [LeaveCommand]]
</PRE>

<I>FvwmAuto</I> can only be invoked by fvwm.
Command line invocation of the <I>FvwmAuto</I> will not work.
<P>
<A NAME="lbAD">&nbsp;</A>
<H2>DESCRIPTION</H2>

The <I>FvwmAuto</I> module is most often used to automatically raise
focused windows.
<P>
<A NAME="lbAE">&nbsp;</A>
<H2>INVOCATION</H2>

The correct syntax is:
<blockquote><PRE>Module FvwmAuto Timeout [-passid] [-menter|-menterleave|-mfocus] [EnterCommand [LeaveCommand]]

AddToMenu Modules
+ &quot;Auto Raise (300 ms)&quot;  Module FvwmAuto 300
+ &quot;Auto Raise/Lower&quot;     Module FvwmAuto 300 &quot;Silent Raise&quot; &quot;Silent Lower&quot;</PRE></blockquote>
<P>




The <I>Timeout</I> argument is required. It specifies how long a
window must retain the keyboard input focus before the command is
executed. The delay is measured in milliseconds, and any integer
greater than zero is valid.
<P>
If the literal option <I>-passid</I> is given, the window id of the
window just entered or left is appended to the command that is
sent to fvwm.  This can be used with the <B>WindowId</B> command of
fvwm.
<P>
The options <I>-menter</I>, <I>-menterleave</I> and <I>-mfocus</I>
influence the actions FvwmAuto reacts to.  No more than one of the
options can be chosen.  In
<I>-mfocus</I>

mode, FvwmAuto raises the window that has the focus.  In
<I>-menter</I>

mode, FvwmAuto raises the window under the pointer when the
pointer enters a window.  The
<I>LeaveCommand</I>

is executed on the window that was below the pointer before it
entered the new window.  When the pointer leaves a window and
enters the root window, the
<I>EnterCommand</I>

is executed too, but without a window to operate on.  In
<I>-menterleave</I>

mode, FvwmAuto works just like in
<I>-menter</I>

mode, but the
<I>LeaveCommand</I>

is also executed if the pointer moves out of a window but does not
enter a new window.  The latter two modes of operation are useful
with windows that do not accept the focus.
<P>
Note: -menterleave mode can interfere with popup windows of some
applications.  One example is the zoom menu of Ghostview.  Please
do not complain about this to us - it is a bug in Ghostview.
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
An example for auto raising windows with ClickToFocus:
<blockquote><PRE>Style * ClickToFocus
FvwmAuto 0 -menter &quot;Silent Raise&quot;</PRE></blockquote>
<P>



<P>
An example for auto raising and lowering only some windows:
<PRE>
To start FvwmAuto:


<blockquote>
FvwmAuto 0 -passid -menter \
&quot;Silent selective_raiselower raise&quot; \
&quot;Silent selective_raiselower lower&quot;</PRE></blockquote>
<P>



And put this in your .fvwm2rc:


<P>


<blockquote><PRE>AddToFunc selective_raiselower
+ I WindowId $1 (FvwmIconMan) $0
+ I WindowId $1 (FvwmButtons) $0
+ I WindowId $1 (xclock) $0</PRE></blockquote>
<P>



<P>
More complex example (three FvwmAuto's are running):
<blockquote><PRE>DestroyFunc RestoreIconified
AddToFunc   RestoreIconified
+ I Current (Iconic) Iconify false

DestroyFunc RegisterFocus
AddToFunc   RegisterFocus
+ I Exec date +&quot;%T $n focused&quot; &gt;&gt;/tmp/focus-stats.txt

DestroyFunc RegisterUnfocus
AddToFunc   RegisterUnfocus
+ I Exec date +&quot;%T $n unfocused&quot; &gt;&gt;/tmp/focus-stats.txt

KillModule FvwmAuto
Module FvwmAuto 250 Raise Nop
Module FvwmAuto 800 RestoreIconified Nop
Module FvwmAuto   0 RegisterFocus RegisterUnfocus</PRE></blockquote>
<P>



<P>
<A NAME="lbAF">&nbsp;</A>
<H2>NOTES</H2>

<P>
There is a special Raise/Lower support in FvwmAuto. It was added to improve
Raise/Lower callbacks, since most of FvwmAuto usages is auto-raising or
auto-lowering. This improvement includes locking on M_RAISE_WINDOW and
M_LOWER_WINDOW packets and not raising/lowering explicitly raised windows.
The special Raise/Lower support is enabled only when either
<I>EnterCommand</I> or <I>LeaveCommand</I> contain substring &quot;Raise&quot; or
&quot;Lower&quot;. You can use this fact to enable/disable any special support by
renaming these commands, if FvwmAuto does not automatically do want you
expect it to do.
<P>
Using <I>FvwmAuto</I> in conjunction with <I>EdgeCommand</I> can be even
more powerful. There is a short example in the <I>fvwm</I> man page.
<P>
<A NAME="lbAG">&nbsp;</A>
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
<DT><A HREF="#lbAD">DESCRIPTION</A><DD>
<DT><A HREF="#lbAE">INVOCATION</A><DD>
<DT><A HREF="#lbAF">NOTES</A><DD>
<DT><A HREF="#lbAG">AUTHOR</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 01:39:54 GMT, April 19, 2003


<?php decoration_window_end(); ?>

<!-- Automatically generated by manpages2php on 19-Apr-2003 -->
