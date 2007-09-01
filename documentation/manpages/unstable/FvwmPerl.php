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
$title          = "FVWM - Man page - FvwmPerl";
$heading        = "FVWM - Man page - FvwmPerl";
$link_name      = "Man page";
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "manpages_unstable_FvwmPerl";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if(!isset($site_has_been_loaded)) {
	$site_has_been_loaded = "true";
	include_once(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual page for FvwmPerl in unstable branch (2.5.24)"); ?>

<H1>FvwmPerl</H1>
Section: Fvwm Modules (1)<BR>Updated: 2005-08-11<BR><A HREF="#index">This page contents</A>
 - <a href="<?php echo conv_link_target('./');?>">Return to main index</A><HR>

<A NAME="lbAB">&nbsp;</A>
<H2>NAME</H2>

FvwmPerl - the fvwm perl manipulator and preprocessor
<A NAME="lbAC">&nbsp;</A>
<H2>SYNOPSIS</H2>

<A NAME="ixAAC"></A>
FvwmPerl should be spawned by <I><a href="<?php echo conv_link_target('./fvwm.php');?>">fvwm</a></I>(1) for normal functionality.
<P>

To run this module, place this command somewhere in the configuration:
<P>

<blockquote><pre>    Module FvwmPerl [params]</pre></blockquote>
<P>

or:
<P>

<blockquote><pre>    ModuleSynchronize FvwmPerl [params]</pre></blockquote>
<P>

if you want to immediately start to send commands to FvwmPerl.
<A NAME="lbAD">&nbsp;</A>
<H2>DESCRIPTION</H2>

<A NAME="ixAAD"></A>
This module is intended to extend fvwm commands with the perl scripting
power.  It enables to embed perl expressions in the fvwm config files and
construct fvwm commands.
<A NAME="lbAE">&nbsp;</A>
<H2>INVOCATION</H2>

<A NAME="ixAAE"></A>
If you want to invoke the unique and persistent instance of FvwmPerl, it is
suggested to do this from the <I>StartFunction</I>.  Calling it from the top is
also possible, but involves some issues not discussed here.
<P>

<blockquote><pre>    AddToFunc StartFunction I Module FvwmPerl</pre></blockquote>
<P>

There are several command line switches:
<P>

<B><u>FvwmPerl</u></B>
[ <B>--eval</B> line ]
[ <B>--load</B> file ]
[ <B>--preprocess</B> [ <B>--quote</B> char ] [ <B>--winid</B> wid ] [ <B>--cmd</B> ]
[ <B>--nosend</B> ] [ <B>--noremove</B> ] [ line | file ] ]
[ <B>--export</B> [names] ]
[ <B>--stay</B> ]
[ <B>--nolock</B> ]
[ alias ]
<P>

Long switches may be abbreviated to short one-letter switches.
<P>

<B>-e</B>|<B>--eval</B> line - evaluate the given perl code
<P>

<B>-l</B>|<B>--load</B> file - evaluate perl code in the given file
<P>

<B>-p</B>|<B>--preprocess</B> [ file ] - preprocess the given fvwm config file
<P>

The following 5 options are only valid together with <B>--preprocess</B>
option.
<P>

<B>-c</B>|<B>--cmd</B> line - an <FONT>fvwm</FONT> command to be preprocessed instead of file
<P>

<B>-q</B>|<B>--quote</B> char - change the default '%' quote
<P>

<B>-w</B>|<B>--winid</B> wid - set explicit window context (should begin with
digit, may be in oct or hex form; this window id overwrites implicit
window context if any)
<P>

<B>--nosend</B> - do not send the preprocessed file to <I>fvwm</I> for <B>Read</B>ing,
the default is send. Useful for preprocessing non fvwm config files.
<P>

<B>--noremove</B> - do not remove the preprocessed file after sending
it to <I>fvwm</I> for <B>Read</B>ing, the default is remove. Useful for debugging.
<P>

<B>-x</B>|<B>--export</B> [names] - define fvwm shortcut functions (by default,
two functions named ``Eval'' and ``.'').  This option implies <B>--stay</B>.
<P>

<B>-s</B>|<B>--stay</B> - continues an execution after <B>--eval</B>, <B>--load</B> or
<B>--preprocess</B> are processed.  By default, the module is not persistent
in this case, i.e. <B>--nostay</B> is assumed.
<P>

<B>--nolock</B> - when one of the 3 action options is given, this option causes
unlocking <I>fvwm</I> immediately. By default the requested action is executed
synchronously; this only makes difference when invoked like:
<P>

<blockquote><pre>    ModuleSynchronous FvwmPerl --preprocess someconfig.ppp</pre></blockquote>
<P>

If <B>--nolock</B> is added here, <B>ModuleSynchronous</B> returns immediately.
Note that <B>Module</B> returns immediately regardless of this option.
<A NAME="lbAF">&nbsp;</A>
<H2>USING ALIAS</H2>

<A NAME="ixAAF"></A>
Aliases allow to have several module invocations and work separately
with all invocations, here is an example:
<P>

<blockquote><pre>    ModuleSynchronous FvwmPerl FvwmPerl-JustTest
    SendToModule FvwmPerl-JustTest eval $a = 2 + 2; $b = $a
    SendToModule FvwmPerl-JustTest eval cmd(&quot;Echo 2 + 2 = $b&quot;)
    KillModule FvwmPerl FvwmPerl-JustTest</pre></blockquote>
<A NAME="lbAG">&nbsp;</A>
<H2>PREPROCESSING EXAMPLE</H2>

<A NAME="ixAAG"></A>
One of the effective proprocessing solutions is to pass the whole fvwm
configuration with embeded perl code to ``FvwmPerl --preprocess''.
An alternative approach is to write a perl script that produces fvwm
commands and sends them for execution, this script may be loaded using
``FvwmPerl --load''. There are hovewer intermediate solutions that
preprocess only separate configuration lines (or alternatively,
execute separate perl commands that produce fvwm commands).
<P>

The following code snippet adds ability of arithmetics and string scripting
to certain lines that need this. To use this, you want to start FvwmPerl as
your first command so that other commands may be asked to be preprosessed.
<P>

<blockquote><pre>    ModuleSynchronize FvwmPerl</pre></blockquote>
<P>

<blockquote><pre>    AddToFunc .
    + I SendToModule FvwmPerl preprocess -c -- $*</pre></blockquote>
<P>

<blockquote><pre>    . Exec exec xterm -name xterm-%{++$i}%   # use unique name</pre></blockquote>
<P>

<blockquote><pre>    . GotoDesk 0 %{ $[desk.n] + 1 }%         # go to next desk</pre></blockquote>
<P>

<blockquote><pre>    . Exec exec %{ -x &quot;/usr/bin/X11/aterm&quot; ? &quot;aterm&quot; : &quot;xterm&quot; }% -sb</pre></blockquote>
<P>

<blockquote><pre>    # center a window
    Next (MyWindow) . Move \
      %{($WIDTH - $[w.width]) / 2}%p %{($HEIGHT - $[w.height]) / 2}%p</pre></blockquote>
<P>

<blockquote><pre>    . Exec exec xmessage %{2 + 2}%           # simple calculator</pre></blockquote>
<P>

<blockquote><pre>    . %{main::showMessage(2 + 2, &quot;Yet another Calculator&quot;); &quot;&quot;}%</pre></blockquote>
<A NAME="lbAH">&nbsp;</A>
<H2>ACTIONS</H2>

<A NAME="ixAAH"></A>
There are several actions that FvwmPerl may perform:
<DL COMPACT>
<DT><B>eval</B> perl-code<DD>
<A NAME="ixAAI"></A>
Evaluate a line of perl code.


<P>


A special function <B>cmd(</B>``command''<B>)</B> may be used in perl code to send
commands back to fvwm.


<P>


If perl code contains an error, it is printed to the standard error stream
with the <I>[FvwmPerl][eval]:</I> header prepended.
<DT><B>load</B> file-name<DD>
<A NAME="ixAAJ"></A>
Load a file of perl code.
If the file is not fully qualified, it is searched in the user
directory <TT>$FVWM_USERDIR</TT> (usually ~/.fvwm) and the system wide
data directory <TT>$FVWM_DATADIR</TT>.


<P>


A special function <B>cmd(</B>``command''<B>)</B> may be used in perl code to send
commands back to fvwm.


<P>


If perl code contains an error, it is printed to the standard error stream
with the <I>[FvwmPerl][load]:</I> header prepended.
<DT><B>preprocess</B> [-q|--quote char] [-c|--cmd] [<I>line</I> | <I>file</I>]<DD>
<A NAME="ixAAK"></A>
Preprocess fvwm config <I>file</I> or (if --cmd is given) <I>line</I>.
This file contains lines that are not touched (usually <FONT>fvwm</FONT> commands)
and specially preformatted perl code that is processed and replaced.
Text enclosed in <B>%{</B> ... <B>}%</B> delimiters, that may start anywhere
on the line and end anywhere on the same or an other line, is perl code.


<P>


The <I>quote</I> parameter changes perl code delimiters.  If a single char
is given, like '@', the delimiters are <B>@{</B> ... <B>}@</B>.
If the given quote is 2 chars, like <B>&lt;&gt;</B>, the quotes are
<B>&lt;{</B> ... <B>}&gt;</B>


<P>


The perl code is substituted for the result of its evaluation.
I.e. %{$a = ``c''; ++$a}% is replaced with ``d''.


<P>


The evaluation is unlike <B>eval</B> and <B>load</B> is done under the
package PreprocessNamespace and without <I>use strict</I>, so you are
free to use any variable names without fear of conflicts. Just don't
use uninitialized variables to mean undef or empty list (they may be in fact
initialized by the previous preprocess action), and do a clean-up if needed.
The variables and function in the <I>main</I> package are still available,
like ::<I>cmd()</I> or ::<I>skip()</I>, but it is just not a good idea to access them
while preprocessing.


<P>


There is a special function <B>include</B>(<I>file</I>) that loads a file,
preprocesses it and returns the preprocessed result. Avoid recursion.


<P>


If any embedded perl code contains an error, it is printed to the standard
error stream and prepended with the <I>[FvwmPerl][preprocess]:</I> header.
The result of substitution is empty in this case.


<P>


The following variables may be used in the perl code:


<P>


$USER,
<TT>$DISPLAY</TT>,
<TT>$WIDTH</TT>,
<TT>$HEIGHT</TT>,
<TT>$FVWM_VERSION</TT>,
<TT>$FVWM_MODULEDIR</TT>,
<TT>$FVWM_DATADIR</TT>,
<TT>$FVWM_USERDIR</TT>


<P>


The following line based directives are recognized when preprocessing.
They are processed after the perl code (if any) is substituted.
<DL COMPACT><DT><DD>
<DL COMPACT>
<DT>%<B>Repeat</B> <I>count</I><DD>
<A NAME="ixAAL"></A>
Causes the following lines to be repeated <I>count</I> times.
<DT>%<B>ModuleConfig</B> <I>module-name</I> [ destroy ]<DD>
<A NAME="ixAAM"></A>
Causes the following lines to be interpreted as the given module configuration.
If ``destroy'' is specified the previous module configuration is destroyed first.
<DT>%<B>Prefix</B> <I>prefix</I><DD>
<A NAME="ixAAN"></A>
Prefixes the following lines with the quoted <I>prefix</I>.
<DT>%<B>End</B> any-optional-comment<DD>
<A NAME="ixAAO"></A>
Ends any of the directives described above, may be nested.
</DL>
</DL>

<DL COMPACT><DT><DD>


<P>


Examples:


<P>


<blockquote><pre>    %Prefix &quot;AddToFunc SwitchToWindow I&quot;
        Iconify off
        WindowShade off
        Raise
        WrapToWindow 50 50
    %End</pre></blockquote>


<P>


<blockquote><pre>    %ModuleConfig FvwmPager destroy
        Colorset 0
        Font lucidasans-10
        DeskTopScale 28
        MiniIcons
    %End ModuleConfig FvwmPager</pre></blockquote>


<P>


<blockquote><pre>    %Prefix &quot;All (MyWindowToAnimate) ResizeMove &quot;
    100 100 %{($WIDTH - 100) / 2}% %{($HEIGHT - 100) / 2}%
    %Repeat %{$count}%
    br w+2c w+2c w-1c w-1c
    %End
    %Repeat %{$count}%
    br w-2c w-2c w+1c w+1c
    %End
    %End Prefix</pre></blockquote>


<P>


Additional preprocess parameters --nosend and --noremove may be given too.
See their description at the top.
</DL>

<DT><B>export</B> [<I>func-names</I>]<DD>
<A NAME="ixAAP"></A>
Send to <I>fvwm</I> the definition of shortcut functions that help to activate
different actions of the module (i.e. <B>eval</B>, <B>load</B> and <B>preprocess</B>).


<P>


Function names (<I>func-names</I>) may be separated by commas or/and whitespace.
By default, two functions ``Eval'' and ``.'' are assumed.


<P>


The actual action defined in a function is guessed from the function name
if possible, where function name ``.'' is reserved for <B>preprocess</B> action.


<P>


For example, any of these two fvwm commands


<P>


<blockquote><pre>   SendToModule MyPerl export PerlEval,PP
   FvwmPerl --export PerlEval,PP MyPerl</pre></blockquote>


<P>


define the following two shortcut functions:


<P>


<blockquote><pre>  DestroyFunc PerlEval
  AddToFunc I SendToModule MyPerl eval $*
  DestroyFunc PP
  AddToFunc I SendToModule MyPerl preprocess -c -- $*</pre></blockquote>
</DL>
<P>

These 4 actions may be requested in one of 3 ways: 1) in the command line when
FvwmPerl is invoked (in this case FvwmPerl is short-lived unless <B>--stay</B>
or <B>--export</B> is also given), 2) by sending the corresponding message in
fvwm config using SendToModule, 3) by calling the corresponding perl function
in perl code.
<A NAME="lbAI">&nbsp;</A>
<H2>FUNCTIONS</H2>

