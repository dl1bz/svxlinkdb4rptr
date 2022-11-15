---
# Dashboard for SVXLINK for public repeaters ###

This is a rework, not fork, based at codebase https://github.com/FM-POLAND/hs_dashboard_pi (created by SP2ONG, SP0DZ).
Many thanks to these guys for their excellent work.

## Preamble

This dashboard is re-designed for use with public repeaters in hamradio, less for hotspots.
For hotspots please use the original codebase https://github.com/FM-POLAND/hs_dashboard_pi

## Requirements ##
- a webserver with php activated
- the webserver needs to be run as user svxlink, otherwise the DTMF controls via webinterface will be not working

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

This program is free software; you can redistribute it and/or modify it.
This codebase is a "work in progress","as is" without any kind of support.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

73 Heiko, DL1BZ
