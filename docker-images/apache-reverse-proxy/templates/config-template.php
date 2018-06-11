<?php 
	$static_app1 = getenv('STATIC_APP_1');
	$static_app2 = getenv('STATIC_APP_2');
	$static_app3 = getenv('STATIC_APP_3');	
	$dynamic_app1 = getenv('DYNAMIC_APP_1');
	$dynamic_app2 = getenv('DYNAMIC_APP_2');
	$dynamic_app3 = getenv('DYNAMIC_APP_3');
?>

<VirtualHost *:80>
# the DNS name that host can use to attempt our service
	ServerName demo.res.ch

	#define the dynamic server 
	<Proxy balancer://dynamic_app>
	BalancerMember http://<?php print "$dynamic_app1"?>:3000/api/wine/
	BalancerMember http://<?php print "$dynamic_app2"?>:3000/api/wine/
	BalancerMember http://<?php print "$dynamic_app3"?>:3000/api/wine/
	Order allow,deny
	Allow from all

	#
	ProxySet lbmethod=byrequests
	</Proxy>

	# handle the dynamic content provides by dockerised express
	# Mapping the inbound request handler fot thre ressource "/api/wine"
	ProxyPass '/api/wine/' balancer://dynamic_app/

	# outbound : HTTP response back to the client
	ProxyPassReverse '/api/wine/' balancer://dynamic_app/


	#Define the static server
	<Proxy balancer://static_app>
	BalancerMember http://<?php print "$static_app1"?>/
	BalancerMember http://<?php print "$static_app2"?>/
	BalancerMember http://<?php print "$static_app3"?>/

	Order allow,deny
	Allow from all
	ProxySet lbmethod=byrequests
	</Proxy>

#  Handle the static content provides by dockerised apache static 
	ProxyPass '/'  balancer://static_app/
	ProxyPassReverse '/'  balancer://static_app/

</VirtualHost>