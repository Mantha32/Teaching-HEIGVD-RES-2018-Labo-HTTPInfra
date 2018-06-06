FROM php:7.0-apache

LABEL description="Create the mock reverse-proxy server mimics the gateway server \
The http itself does not generate or host the data \
The content is obtained by static and dynamic server which have no direct connect to the external\
this is the entry point to our infrastructure\
The default http port is 8080."
LABEL authors="Yosra Harbaoui, Iando Rafidimalala"
LABEL version="1.0"


RUN apt-get update && apt-get upgrade -y

# Copy the our own script version
COPY apache2-foreground /usr/local/bin

# Copy the content in the template folder: our own virtaul configuration with the dynamic URL 
COPY templates /var/apache2/templates

# Copy our own apache configuration file
COPY conf/ /etc/apache2

#Enable the plugin proxy and proxy_http module
RUN a2enmod proxy && a2enmod proxy_http

# Enable our config
RUN a2ensite 000-* 001-reverse-proxy.conf



# Set up the default port
# The container listen on this specific port
# It's possible to override this port when you run a container with the option -p or --publish portOut:portIn
# Alter the portIn value as you want
EXPOSE 8080

