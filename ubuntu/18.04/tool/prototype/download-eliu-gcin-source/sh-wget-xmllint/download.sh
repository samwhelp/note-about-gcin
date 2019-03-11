#!/usr/bin/env bash

sudo apt-get install wget libxml2-utils

#wget -c --html-extension 'https://hyperrate.com/gcin-source/'
wget -c 'https://hyperrate.com/gcin-source/' -O gcin-source.html

#xmllint --xpath "//a/@href" gcin-source.html | sed 's/ /\n/g' | awk -F '=' '{print $2}' | awk -F '"' '{print $2}' | grep gcin

xmllint --xpath "//a/@href" gcin-source.html | sed 's/ /\n/g' | awk -F '=' '{print $2}' | awk -F '"' '{print $2}' | grep gcin | awk '{print "https://hyperrate.com/gcin-source/"$1}' > gcin-source.txt

wget -c -i gcin-source.txt
