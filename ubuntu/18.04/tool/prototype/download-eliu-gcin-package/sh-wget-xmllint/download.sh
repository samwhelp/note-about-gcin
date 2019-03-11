#!/usr/bin/env bash

sudo apt-get install wget libxml2-utils

wget -c 'http://hyperrate.com/gcin-ubuntu1804/dists/eliu/release/binary-amd64/' -O binary-amd64.html

#xmllint --html --xpath "//a/@href" binary-amd64.html | sed 's/ /\n/g' | awk -F '=' '{print $2}' | awk -F '"' '{print $2}' | grep deb
xmllint --html --xpath "//a/@href" binary-amd64.html | sed 's/ /\n/g' | awk -F '=' '{print $2}' | awk -F '"' '{print $2}' | grep deb | awk '{print "http://hyperrate.com/gcin-ubuntu1804/dists/eliu/release/binary-amd64/"$1}' > binary-amd64.txt

wget -c -i binary-amd64.txt
