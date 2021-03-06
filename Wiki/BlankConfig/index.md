---
layout : wiki
title : BlankConfig
version: fvwm2
type : config
weight : 500
description : |
  This is a description of how to configure Fvwm _from scratch_ with a blank config file
---

* TOC
{:toc}

# Starting Fvwm with a Blank Config File

Fvwm has been written with literally hundreds of options for most (if not all) aspects of window management.

In order for windows to appear in the first place, there needs to be a root window (which, in turn, needs to "look like something"); a window needs to either have decorations or no decorations; if it has decorations, they need to be defined and styled; once a window is opened, it needs to open with some kind of geometry somewhere over the root window, etc...

Imagine you need to define all these options _before_ you can make use of your window manager -- you'd be configuring it for quite some time. To provide a working Fvwm, all the necessary options have a default setting so that you can fire up Fvwm from the console and begin using it as your window management tool.

Since Fvwm2 (version 2.6.7), there has been a default configuration that ships together with a new Fvwm install, and when you run Fvwm it will be read from its default location (in most cases /usr/local/share/fvwm3/default-config/config, or whatever the fvwm-datadir is set to (see:  fvwm-config -d)) until you as the user direct Fvwm to another specific config file. 

You could copy the default config to your own \$HOME and start making Fvwm your own by adapting it (this option is described in greater detail in: [Wiki/Default/Config]({{  "/DefaultConfig"  | prepend: site.wikiurl }})), and this is really the preferable method.

Or, and that is a fun thing about Fvwm, you can start Fvwm with a blank, empty config file and start configuring from scratch without all the suggestions from either the default config or any other ready-made config file you might get from the internet (["Configuring Fvwm" on fvwm.org]({{  "/index.html#configuring-fvwm" | prepend: site.baseurl }}), or: [fvwmforums.org/c/fvwm-themes/user-configurations](https://fvwmforums.org/c/fvwm-themes/user-configurations/)/, e.g.).

## Where to put the blank file

In order to bypass the default config, you need to have a config in a place that is read by Fvwm _before_ the default. This place is `$HOME/.fvwm/config` . 

The easiest way is, of course, to simply touch the file. From then on, you are on your own and run Fvwm as if there was no config at all, using the bare defaults from 'SetupRcDefaults()' -- enter at your own risk. 
**If you start from scratch, you are on your own, nothing from the default config will be read by Fvwm.** 
