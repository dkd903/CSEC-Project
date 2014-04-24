Vhost Config
============

<VirtualHost *:80>
        DocumentRoot "/Users/[YOUR]/Sites/websec/"
        ServerName amazon.two
        ErrorLog "/private/var/log/apache2/amazon.two-error_log"
        CustomLog "/private/var/log/apache2/amazon.two-access_log" common

        <Directory "/Users/[YOUR]/Sites/websec">
                AllowOverride All
                Order allow,deny
                Allow from all
        </Directory>
</VirtualHost>
