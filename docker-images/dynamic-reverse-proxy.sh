#!/bin/bash

echo "Step5: Dynamic reverse proxy"

docker build -t res/apache_st apache-php-image/.

# step 1 port mapping 
docker run -d -p 9090:80 --name static-9090 res/apache_st
docker run -d -p 1010:80 --name static-1010 res/apache_st

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
docker run -d --name express_dynamic_2 res/express

docker build -t res/apache_rp apache-reverse-proxy/.


ip_static_9090=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' static-9090)
ip_static_1010=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' static-1010)

echo "static-9090 IP Adress: " $ip_static_9090
echo "static-1010 IP Adress: " $ip_static_1010


ip_static=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' apache_static)
ip_dynamic=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' express_dynamic)
ip_dynamic_2=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' express_dynamic_2)

echo "apache_static IP Address: " $ip_static
echo "express_dynamic: " $ip_dynamic
echo "express_dynamic_2: " $ip_dynamic_2

docker run -d -p 8080:80 -e STATIC_APP=$ip_static -e DYNAMIC_APP=$ip_dynamic --name apache_rp res/apache_rp

docker ps -a
docker images
