<?php 
	$static_app = getenv('STATIC_APP');
	$dynamic_app = getenv('DYNAMIC_APP');
?>

<VirtualHost *:80>
# the DNS name that host can use to attempt our service
	ServerName reverse-proxy.res.ch

# handle the dynamic content provides by dockerised express
	# Mapping the inbound request handler fot thre ressource "/api/wine"
	ProxyPass '/api/wine/' 'http://<?php print "$dynamic_app"?>/' 

	# outbound : HTTP response back to the client
	ProxyPassReverse '/api/wine/' 'http://<?php print "$dynamic_app"?>/'

#  Handle the static content provides by dockerised apache static 
	ProxyPass '/' 'http://<?php print "$static_app"?>/'
	ProxyPassReverse '/' 'http://<?php print "$static_app"?>/'

</VirtualHost>
