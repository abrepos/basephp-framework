#!/bin/bash
#
# Project: BasePHP Framework
# File: provision.sh created by Ariel Bogdziewicz on 29/07/2018
# Author: Ariel Bogdziewicz
# Copyright: Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
# License: MIT
#
export DEBIAN_FRONTEND=noninteractive
export PROJECT_DIR=/home/vagrant/www/basephp-framework
export FILES_DIR="${PROJECT_DIR}/vagrant/files"

install_language_packs() {
    echo "Installing language packs"
    apt-get -y install language-pack-pl
    apt-get -y install language-pack-de
}

website_configuration() {
    echo "Configuring directories for website"
    mkdir -p /home/vagrant/logs/basephp-framework

    echo "Apache configuration for website"
    cp "${FILES_DIR}/etc/apache2/sites-available/100-basephp-framework.conf" /etc/apache2/sites-available/100-basephp-framework.conf
    chmod 644 /etc/apache2/sites-available/100-basephp-framework.conf
    chown root:root /etc/apache2/sites-available/100-basephp-framework.conf
    a2ensite 100-basephp-framework

    echo "Executing composer"
    su - vagrant -s /bin/bash -c "cd ${PROJECT_DIR} && php composer.phar install"

    echo "Restarting Apache"
    service apache2 reload
}

echo "BasePHP Framework - Provisioning virtual machine..."
install_language_packs
website_configuration
