CURL=/usr/bin/curl
PHP=php
MKDIR=/bin/mkdir

travis_install: install_nd2md
	# Composer is already installed on travis, simply
	# pull down the needed packages:
	composer install
	composer install --dev

install: install_nd2md install_composer

install_composer:
	@echo "Installing packages provided by composer:"
	$(CURL) -s http://getcomposer.org/installer | php
	$(PHP) composer.phar install --dev

install_nd2md:
	@echo "Downloading the NaturalDocs2Markdown converter:"
	$(CURL) https://raw.github.com/codeless/nd2md/master/nd2md.sh > nd2md.sh
	chmod ugo+x nd2md.sh

doc:
	./nd2md.sh README.txt > README.md

update:
	$(PHP) composer.phar update
	$(PHP) composer.phar update --dev

clean:
	rm -fr vendor/ composer.lock composer.phar nd2md.sh