<A NAME="ixAAQ"></A>
There are several functions that perl code may call:
<DL COMPACT>
<DT><B>cmd(</B><I>$fvwmCommand</I><B>)</B><DD>
<A NAME="ixAAR"></A>
In case of <B>eval</B> or <B>load</B> - send back to fvwm a string <I>$fvwmCommand</I>.
In case of <B>preprocess</B> - append a string <I>$fvwmCommand</I> to the output of
the embedded perl code.
<DT><B>doEval(</B><I>$perlCode</I><B>)</B><DD>
<A NAME="ixAAS"></A>
This function is equivalent to the <B>eval</B> functionality
on the string <I>$perlCode</I>, described above.
<DT><B>load(</B>$fileName<B>)</B><DD>
<A NAME="ixAAT"></A>
This function is equivalent to the <B>load</B> functionality
on the file <TT>$fileName</TT>, described above.
<DT><B>preprocess(</B><I>@params, [-c $command] [$fileName]</I><B>)</B><DD>


<A NAME="ixAAU"></A>
This function is equivalent to the <B>preprocess</B> functionality
with the given parameters and the file <TT>$fileName</TT> described above.
<DT><B>export(</B><I>$funcNames, [$doUnexport]</I><B>)</B><DD>
<A NAME="ixAAV"></A>
This function is equivalent to the <B>export</B> functionality
with the given <TT>$funcNames</TT>, described above. May also <B>unexport</B>
the function names if the second parameter is true.


