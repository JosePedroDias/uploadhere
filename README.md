# simple PHP-based upload/download of files

assumes Apache2 server with PHP module and AllowOverride All option on Vhost or allow symlinks yourself...

make sure you create a files dir with rwx access to the apache user
	
	mdkir files
	chown www-data files
	chmod u+rwx files

