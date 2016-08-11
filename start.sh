#!/bin/bash
source /etc/apache2/envvars
a2enmod rewrite
tail -F /var/log/apache2/* &
exec apache2 -D FOREGROUND
