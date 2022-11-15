---
# Dashboard for SVXLINK for public repeaters ###

This is a rework, not fork, based at codebase https://github.com/FM-POLAND/hs_dashboard_pi (created by SP2ONG, SP0DZ).
Many thanks to these guys for their excellent work.

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

This codebase is a "work in progress"...

73 Heiko, DL1BZ

