#!/bin/sh

docker kill $(docker ps -q)
docker rm $(docker ps -qa)

docker rmi res/apache_rp 
docker rmi res/express 
docker rmi res/apache_st 


docker ps -a
docker images
