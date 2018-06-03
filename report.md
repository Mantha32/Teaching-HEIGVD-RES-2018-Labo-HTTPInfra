# RES - HTTP Infrastructure - Lab report
---
## Step 1 : Static HTTP server with apache httpd
On this first step, we build a simple static webpage running on dockerised Apache server. We use bootstrap's template to build quickly with our own content.
We build the content up  in `src/` in our local machine. When we create the dockerised server Apache, we copy the `src/` folder into the local file system of the image  `/var/www/html/` according the Apache setup. The docker image is based on `php:7.0-apache` image. This image is packaged with Apache web server.

This command build the image. We assume that the current directory hold our `Dockerfile`.
We use the default apache configuration for this step. All we have to do is to building the docker image with our static content.

![image](images/Step1-Infrastructure.png)

This below table show off our setup command

| docker command                             |            Description  |
| -------------------------------------------|:------------------:|
|  ` docker build -t res/apache-php-static .`| To build the static content web server. The    current directory hold our `Dockerfile` |
| ` docker run -d -p 9090:80 --name web-static res/apache-php-static`      | To run the container based on the image that we have been created before. This container listen on the 80 and the docker expose the port 9090. we change the exposed port when we run another container.|

We inspect the container to check out his IP address.We use , in linux machine,  the docker engine IP address because the container use docker IP as a gateway.

![image](images/Step1IP-Address.png)

We run the container `web-static ` based on the image ` res/apache-php-static`. This below image show off the result. We connect to our static web using the port-mapping providing by docker.

![image](images/Step1StaticWebServer.png)

Otherwise, we can connect directly knowing the container IP address.

![image](images/Step1-connect2-container.png)

## Step 2:  Dynamic HTTP server with express.js
