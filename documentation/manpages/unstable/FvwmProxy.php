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
$title          = "FVWM - Man page - FvwmProxy";
$heading        = "FVWM - Man page - FvwmProxy";
$link_name      = "Man page";
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "manpages_unstable_FvwmProxy";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include_once(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual page for FvwmProxy in unstable branch (2.5.25)"); ?>

<H1>FvwmProxy</H1>
Section: Fvwm Modules (1)<BR>Updated: (not released yet) (2.5.25)<BR><A HREF="#index">This page contents</A>
 - <a href="<?php echo conv_link_target('./');?>">Return to main index</A><HR>


<A NAME="lbAB">&nbsp;</A>
<H2>NAME</H2>

FvwmProxy - the fvwm proxy module
<A NAME="lbAC">&nbsp;</A>
<H2>SYNOPSIS</H2>

FvwmProxy is spawned by fvwm, so no command line invocation will work.
<P>
<A NAME="lbAD">&nbsp;</A>
<H2>DESCRIPTION</H2>

The FvwmProxy allows the user to locate and control windows obscured
by other windows by using small non-overlapping proxy windows.
The default capabilites include raising and lowering the proxied windows.
<P>
Using the sample configuration, pressing Alt-Tab cycles through the windows
and allows the use of assignable click actions on the proxies.
Releasing the Alt key deactivates the proxy windows.
By default, pressing the left or right mouse buttons on a proxy window
raises or lowers the associated proxied window respectively.
An additional mapping can have the proxies automatically appear by just
holding the Alt key.
<P>
Proxy windows are always on top and try to center on the regular
window they proxy.
A simple collision algorithm tweaks the positions of the proxy windows
to prevent them from overlapping.
<P>
<A NAME="lbAE">&nbsp;</A>
<H2>COPYRIGHTS</H2>

The FvwmProxy program is original work by Jason Weber.
<P>
Copyright 2002, Jason Weber. No guarantees or warranties or anything
are provided or implied in any way whatsoever. Use this program at your
own risk.
<P>
<A NAME="lbAF">&nbsp;</A>
<H2>INVOCATION</H2>

FvwmProxy can be invoked by inserting the line 'Module FvwmProxy' in
the .fvwm2rc file. This can be placed on a line by itself, if FvwmProxy
is to be spawned during fvwm's initialization, or can be bound to a
menu or mouse button or keystroke to invoke it later. Fvwm will search
directory specified in the ModulePath configuration option to attempt
to locate FvwmProxy.
<P>
<A NAME="lbAG">&nbsp;</A>
<H2>CONFIGURATION OPTIONS</H2>

<P>
<DL COMPACT>
<DT>*FvwmProxy: Colorset <I>n</I><DD>
Specifies the color theme for unselected proxy windows.
<P>
<DT>*FvwmProxy: SelectColorset <I>n</I><DD>
Specifies the color theme for the selected proxy window.
<P>
<DT>*FvwmProxy: IconifiedColorset <I>n</I><DD>
Specifies the color theme for proxy windows of iconified windows.
This is only meaningful in conjuction with the ProxyIconified option on.
<P>
<DT>*FvwmProxy: Font <I>font</I><DD>
Specifies the font used for large proxy window text.
This usually contains the icon string and is nearly vertically centered
in the proxy.
If there is no icon string, the title bar string is used.
If this text exceeds the width of the proxy, it is cropped on the right.
If no Font is specified, a default is used.
<P>
<DT>*FvwmProxy: SmallFont <I>font</I><DD>
Specifies the font used for the auxillary proxy window text.
This usually contains the title bar string, but is omitted if it
is identical to the icon string and that text was not cropped.
The text is drawn close to the bottom of the proxy and should
probably be the smallest legible font available.
If this text exceeds the width of the proxy, it is cropped on the left.
If no SmallFont is specified, this text is never drawn.
<P>
<DT>*FvwmProxy: Width <I>w</I><DD>
Specifies the size in X of each proxy window. The default is 180.
<P>
<DT>*FvwmProxy: Height <I>h</I><DD>
Specifies the size in Y of each proxy window. The default is 60.
<P>
<DT>*FvwmProxy: Separation <I>d</I><DD>
Specifies the minimum distance between proxy windows when adjusting
for collisions. The default is 10.
<P>
<DT>*FvwmProxy: ShowMiniIcons <I>bool</I><DD>
If true, proxy windows show the mini icon for the window they represent,
if it has a mini icon.  The default is true.
<P>
<DT>*FvwmProxy: EnterSelect <I>bool</I><DD>
If true, a proxy is automatically selected when the mouse is moved
over the proxy, even if no mouse buttons are pressed.
The default is false.
<P>
<DT>*FvwmProxy: ProxyMove <I>bool</I><DD>
If true, moving a proxy window will move the window it represents.
Currently, the proxied window doesn't recognize snap effects during
this operation. The default is false.
<P>
<DT>*FvwmProxy: ProxyIconified <I>bool</I><DD>
If true, continue to proxy windows when they are iconified.
In addition, consider adding click actions that Iconify on and off,
such as on the middlemouse button. The default is false.
<P>
<DT>*FvwmProxy: Action <I>mouseaction</I> <I>response</I><DD>
Tells FvwmProxy to do the specified <I>response</I> when the given
<I>action</I> is done.
The currently supported mouse actions are: Click1, Click2, Click3 and so on,
representing mouse clicks with various buttons.
By default, the module supports 3 mouse buttons, but it can be
compiled to support more.
The default responses are Raise, Nop, and Lower for Click1, Click2, and Click3,
respectively.
<P>
<DT>*FvwmProxy: Action Select <I>command</I><DD>
This selects an fvwm function to be called during a FvwmProxy Hide command
for the window whose proxy was selected.
The default is WindowListFunc.  WindowListFunc is predefined by the
fvwm install.  You can replace it, add to it,
or supply an independent function.
<P>
<DT>*FvwmProxy: Action Show <I>command</I><DD>
This selects an fvwm function to be called during a FvwmProxy Show command.
The default is Nop.
<P>
<DT>*FvwmProxy: Action Hide <I>command</I><DD>
This selects an fvwm function to be called during a FvwmProxy Hide command.
The default is Nop.
<P>
<DT>*FvwmProxy: Action Abort <I>command</I><DD>
This selects an fvwm function to be called during a FvwmProxy Abort command.
The default is Nop.
<P>
<DT>*FvwmProxy: Action Mark <I>command</I><DD>
This selects an fvwm function to be called on a window after it is marked.
The default is Nop.
<P>
<DT>*FvwmProxy: Action Unmark <I>command</I><DD>
This selects an fvwm function to be called on a marked window just after
another window gets the mark.
The default is Nop.
<P>
<DT>*FvwmProxy: Action ModifierRelease <I>modifiers</I> <I>command</I><DD>
This selects an fvwm function to be called while proxies are shown and
the specified modifiers are all released.  The modifiers are specified
using the same syntax as in the Mouse command.
The default is Nop.
<P>
<DT>*FvwmProxy: Group <I>groupname</I> <I>command</I> <I>pattern</I><DD>
For the given named group, adjust inclusion of the windows matching
the pattern.
The groupname is a string identifier used to associate windows.
The window pattern uses the same format as the Style command.
The supported commands are Include, SoftInclude, and Exclude.
Include and SoftInclude identifies a pattern to add windows
to the group.
Exclude identifies pattern to counteract inclusion pattern
or auto-inclusion (see flags below).
All exclusion checks follow all inclusion checks.
Soft inclusion limits the windows in that pattern to only move
when an non-soft window in the group moves.
Moving or resizing these windows does not affect any other windows.
They are also immune to edge effects.
<P>
<DT>*FvwmProxy: Group <I>groupname</I> <I>flag</I><DD>
For the given named group, activate the given flag.
The supported flags are AutoInclude, AutoSoft, and IgnoreIDs.
All window grouping is normally checked to only group windows
that are in the same process or that have the same X11 client leader.
IgnoreIDs deactivates this mechanism.
AutoInclude automatically includes any window that matches
the same process or client leader, without having to name them specifically.
AutoSoft makes all AutoInclusions soft (see inclusion description above).
<P>
<DT>*FvwmProxy: SlotWidth <I>w</I><DD>
This specifies the width of the icons used in slots.
The default is 16.
<P>
<DT>*FvwmProxy: SlotHeight <I>h</I><DD>
This specifies the height of the icons used in slots.
The default is 16.
<P>
<DT>*FvwmProxy: SlotSpace <I>d</I><DD>
This specifies the space between icons used in slots.
The default is 4.
<P>
<DT>*FvwmProxy: GroupSlot <I>n</I><DD>
This specifies the first slot that represent a colored group.
Group slots don't need icons as the are drawn by predetermined means.
The default is 2.
<P>
<DT>*FvwmProxy: GroupCount <I>n</I><DD>
This specifies the number of group slots.
The default is 6.
<P>
<DT>*FvwmProxy: SlotStyle <I>n</I> <I>style</I><DD>
For non-group slots, this defines the appears of the indicated slot.
The style format matches ButtonStyle command.
The default is nothing.
<P>
<DT>*FvwmProxy: SlotAction <I>n</I> <I>mouseaction</I> <I>response</I><DD>
For non-group slots, this defines the behavior of the indicated slot.
The mouse action and response is used the same as the FvwmProxy
Action configuration.
The default is Nop.
<P>
<DT>*FvwmProxy: UndoLimit <I>n</I><DD>
This specifies the number of entries in the undo buffer.
this limits how far back you can undo.
The default is 8.
<P>
</DL>
<A NAME="lbAH">&nbsp;</A>
<H2>COMMANDS</H2>

<P>
<DL COMPACT>
<DT>SendToModule FvwmProxy Show<DD>
Activate proxy windows for all windows on the current desk that
do not use the WindowListSkip option.
If the desk is switched, new proxies are automatically generated.
<P>
<DT>SendToModule FvwmProxy Hide<DD>
Deactivate all proxy windows.
If a proxy is selected (such as with the Next and Prev commands),
the Select Action is call on the window that the proxy represents.
The default action includes raising the window and
warping the mouse to a position over that window.
<P>
<DT>SendToModule FvwmProxy ShowToggle<DD>
If shown, hide.  If hidden, show.
<P>
<DT>SendToModule FvwmProxy Abort<DD>
Deactivate all proxy windows.
This differs from the Hide command in that no action is taken
on any selected window.
<P>
<DT>SendToModule FvwmProxy Circulate <I>command</I><DD>
Tell FvwmProxy to run a conditional command and mark the result.
The imbedded command <I>SendToModule FvwmProxy Mark</I> is automatically
appended after the optional condition, so supplying your own imbedded
command will probably fail.
An example argument to Circulate is
<I>ScanForWindow East South (CurrentPage)</I>.
If the proxies aren't already shown (such as with the Show command),
any Circulate command will automatically show the proxies.
<P>
<DT>SendToModule FvwmProxy Next (obsolete)<DD>
If a proxy window is selected, the next proxy is selected.
Windows with the WindowListSkip option are ignored.
The proxies are sorted left to right during the Show command.
If no proxy is currently selected, but a proxy on this desk was
selected on a recent show, that proxy is selected.
If no proxy on this desk was recently selected,
the leftmost proxy is used.
This nearly duplicates the functionality of
Circulate ScanForWindow East South (CurrentPage).
<P>
<DT>SendToModule FvwmProxy Prev (obsolete)<DD>
If a proxy window is selected, the previous proxy is selected.
The starting point is the same as with the Next command, except
that the choice with no recent selection is the rightmost proxy.
This nearly duplicates the functionality of
Circulate ScanForWindow West North (CurrentPage).
<P>
<DT>SendToModule FvwmProxy SoftToggle<DD>
Toggle the soft group inclusion setting for the selected window.
This setting is the same that can be activated using the SoftInclude
and AutoSoft commands inside the FvwmProxy Group configuration.
<P>
<DT>SendToModule FvwmProxy IsolateToggle<DD>
Toggle the isolation setting for the selected window's group.
Isolated groups only allow one member to not be iconified at a time.
The members are also coerced to the same position and size,
constrained by their size increment.
<P>
<DT>SendToModule FvwmProxy PrevIsolated<DD>
If focused on a member of a isolating group,
deiconify the member higher on list.
If no member is higher, deiconify the last member.
<P>
<DT>SendToModule FvwmProxy NextIsolated<DD>
If focused on a member of a isolating group,
deiconify the member lower on list.
If no member is higher, deiconify the first member.
<P>
<DT>SendToModule FvwmProxy Undo<DD>
Attempt to undo the last window move and/or resize.
<P>
<DT>SendToModule FvwmProxy Redo<DD>
Attempt to redo the most recent Undo.
If another move or resize occurs since the previous undo,
the redo buffer will be cleared.
<P>
</DL>
<A NAME="lbAI">&nbsp;</A>
<H2>SAMPLE CONFIGURATION</H2>

The following are excerpts from a .fvwm2rc file which describe
FvwmProxy initialization commands:
<PRE>

    Key Tab A M SendToModule FvwmProxy Circulate \
        ScanForWindow East South (CurrentPage)
    Key Tab A SM SendToModule FvwmProxy Circulate \
        ScanForWindow West North (CurrentPage)

    *FvwmProxy: Action ModifierRelease M SendToModule FvwmProxy Hide

</PRE>

But Meta-Shift-Tab can be awkward, so Meta-Q may be a better alternative.
<PRE>

    Key Q A M SendToModule FvwmProxy Circulate \
        ScanForWindow West North (CurrentPage)

</PRE>

<P>
You might consider adding !Sticky to the (CurrentPage) conditional if you
use Sticky for low-interactivity programs, like load meters and music players.
<P>
To have the proxies immediately pop up when you hold the Alt key, add
<PRE>

    Key Meta_L A N SendToModule FvwmProxy Show

</PRE>

If that's too intrusive, you can assign Alt-Esc to switch the proxies
on and off by adding
<PRE>

    Key Escape A M SendToModule FvwmProxy ShowToggle

</PRE>

Some platforms have problems where general Alt key combinations becoming
otherwise dysfunctional after defining these mappings.
If this happens, it might be difficult to take full advantage of this module.
<P>
To have the mouse jump to the center instead of the upper left corner,
try adding
<PRE>

    AddToFunc WindowListFunc
    + I WarpToWindow 50 50

</PRE>

or just make your own list function from scratch, for example
<PRE>

    DestroyFunc WindowListFunc
    AddToFunc WindowListFunc
    + I WindowId $[w.id] Raise
    + I WindowId $[w.id] WarpToWindow 50 50

</PRE>

<P>
Note that the default configuration does not activate any Next/Prev operations
for Alt-Tab since that sequence is, by default, used by another module.
Adding appropriate key mappings to your .fvwm2rc will switch this
responsibility to FvwmProxy.
<P>
If you use ProxyIconified, you might consider adding Iconify actions.
<PRE>

    AddToFunc WindowListFunc
    + I WindowId $[w.id] Iconify Off

    AddToFunc Raise-and-Deiconify
    + I WindowId $[w.id] Raise
    + I WindowId $[w.id] Iconify Off

    *FvwmProxy: Action Click1 Raise-and-Deiconify
    *FvwmProxy: Action Click2 Iconify

</PRE>

<P>
You can set up some basic slots fairly easily.
<PRE>

*FvwmProxy: GroupSlot 2
*FvwmProxy: GroupCount 5

*FvwmProxy: SlotStyle 1 MiniIcon
*FvwmProxy: SlotStyle 7 Pixmap &quot;squeeze.xpm&quot;
*FvwmProxy: SlotStyle 8 Pixmap &quot;mini-up.xpm&quot;
*FvwmProxy: SlotStyle 9 Pixmap &quot;mini-bball.xpm&quot;
*FvwmProxy: SlotStyle 10 Pixmap &quot;mini-cross.xpm&quot;

*FvwmProxy: SlotAction 1 Click1 Popup WindowMenu
*FvwmProxy: SlotAction 7 Click1 SendToModule FvwmProxy IsolateToggle
*FvwmProxy: SlotAction 8 Click1 SendToModule FvwmProxy SoftToggle
*FvwmProxy: SlotAction 9 Click1 Iconify
*FvwmProxy: SlotAction 10 Click1 Delete

</PRE>

In this example, WindowMenu is something you would have to define.
If your proxy width is too small, some slots can get cut off.
<P>
Undo and redo can be easily mapped to any keys.
<PRE>

Key Z A 3 SendToModule FvwmProxy Undo
Key R A 3 SendToModule FvwmProxy Redo

</PRE>

<P>
You can rotate through an isolated group using any keys.
For example, meta cursor-up and cursor-down could traverse the group.
<PRE>

Key Up A 3 SendToModule FvwmProxy PrevIsolated
Key Down A 3 SendToModule FvwmProxy NextIsolated

</PRE>

<P>
A somewhat impractical example of a group definition using GIMP
is as follows:
<PRE>

*FvwmProxy: Group &quot;GIMP&quot; Include &quot;The GIMP&quot;
*FvwmProxy: Group &quot;GIMP&quot; Include &quot;Module Manager&quot;
*FvwmProxy: Group &quot;GIMP&quot; SoftInclude &quot;Unit Editor&quot;
*FvwmProxy: Group &quot;GIMP&quot; AutoInclude
*FvwmProxy: Group &quot;GIMP&quot; AutoSoft
*FvwmProxy: Group &quot;GIMP&quot; Exclude &quot;Preferences&quot;

</PRE>

<P>
This sets up a hard attachment between the windows &quot;The GIMP&quot;
and &quot;Module Manager&quot;.
The &quot;Unit Editor&quot; is also in the group, but only responds
to movement of one of the hard inclusions.
Any window in the same process or with the same client leader
is also associated, but they default to soft inclusion,
except &quot;Preferences&quot; which is explicitly excluded.
Note that in this case, the explicit soft inclusion of
&quot;Unit Editor&quot; is redundant with the combination of
AutoInclude and AutoSoft.
However, if AutoSoft was not specified, the explicit
SoftInclude would distinguish that pattern from the otherwise
hard inclusion under just AutoInclude.
<P>
<A NAME="lbAJ">&nbsp;</A>
<H2>AUTHOR</H2>

Jason Weber
<P>

<HR>
<A NAME="index">&nbsp;</A><H2>Index</H2>
<DL>
<DT><A HREF="#lbAB">NAME</A><DD>
<DT><A HREF="#lbAC">SYNOPSIS</A><DD>
<DT><A HREF="#lbAD">DESCRIPTION</A><DD>
<DT><A HREF="#lbAE">COPYRIGHTS</A><DD>
<DT><A HREF="#lbAF">INVOCATION</A><DD>
<DT><A HREF="#lbAG">CONFIGURATION OPTIONS</A><DD>
<DT><A HREF="#lbAH">COMMANDS</A><DD>
<DT><A HREF="#lbAI">SAMPLE CONFIGURATION</A><DD>
<DT><A HREF="#lbAJ">AUTHOR</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 13:00:17 GMT, January 08, 2008


<?php decoration_window_end(); ?>

<!-- Automatically generated by manpages2php on 08-Jan-2008 -->
