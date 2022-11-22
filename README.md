---
# Dashboard for SVXLINK for public repeaters ###

This is a rework, not fork in the proper sense, based at codebase https://github.com/FM-POLAND/hs_dashboard_pi (created by SP2ONG, SP0DZ).
Many thanks to these guys for their excellent work.

## Preamble

This dashboard is re-designed for use with public repeaters in hamradio, less for hotspots.
For hotspots please use the original codebase https://github.com/FM-POLAND/hs_dashboard_pi

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
- a running SVXLINK by SM0SVX https://github.com/sm0svx/svxlink
- a webserver with php activated
- the webserver needs to be run as user svxlink, otherwise the DTMF controls via webinterface will be not working
- activate/install php-curl for read the status from SVXReflector via his API

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

After that you need to setup some things in include/config.php, depend on your setup/system.

It is strongly recommended, for protect the SDCard if using a Raspberry Pi, that the logging from SVXLINK and from the httpd is running at a ramdisk and, if possible, turn off the swap.
You can change the logpath of SVXLINK in /etc/default/svxlink and restart SVXLINK for activation.

A ramdisk can be added in /etc/fstab. For example, add the following line there for a ramdisk with 64MB for new logfile in /var/log/dv/svxlink :

```
tmpfs           /var/log/dv     tmpfs   nodev,noatime,nosuid,mode=0777,size=64m         0       0
```

This program is free software; you can redistribute it and/or modify it.
This codebase is a "work in progress","as is" without any kind of support.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

73 Heiko, DL1BZ