<P>


Function names should be separated by commas or/and whitespace.
If <I>$funcNames</I> is empty then functions ``Eval'' and ``.'' are assumed.
<DT><B></B>stop()<B></B><DD>
<A NAME="ixAAW"></A>
Terminates the module.
<DT><B></B>skip()<B></B><DD>
<A NAME="ixAAX"></A>
Skips the rest of the event callback code, i.e. the module returns to listen
to new module events.
<DT><B></B>unlock()<B></B><DD>
<A NAME="ixAAY"></A>
Unsynchronizes the event callback from fvwm. This may be useful to prevent
deadlocks, i.e. usually fvwm kills the non-responding module if the event
callback is not finished in <I>ModuleTimeout</I> seconds. This prevents it.


<P>


This example causes FvwmPerl to suspend its execution for one minute:


<P>


<blockquote><pre>    SendModule FvwmPerl eval unlock(); sleep(60);</pre></blockquote>


<P>


However, verify that there is no way a new message is sent by fvwm while the
module is busy, and fvwm stays locked on this new message for too long.
See also the <B>detach</B> solution if you need long lasting operations.
<DT><B></B>detach()<B></B><DD>
<A NAME="ixAAZ"></A>
Forks and detaches the rest of the event callback code from the main
process. This may be useful to prevent killing the module if its event
callback should take a long time to complete and it may be done in the
detached child. The detached child may still send commands to fvwm (don't
rely on this), but not receive the events of course, it exits immediately
after the callback execution is finished.


