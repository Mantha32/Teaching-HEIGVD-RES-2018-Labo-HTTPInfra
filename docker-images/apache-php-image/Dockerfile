FROM php:7.0-apache

LABEL description="Create the mock apache web server mimics the http server \
Using this server instead of the real one is safe to test our http static website \
You can change the port expose by the mock web server as you want to communicate with the http server.\
The default http port is 80."
LABEL authors="Yosra Harbaoui, Iando Rafidimalala"
LABEL version="1.0"

#
# Replace the directory with your own directory that stands the source file
# we use the standard folder where hold our static web content
# example /var/www/html/
#

COPY content/ /var/www/html/

# Set up the default port
# The container listen on this specific port
# It's possible to override this port when you run a container with the option -p or --publish portOut:portIn
# Alter the portIn value as you want
EXPOSE 80
