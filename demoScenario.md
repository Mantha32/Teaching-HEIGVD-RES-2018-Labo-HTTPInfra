# INFRA DEMO

## Preparation
### Docker command



| Description                         |            Command  |
| -------------------------------------------|:------------------:|
| Remove all untagged (no explicit name) images  | ` docker rmi $(docker images --quiet --filter "dangling=true")` |
|  Remove all no explicit name container   |  `docker rm $(docker ps -a -q)` |
|  kill a container    |  `docker kill container-name` |
|  Build a image  |  `docker build -t image-name .` |
|  Inspect the inner address of a container  |  `docker inspect image-name  grep -i IPAddress` |



## Step 1: server Static
### Clean up docker
- kill an active container: `docker kill $(docker ps)`
- remove all the container: `docker rm $(docker ps -a)`
- remove images if necessary : `docker rmi $(docker images --quiet --filter "dangling=true")`


### Procedure
- pwd: `cd /home/fidimala/Documents/semestre_hivers_1718/SEM_5/RES/Labo/Teaching-HEIGVD-RES-2018-Labo-HTTPInfra/docker-images/apache-php-image`
- Build the image:    `docker build -t res/appache-php-static`
- run an container: `docker run -d -p 8080:80 --name web-static res/apache-php-static`


## Step2: server dynamic with Express
Clean the docker up


## Step3: Reverse proxy-server

## Step4: AJAX requests with JQuery

## Step5: Dynamic reverse proxy
### how to work
Repo-github php:7.0-apache:

`https://github.com/docker-library/php/tree/master/7.0/jessie/apache`

Why

In the php image Dockerfile:


### Demo-scenario
#### Show off the configuration
- Create the image server static: `docker build -t res/apache-st .`
- Create the container : ``
- Create the image server dynamic: `docker build -t res/express .`
- Create the image server reverse proxy:  `docker build -t res/apache-rp .`



## Extra
