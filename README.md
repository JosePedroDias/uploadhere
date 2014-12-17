# Basic PHP-based upload/download of files

Assumes Apache2 server with PHP module and AllowOverride All option on Vhost or allow symlinks yourself...

Make sure you create a ``files`` dir with rwx access to the apache user. In Ubuntu it's done like this:
	
	mkdir files
	chown www-data files
	chmod u+rwx files

Increase the file limits for PHP in apache2

    sudo nano /etc/php5/apache2/php.ini
    ctrl + W
    upload_max_filesize = 1024MB
    memory_limit = 1024M
    post_max_size = 1024MB
