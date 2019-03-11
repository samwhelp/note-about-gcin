#!/usr/bin/env bash

sudo apt-get install wget libxml2-utils

wget -c 'http://hyperrate.com/gcin-ubuntu1804/dists/eliu/release/binary-amd64/' -O binary-amd64.html

cat binary-amd64.html | grep -Po 'href=\".*?\"' | grep -Po '="\K[^"]+' | grep deb | awk '{print "http://hyperrate.com/gcin-ubuntu1804/dists/eliu/release/binary-amd64/"$1}' > binary-amd64.txt

wget -c -i binary-amd64.txt