<P>


If you use <I>detach()</I>, better only send commands to fvwm in one process (the
main one or the detached one), doing otherwise may often cause conflicts.
<DT><B>showMessage(</B>$msg, $title[, <TT>$useStderrToo</TT>=1]<B>)<DD>


<A NAME="ixABA"></A>
Shows a dialog window with the given message, using whichever tool is find
in the system.


<P>


See FVWM::Module::Toolkit</B>::<B>showMessage</B> for more information.
</DL>
<A NAME="lbAJ">&nbsp;</A>
<H2>VARIABLES</H2>

<A NAME="ixABB"></A>
There are several global variables in the <I>main</I> namespace that may be used
in the perl code:
<P>

<blockquote><pre>    $a, $b, ... $h
    @a, @b, ... @h
    %a, %b, ... %h</pre></blockquote>
<P>

They all are initialized to the empty value and may be used to store a state
between different calls to FvwmPerl actions (<B>eval</B> and <B>load</B>).
<P>

If you need more readable variable names, either write ``no strict 'vars';''
at the start of every perl code or use a hash for this, like:
<P>

<blockquote><pre>    $h{id} = $h{firstName} . &quot; &quot; . $h{secondName}</pre></blockquote>
<P>

or use a package name, like:
<P>

<blockquote><pre>    @MyMenu::terminals = qw( xterm rxvt );
    $MyMenu::itemNum = @MyMenu::terminals;</pre></blockquote>
