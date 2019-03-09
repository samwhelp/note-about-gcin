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
cat <<EOF

Usage:

$ make [command]

Ex:

$ make
$ make help

$ make apt-get-update

$ make install
$ make remove

$ make package-install
$ make package-remove

$ make im-config-set
$ make im-config-reset

EOF
}

__main__ "$@"
#
### Tail: main #################################################################
