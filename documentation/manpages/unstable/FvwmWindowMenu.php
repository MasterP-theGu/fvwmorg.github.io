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
$title          = "FVWM - Man page - FvwmWindowMenu";
$heading        = "FVWM - Man page - FvwmWindowMenu";
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
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual page for FvwmWindowMenu in unstable branch (2.5.8)"); ?>

<H1>FVWMWINDOWMENU</H1>
Section: FVWM Modules (1)<BR>Updated: 2002-12-30<BR><A HREF="#index">This page contents</A>
 - <a href="<?php echo conv_link_target('./');?>">Return to main index</A><HR>

<A NAME="lbAB">&nbsp;</A>
<H2>DESCRIPTION</H2>

<A NAME="ixAAC"></A>
A substitute for <I>fvwm</I> builtin <B>WindowList</B>, but written in Perl
and easy to customize. Unlike <B><a href="<?php echo conv_link_target('./FvwmIconMan.php');?>">FvwmIconMan</a></B> or <B><a href="<?php echo conv_link_target('./FvwmWinList.php');?>">FvwmWinList</a></B> the
module does not draw its own window, but instead creates an
<I>fvwm</I> menu and asks <I>fvwm</I> to pop it up.
<P>

By defining a set of regular expressions using Show, windows may
be sorted into sections based on the regexp matching their
name, icon name, class or resource.
<P>

Similarly, matches in DontShow will be excluded from the list.
<P>

Any windows not matching an instance of Show or DontShow will
be placed in the last section of the menu.
<A NAME="lbAC">&nbsp;</A>
<H2>USAGE</H2>

<A NAME="ixAAD"></A>
Place this line in e.g. your StartFunction in <I>.fvwm2rc</I>:
<P>

<blockquote><pre>    Module FvwmWindowMenu</pre></blockquote>
<P>

To actually invoke the menu add something like:
<P>

<blockquote><pre>    Key Menu A N SendToModule FvwmWindowMenu \
        Post Root c c SelectOnRelease Menu</pre></blockquote>
<P>

or:
<P>

<blockquote><pre>    Mouse 2 A N SendToModule FvwmWindowMenu Popup</pre></blockquote>
<P>

The additional parameters are any valid <B>Menu</B> command parameters without a
menu name, see fvwm.
<P>

Recognized actions are <B>Post</B> (or its alias <B>Menu</B>) and <B>Popup</B>, they
create <I>fvwm</I> menus and invoke them using the corresponding commands
<B>Menu</B> and <B>Popup</B>. If the module was started with ``-g'' switch, it
additionally supports <B>PostBar</B>.
<P>

Set module options for windows to show or not show. The syntax is:
<P>

<blockquote><pre>    *FvwmWindowMenu: Show type = pattern
    *FvwmWindowMenu: DontShow type = pattern</pre></blockquote>
<P>

where type is one of <I>name</I>, <I>icon</I>, <I>class</I> or <I>resource</I>. Pattern is
a perl regular expression that will be evaluated in m// context.
See <I><A HREF="http://localhost/cgi-bin/man/man2html/1+perlre">perlre</A></I>(1).
<P>

For example:
<P>

<blockquote><pre>    *FvwmWindowMenu: Show resource = Galeon|Navigator|mozilla-bin
    *FvwmWindowMenu: Show name = ^emacs</pre></blockquote>
<P>

will define two sections containing respectively browsers, and emacs.
Number of sections is unlimited. The strings are perl regular
expressions that will be evaluated in m// context. See <I><A HREF="http://localhost/cgi-bin/man/man2html/1+perlre">perlre</A></I>(1).
<P>

Similarly:
<P>

<blockquote><pre>    *FvwmWindowMenu: DontShow name = ^Fvwm
    *FvwmWindowMenu: DontShow class = Gkrellm</pre></blockquote>
<P>

will cause the menu to ignore windows with name beginning with Fvwm
or class gkrellm.
<P>

