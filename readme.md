# Ubuntu Apache Mysql CRUD/API template

Single Page App connecting to a basic php api utilising CDN based libraries, Jquery and Javascripts. No frameworks.

Includes docker file and shell script for launching the docker image. Script  creates a private subnet to communicate with seperate mysql/pgsql database container if applicable. The Docker file installs php extension for mysql/pgsql depedent on the Dockerfile you choose.

## Install instructions on your own Webserver

 * Clone this repo.
 * Apply the sql from /schema folder ```mysql -h nameofyoursever -u root -p < file.sql```
 * Update /html/resources/utils/db.php with your database specific.
 * Copy the html directory to your httpd directory on the server and browse.

## Install instructions using Docker

 * Make sure that you have Docker installed
 * Clone this repo to your local machine
 * Change into new folder and execute following.
 * Run ```docker-compose build```
 * Run ```docker-compose up```