<P>

There may be a configuration option to turn strictness on and off.
<A NAME="lbAK">&nbsp;</A>
<H2>MESSAGES</H2>

<A NAME="ixABC"></A>
FvwmPerl may receive messages using the fvwm command SendToModule.
The names, meanings and parameters of the messages are the same as the
corresponding actions, described above.
<P>

Additionally, a message <B>stop</B> causes a module to quit.
<P>

A message <B>unexport</B> [<I>func-names</I>] undoes the effect of <B>export</B>,
described in the <FONT>ACTIONS</FONT> section.
<P>

A message <B>dump</B> dumps the contents of the changed variables (not yet).
<A NAME="lbAL">&nbsp;</A>
<H2>EXAMPLES</H2>

<A NAME="ixABD"></A>
A simple test:
<P>

<blockquote><pre>    SendToModule FvwmPerl eval $h{dir} = $ENV{HOME}
    SendToModule FvwmPerl eval load($h{dir} . &quot;/test.fpl&quot;)
    SendToModule FvwmPerl load $[HOME]/test.fpl
    SendToModule FvwmPerl preprocess config.ppp
    SendToModule FvwmPerl export Eval,PerlEval,PerlLoad,PerlPP
    SendToModule FvwmPerl unexport PerlEval,PerlLoad,PerlPP
    SendToModule FvwmPerl stop</pre></blockquote>
<P>

The following example handles root backgrounds in fvwmrc.
All these commands may be added to StartFunction.
<P>

<blockquote><pre>    Module FvwmPerl --export PerlEval</pre></blockquote>
<P>

<blockquote><pre>    # find all background pixmaps for a later use
    PerlEval $a = $ENV{HOME} . &quot;/bg&quot;; \
      opendir DIR, $a; @b = grep { /xpm$/ } readdir(DIR); closedir DIR</pre></blockquote>
<P>

<blockquote><pre>    # build a menu of background pixmaps
    AddToMenu MyBackgrounds &quot;My Backgrounds&quot; Title
    PerlEval foreach $b (@b) \
      { cmd(&quot;AddToMenu MyBackgrounds '$b' Exec fvwm-root $a/$b&quot;) }</pre></blockquote>
<P>

<blockquote><pre>    # choose a random background to load on start-up
    PerlEval cmd(&quot;AddToFunc \
      InitFunction + I Exec exec fvwm-root $a/&quot; . $b[int(random(@b))])</pre></blockquote>
<A NAME="lbAM">&nbsp;</A>
<H2>ESCAPING</H2>

<A NAME="ixABE"></A>
<B>SendToModule</B> just like any other fvwm commands expands several dollar
prefixed variables.  This may clash with the dollars perl uses.
You may avoid this by prefixing SendToModule with a leading dash.
The following 2 lines in each pair are equivalent:
<P>

<blockquote><pre>    SendToModule FvwmPerl eval $$d = &quot;$[DISPLAY]&quot;
    -SendToModule FvwmPerl eval $d = &quot;$ENV{DISPLAY}&quot;</pre></blockquote>
<P>

<blockquote><pre>    SendToModule FvwmPerl eval \
        cmd(&quot;Echo desk=$d, display=$$d&quot;)
    SendToModule FvwmPerl preprocess -c \
        Echo desk=%(&quot;$d&quot;)%, display=%{$$d}%</pre></blockquote>
<P>

Another solution to avoid escaping of special symbols like dollars
and backslashes is to create a perl file in ~/.fvwm and then load it:
<P>

