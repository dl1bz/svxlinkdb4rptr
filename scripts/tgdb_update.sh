#!/bin/sh

timestamp=$(date +'%m.%d.%Y')

TABLE_url=https://fm-funknetz.de/Download/tgdb_site.php
TABLE_ofile=/tmp/tglist.tmp
PHP_ofile=/var/www/html/include/tgdb.inc.php

echo "Get TG list fom https://fm-funknetz.de/Download/tgdb_site.php"

# python3 script for output HTML tables from an URL
# requires python3
# apt-get install python3-pip
# pip3 install html-table-parser-python3

html_table_converter -u $TABLE_url > $TABLE_ofile

echo -n "Edit the TG List..."

sed -i "s=\]\]==g" $TABLE_ofile
sed -i "s=\[\[==g" $TABLE_ofile
sed -i "s=TG ==g" $TABLE_ofile
# sed -i "s=, =,=g" $TABLE_ofile
sed -i "s=','=' \=\> '=g" $TABLE_ofile
sed -i "s= '='=g" $TABLE_ofile
sed -i "s=\[==g" $TABLE_ofile
sed -i "/^'0'/d" $TABLE_ofile
sed -i "/^'1'/d" $TABLE_ofile
sed -i "/^'9999'/d" $TABLE_ofile
sed -i "/^'2629004'/d" $TABLE_ofile
sed -i "/'bitte/d" $TABLE_ofile
sed -i "s/Lausitzlink/LausitzLink/g" $TABLE_ofile
sed -i "s=,Niedersachen=, Niedersachsen=g" $TABLE_ofile
sed -i "s=(Sharing)=(TG Sharing)=g" $TABLE_ofile

echo "done"

echo -n "Generate $PHP_ofile ..."

echo "<?php" > $PHP_ofile
echo "/* talkgroup / number alias database */" >> $PHP_ofile
echo "/* last update: $timestamp from $TABLE_url */" >> $PHP_ofile
echo "/* (C) 2022 by Heiko, DL1BZ */" >> $PHP_ofile
echo -n "\$tgdb_array = [" >> $PHP_ofile
# cat $TABLE_ofile >> $PHP_ofile
echo -n "$(cat $TABLE_ofile)" >> $PHP_ofile
echo "];" >> $PHP_ofile
echo "?>" >> $PHP_ofile

echo -n "finalizing..."

sed -i "s=,\];=\] ;=g" $PHP_ofile
sed -i "s=','=' \=\> '=g" $PHP_ofile
sed -i "s/RegionThüringen/Region Thüringen/g" $PHP_ofile

rm $TABLE_ofile
chown svxlink:svxlink $PHP_ofile

echo "done."