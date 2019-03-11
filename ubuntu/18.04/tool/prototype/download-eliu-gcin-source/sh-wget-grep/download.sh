#!/usr/bin/env bash

sudo apt-get install wget libxml2-utils

wget -c 'https://hyperrate.com/gcin-source/' -O raw.html

xmllint --html --format raw.html > gcin-source.html

cat gcin-source.html | grep -Po 'href=\".*?\"' | grep -Po '="\K[^"]+' | grep gcin | awk '{print "https://hyperrate.com/gcin-source/"$1}' > gcin-source.txt

wget -c -i gcin-source.txt
