# Basic PHP-based upload/download of files

Assumes Apache2 server with PHP module and AllowOverride All option on Vhost or allow symlinks yourself...

Make sure you create a ``files`` dir with rwx access to the apache user. In Ubuntu it's done like this:
	
	mkdir files
	chown www-data files
	chmod u+rwx files
