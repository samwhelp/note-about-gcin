#!/usr/bin/env bash


### Head: init #################################################################
#
THE_BASE_DIR_PATH=$(cd -P -- "$(dirname -- "$0")" && pwd -P)
THE_BASE_DIR_PATH="$THE_BASE_DIR_PATH/../ext"
source "$THE_BASE_DIR_PATH/init.sh"
#
### Tail: init #################################################################


### Head: main #################################################################
#
__main__ () {
	sudo apt-get install gcin gcin-qt5-immodule gcin-anthy gcin-voice
}

__main__ "$@"
#
### Tail: main #################################################################
