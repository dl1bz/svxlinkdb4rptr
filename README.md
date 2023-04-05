---
# Dashboard for SVXLINK for public repeaters ###

This is a rework, not fork in the proper sense, based at codebase https://github.com/FM-POLAND/hs_dashboard_pi (created by SP2ONG, SP0DZ).
Many thanks to these guys for their excellent work.

## Preamble

This dashboard is re-designed for use with public repeaters (duplex) in hamradio, less for hotspots (I mean FM-simplex systems, but it works too).
Beware, this all is a **work-in-progress** and I will fix things in the code.
Please check for regularly updates from time to time of this dashboard, so please keep it up-to-date.

## Changes from the original
For better use with public repeaters some things are different
- remove audio player and audio stuff complete for saving data rates if the repeater has only a network connection like LTE
- read the most config values now from the svxlink config files automatic
- the visibility and usability of control buttons depend on source network/source IP (private networks or public internet) for making the dashboard accessible from internet (if needed)
- change some status views for more clarity
- add additional functionality for [RepeaterLogic]
- startup check if all required config files are available
- remove most of hard-coded things, which significantly limit the functionality for flexible use
- make the config.php update-safe by add a new user-defined file config.inc.php
- remove all SA818/DRA818 stuff for hotspots, not needed by repeaters
- remove web-editing of svxlink.conf, not a good idea, that was already a dangerous thing with PiStar

## Requirements ##
- installed git support
- a running SVXLINK by SM0SVX https://github.com/sm0svx/svxlink
- a webserver with php activated
- **the webserver needs to be run as user svxlink, otherwise the DTMF controls via webinterface will be not working**
- activate/install php-curl for read the status from SVXReflector via his API
- **basic knowledge of using and working with Linux :) This piece of software is not plug'n'play !**

Please add 2 new variables in your svxlink.conf:
```
[ReflectorLogic]
...
# set the name of your network
FMNET=FM-Funknetz.de
# set the API access to your SVXReflector
API=https://status.thueringen.link
...
```

It is strongly recommended, for protect the SDCard if using a Raspberry Pi, that the logging from SVXLINK and from the httpd is running at a ramdisk and, if possible, turn off the swap.
**You can change the logpath of SVXLINK** in ``/etc/default/svxlink`` and restart SVXLINK for activation.

A ramdisk can be added in ``/etc/fstab``. For example, add the following line there for a ramdisk with 64MB for new logfile in ``/var/log/dv/svxlink`` :

```
tmpfs           /var/log/dv     tmpfs   nodev,noatime,nosuid,mode=0777,size=64m         0       0
```

## Installation ##

**As I say before, the httpd (webserver) needs to be run as user svxlink, otherwise the DTMF control function via webinterface don't work**.
As default the webserver run as user www-data.
You need to change this in the webserver config file, depend on httpd you use (ngninx, apache2, lighttpd).
The user svxlink is not a privileged user and hasn't root rights. From the view of security this is not a problem, if the httpd/webserver runs as user svxlink.

```
$ cd /var/www
$ sudo mv html html.old
$ sudo git clone https://github.com/dl1bz/svxlinkdb4rptr.git html
$ sudo chown -R svxlink:svxlink html
```

**Important: Start your webbrowser now and access the dashboard like a normal website.**

After that, a new file ``include/config.inc.php`` will be saved, if it not already exists.
Edit this file with your own values. This file is update-safe and will be not overwritten, if you do an update.
```
$ cd /var/www/html/include
$ sudo nano config.inc.php
```

## Update the dashboard ##

If you want to make an update of dashboard **(frequently recommended)**:
```
$ cd /var/www/html
$ sudo git pull
```

After update please look at the ``/var/www/html/include/config.inc.php.example`` if there are new defintions of new functions.
If yes, you need to copy by hand the additional lines to ``/var/www/html/include/config.inc.php``.

## Update the TG-List (FM-Funknetz DL only!) ##

You can update the TG-List. At the moment only the German FM-Funknetz is supported.

Requirements:
- installed **python3** and **pip3** (if not pip3 installed, do ``sudo apt-get install python3-pip``)
- html-table-parser (``sudo pip3 install html-table-parser-python3``)

```
$ cd /var/www/html/scripts
$ sudo ./tgdb_update.sh
```
For automatic update the TG-List you can create a cron job and execute ``tgdb_update.sh`` regularly.

Have fun with SVXLINK Dashboard for repeater !

## Known bugs

**Important: Please use ever the latest version of this package and update regularly. I'm constantly working on it and fix bugs.**

- I develop this Dashbaord with Raspian light Bullseye/Debian11 and lighttpd as webserver with enabled PHP support 7.x, **PHP >= 8.x NOT supported** at this time, sorry ! **I prepare a new version, which will be running with PHP8 too**. But it need some major code changes for PHP8, please be patient for that.
- use a Raspberry Pi >= 2B or higher or similiar clones. Slow systems like Raspberry Pi Zero are NOT supported, because a webserver needs some cpu power for good working
- use ram-disks if possible for running 24/7 to protect the SD card and minimize the I/O cycles at the SD card storage filesystem
- the additional PHP module **php-curl** and **php-xml** need to be installed too, otherwise some functions are not available or don't work
- For the Dashboard we need a SVXLINK managed by systemd (default setup for SVXLINK), older things like init.d are **NOT** supported !
- If httpd is nginx, there are some minor problems around PHP, I recommend use lighttpd as httpd
- if possible, use the latest version of Raspian, which is at this time based at Bullseye/Debian11 and do regularly updates

## Final words for note ##
This program is free software; you can redistribute it and/or modify it how you want.
This codebase is a "work in progress","as is" without any kind of support.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

73 Heiko, DL1BZ
