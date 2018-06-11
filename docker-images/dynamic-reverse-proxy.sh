#!/bin/bash

echo "Step5: Dynamic reverse proxy"

docker build -t res/apache_st apache-php-image/.

# step 1 port mapping 
docker run -d -p 9090:80 --name static-9090 res/apache_st
docker run -d -p 9090:80 --name static-1010 res/apache_st

for (( c=1; c<=5; c++ ))
do  
   docker run -d res/apache_st
done

echo "creation static container"
docker run -d --name apache_static res/apache_st


echo "creation express image"
docker build -t res/express express-image/.


echo "creation express container"
for (( c=1; c<=5; c++ ))
do  
   docker run -d res/express
done

docker run -d --name express_dynamic res/express

docker build -t res/apache_rp apache-reverse-proxy/.


docker inspect apache_st | grep -i ipaddress

docker inspect express | grep -i ipaddress

ip_static=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' apache_static)
ip_dynamic=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' express_dynamic)

docker run -d -p 8080:80 -e STATIC_APP=$ip_static -e DYNAMIC_APP=$ip_dynamic --name apache_rp res/apache_rp
