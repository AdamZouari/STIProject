#!/bin/bash

sudo docker rm -f sti_project

sudo docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018

sudo docker exec -u root sti_project service nginx start

sudo docker exec -u root sti_project service php5-fpm start


