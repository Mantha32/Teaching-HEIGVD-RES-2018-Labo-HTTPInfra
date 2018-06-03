FROM php:7.0-apache

LABEL description="Create the mock reverse-proxy server mimics the gateway server \
The http itself does not generate or host the data \
The content is obtained by static and dynamic server which have no direct connect to the external\
this is the entry point to our infrastructure\
The default http port is 8080."
LABEL authors="Yosra Harbaoui, Iando Rafidimalala"
LABEL version="1.0"


RUN apt-get update && apt-get upgrade -y

# Copy our own apache configuration file
COPY conf/ /etc/apache2/sites-available/

#Enable the plugin proxy and proxy_http module
RUN a2enmod proxy && a2enmod proxy_http

# Disable the default site
RUN a2dissite 000-default

# Enable our config
RUN a2ensite 001-reverse-proxy.conf

#Reload HTTPD Configuration File Without Restarting Apache Config Changes
#RUN /etc/init.d/apache2 reload

#RUN service apache2 reload


# Set up the default port
# The container listen on this specific port
# It's possible to override this port when you run a container with the option -p or --publish portOut:portIn
# Alter the portIn value as you want
EXPOSE 8080