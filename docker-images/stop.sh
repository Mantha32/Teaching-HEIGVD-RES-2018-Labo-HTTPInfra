#!/bin/sh

docker kill $(docker ps -q)
docker rm $(docker ps -qa)

docker rmi res/apache_rp 
docker rmi res/express 
docker rmi res/apache_st 

docker rmi $(docker images --quiet --filter "dangling=true")

docker ps -a
docker images