<blockquote><pre>    SendToModule FvwmPerl load build-menus.fpl</pre></blockquote>
<P>

If you need to preprocess one command starting with a dash, you should
precede it using ``--''.
<P>

<blockquote><pre>    # this prints the current desk, i.e. &quot;0&quot;
    SendToModule FvwmPerl preprocess -c Echo &quot;$%{$a = &quot;c&quot;; ++$a}%&quot;
    # this prints &quot;$d&quot;
    SendToModule FvwmPerl preprocess -c -- -Echo &quot;$%{&quot;d&quot;}%&quot;
    # this prints &quot;$d&quot; (SendToModule expands $$ to $)
    SendToModule FvwmPerl preprocess -c -- -Echo &quot;$$%{&quot;d&quot;}%&quot;
    # this prints &quot;$$d&quot;
    -SendToModule FvwmPerl preprocess -c -- -Echo &quot;$$%{&quot;d&quot;}%&quot;</pre></blockquote>
<P>

Again, it is suggested to put your command(s) into file and preprocess
the file instead.
<A NAME="lbAN">&nbsp;</A>
<H2>CAVEATS</H2>

<A NAME="ixABF"></A>
FvwmPerl being written in perl and dealing with perl, follows the famous
perl motto: ``There's more than one way to do it'', so the choice is yours.
<P>

Here are more pairs of equivalent lines:
<P>

<blockquote><pre>    Module FvwmPerl --load &quot;my.fpl&quot; --stay
    Module FvwmPerl -e 'load(&quot;my.fpl&quot;)' -s</pre></blockquote>
<P>

<blockquote><pre>    SendToModule FvwmPerl preprocess --quote '@' my.ppp
    SendToModule FvwmPerl eval preprocess({quote =&gt; '@'}, &quot;my.ppp&quot;);</pre></blockquote>
<P>

Warning, you may affect the way FvwmPerl works by evaluating appropriate
perl code, this is considered a feature not a bug.  But please don't do this,
write your own <FONT>fvwm</FONT> module in perl instead.
<A NAME="lbAO">&nbsp;</A>
<H2>SEE ALSO</H2>

<A NAME="ixABG"></A>
The <I><a href="<?php echo conv_link_target('./fvwm.php');?>">fvwm</a></I>(1) man page describes all available commands.
<P>

Basically, in your perl code you may use any function or class method from
the perl library installed with <FONT>fvwm</FONT>, see the man pages of perl packages
<B><a href="<?php echo conv_link_target('./../perllib/General::FileSystem.php');?>">General::FileSystem</a></B>, <B><a href="<?php echo conv_link_target('./../perllib/General::Parse.php');?>">General::Parse</a></B> and <B><a href="<?php echo conv_link_target('./../perllib/FVWM::Module.php');?>">FVWM::Module</a></B>.
<A NAME="lbAP">&nbsp;</A>
<H2>AUTHOR</H2>

<A NAME="ixABH"></A>
Mikhael Goikhman &lt;<A HREF="mailto:migo@homemail.com">migo@homemail.com</A>&gt;.
<P>

<HR>
<A NAME="index">&nbsp;</A><H2>Index</H2>
<DL>
<DT><A HREF="#lbAB">NAME</A><DD>
<DT><A HREF="#lbAC">SYNOPSIS</A><DD>
<DT><A HREF="#lbAD">DESCRIPTION</A><DD>
<DT><A HREF="#lbAE">INVOCATION</A><DD>
<DT><A HREF="#lbAF">USING ALIAS</A><DD>
<DT><A HREF="#lbAG">PREPROCESSING EXAMPLE</A><DD>
<DT><A HREF="#lbAH">ACTIONS</A><DD>
<DT><A HREF="#lbAI">FUNCTIONS</A><DD>
<DT><A HREF="#lbAJ">VARIABLES</A><DD>
<DT><A HREF="#lbAK">MESSAGES</A><DD>
<DT><A HREF="#lbAL">EXAMPLES</A><DD>
<DT><A HREF="#lbAM">ESCAPING</A><DD>
<DT><A HREF="#lbAN">CAVEATS</A><DD>
<DT><A HREF="#lbAO">SEE ALSO</A><DD>
<DT><A HREF="#lbAP">AUTHOR</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 20:58:02 GMT, September 01, 2007


<?php decoration_window_end(); ?>

<!-- Automatically generated by manpages2php on 01-Sep-2007 -->
