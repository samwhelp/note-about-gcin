

install: apt-get-update package-install im-config-set
	@install.sh
.PHONY: install


remove: package-remove im-config-reset
	@remove.sh
.PHONY: remove


package-install:
	@package-install.sh
.PHONY: package-install


package-remove:
	@package-remove.sh
.PHONY: package-remove
