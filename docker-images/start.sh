#!/bin/bash

echo "Step5: Dynamic reverse proxy"

echo "Build the images: static and dynamic"
docker build -t res/apache_st apache-php-image/.
docker build -t res/express express-image/.


docker run -d --name apache_static1 res/apache_st

for (( c=1; c<=3; c++ ))
do  
   docker run -d res/apache_st
done

docker run -d --name express_dynamic2 res/express

echo "creation static container and dynamic"
docker run -d --name apache_static2 res/apache_st
docker run -d --name express_dynamic1 res/express

echo "creation express container"
for (( c=1; c<=3; c++ ))
do  
   docker run -d res/express
done

docker run -d --name express_dynamic3 res/express
docker run -d --name apache_static3 res/apache_st


docker build -t res/apache_rp apache-reverse-proxy/.



ip_static1=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' apache_static1)
ip_static2=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' apache_static2)
ip_static3=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' apache_static3)


ip_dynamic1=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' express_dynamic1)
ip_dynamic2=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' express_dynamic2)
ip_dynamic3=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' express_dynamic3)


echo " ip_static1 : " $ip_static1
echo " ip_static2 : " $ip_static2
echo " ip_static3 : " $ip_static3

echo " ip_dynamic1 : " $ip_dynamic1
echo " ip_dynamic2 : " $ip_dynamic2
echo " ip_dynamic3 : " $ip_dynamic3


docker run -d -p 8080:80 -e STATIC_APP_1=$ip_static1 -e STATIC_APP_2=$ip_static2 -e STATIC_APP_3=$ip_static3 -e DYNAMIC_APP_1=$ip_dynamic1  -e DYNAMIC_APP_2=$ip_dynamic2 -e DYNAMIC_APP_3=$ip_dynamic3 --name apache_rp res/apache_rp


echo "build the container manager"

docker run -d -p 9000:9000 --name manager -v /var/run/docker.sock:/var/run/docker.sock portainer/portainer

ip_manager=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' manager)

echo "IP container manager : " $ip_manager
echo "checkout this ressource in your beloved browser : " $ip_manager":9000"

echo "check out the current running container and images"
docker ps -a
docker images

