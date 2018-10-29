#!/bin/bash

# kill the docker if already running
sudo docker rm -f sti_project 2> /dev/null 1> /dev/null

sudo docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018

sudo docker exec -u root sti_project service nginx start
sudo docker exec -u root sti_project service php5-fpm start
sudo docker exec -u root sti_project chmod a+wx /usr/share/nginx/databases /usr/share/nginx/databases/db.sqlite

echo "Web interface PostMail launching on localhost port 8080..."
xdg-open localhost:8080 &