Other options:
<DL COMPACT>
<DT>*FvwmWindowMenu: <I>OnlyIconic</I> {on|off}<DD>
<A NAME="ixAAE"></A>
show only iconified windows
<DT>*FvwmWindowMenu: <I>AllDesks</I> {on|off}<DD>
<A NAME="ixAAF"></A>
show windows from all desks
<DT>*FvwmWindowMenu: <I>AllPages</I> {on|off}<DD>
<A NAME="ixAAG"></A>
show windows from all pages
<DT>*FvwmWindowMenu: <I>Maxlen</I> 32<DD>
<A NAME="ixAAH"></A>
max length in chars of entry
<DT>*FvwmWindowMenu: <I>MenuName</I> MyMenu<DD>
<A NAME="ixAAI"></A>
name of menu to popup
<DT>*FvwmWindowMenu: <I>MenuStyle</I> MyMenuStyle<DD>
<A NAME="ixAAJ"></A>
name of MenuStyle to apply
<DT>*FvwmWindowMenu: <I>Debug</I> {0,1,2,3}<DD>
<A NAME="ixAAK"></A>
level of debug info output, 0 means no debug
<DT>*FvwmWindowMenu: <I>Function</I> MyWindowListFunc<DD>
<A NAME="ixAAL"></A>
function to invoke on menu entries; defaults to WindowListFunc
<DT>*FvwmWindowMenu: <I>ItemFormat</I> formatstring<DD>
<A NAME="ixAAM"></A>
how to format menu entries; substitutions are made as follows:
<DL COMPACT><DT><DD>
<DL COMPACT>
<DT>%n, %i, <TT>%c</TT>, <TT>%r<DD>


<A NAME="ixAAN"></A>
the window name, icon name, class or resource
<DT>%x, %y<DD>


<A NAME="ixAAO"></A>
the window x or y coordinates on current page
<DT>%d<DD>
<A NAME="ixAAP"></A>
the window desk number
<DT>%m<DD>
<A NAME="ixAAQ"></A>
the window's mini-icon
<DT>%M<DD>
<A NAME="ixAAR"></A>
the window's mini-icon only for iconified windows, otherwise empty
<DT>%t<DD>
<A NAME="ixAAS"></A>
a tab
<DT>%%<DD>
a literal %
</DL>
</DL>

<DL COMPACT><DT><DD>


<P>


The format string must be quoted. The default string is
``%m%n%t%t(+%x+%y) - Desk %d</TT>''.
</DL>

</DL>
<A NAME="lbAD">&nbsp;</A>
<H2>MORE EXAMPLES</H2>

<A NAME="ixAAT"></A>
Fancy binding of the window menu to the right windows key on some keyboards.
Hold this button while navigating using cursor keys, then release it.
<P>

<blockquote><pre>    CopyMenuStyle * WindowMenu
    MenuStyle WindowMenu SelectOnRelease Super_R
    *FvwmWindowMenu: MenuStyle WindowMenu</pre></blockquote>
<P>

<blockquote><pre>    AddToFunc StartFunction I Module FvwmWindowMenu</pre></blockquote>
<P>

<blockquote><pre>    Key Super_R A A SendToModule FvwmWindowMenu Post Root c c WarpTitle</pre></blockquote>
<A NAME="lbAE">&nbsp;</A>
<H2>AUTHOR</H2>

<A NAME="ixAAU"></A>
Ric Lister &lt;<A HREF="http://cns.georgetown.edu/~ric/">http://cns.georgetown.edu/~ric/</A>&gt;
<P>

<HR>
<A NAME="index">&nbsp;</A><H2>Index</H2>
<DL>
<DT><A HREF="#lbAB">DESCRIPTION</A><DD>
<DT><A HREF="#lbAC">USAGE</A><DD>
<DT><A HREF="#lbAD">MORE EXAMPLES</A><DD>
<DT><A HREF="#lbAE">AUTHOR</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 00:48:08 GMT, November 01, 2003


<?php decoration_window_end(); ?>

<!-- Automatically generated by manpages2php on 01-Nov-2003 -->
