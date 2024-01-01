---
# Dashboard for SVXLINK for public repeaters #

## Changes ##
01.01.2024:
- SVX-Reflector status page of FM-Funknetz.de https://status.thueringen.link no more accessible for public use, so I add a notice and things need to change now in the README

15.12.2023:
- project status is now EOL (end-of-life) and development is closed
- there will be not a version for PHP8, the adjustments for PHP8 exceed my available time
- this last version works without known issues if using PHP 7.x

01.06.2023:
- Correction of lastheard list sorting if German date format like 01.01.2023 is defined in svxlink.conf (wrong sorting if
  a new month begun -> FIXED)

19.4.2023:
- add HF propagation monitor next to the menu as an OPTION

4.4.2023:
- correct disfunction of DTMF keyboard
- add description of update procedure dashboard in README
- add description of update procedure TG-List in README

15.2.2023:
- cleanup code and remove old, not used things

14.2.2023:
- the webdesign now depend from which options (DTMF, Reflector) are activated, options not defined are now hidden in dashboard
- small bugfixing
- transform more pure HTML code into PHP code

13.2.2023:

- add runtime environment check if PHP-Version < 8.0 and block PHP >= 8 at the moment (PHP >= 8 need major code changes for running)
- update, check and set some values for variables as inital value if not exist in svxlink.conf (thanks Holger/DO2HN)

End of 2022, first public release:

- make the dashboard ready for use with SimplexLogic AND RepeaterLogic
- fixing code typos, bugs and imcomplete code in some PHP functions
- minimize special config for dashboard, read the most values directly from svxlink.conf instead of fixed hardcoding values
- update with **git pull** now safe, own config out-sourced to *.inc.php files (will be not overwritten)

## Fundamental changes compared to the original FM-Poland Dashboard ##

- make the code smaller and more compact
- reduce a lot of hard-coded things to a minimum
- read the most values for variables direct from svxlink.conf instead of fixed hardcoding values in code
- add a Syscheck script for check the environment (PHP, OS, SVXLINK and it's svxlink.conf) if it can be used for this dashboard (detect and minimized problems with PHP build-in function **php_config_parser** for svxlink.conf)
- remove a lot of things/code we don't need for running as a dashboard for public repeaters
- make the dashboard "update-safe" for use with **git pull** to keep it up-to-date easy
- extend some functions for better practical use with the repeater (change TG, add temporary time-limited TG, show ECHOLINK status/transmit)
- add/get SVXReflector status with more information as a replacement for a external SVXReflector dashboard

73 Heiko, DL1BZ
