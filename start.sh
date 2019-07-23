#!/bin/sh
service apache2 restart;
service sendmail restart;
service mysql start;
cd /var/www/html;
php config/setup.php;
mkdir /var/www/html/api/lol;
chown www-data:www-data /var/www/html/api/lol;
chmod 755 /var/www/html/api/lol;
tail -F /var/log/apache2/error.log;
