# Swoop Cumulative Chart

Single Page App connecting to a basic php api utilising CDN based libraries, Jquery and Javascripts. No frameworks.


Includes docker file and shell script for launching the docker image. Script  creates a private subnet to communicate with seperate mysql/pgsql database container if applicable. The Docker file installs php extension for mysql/pgsql depedent on the Dockerfile you choose.

## Install instructions on your own Webserver

 * Clone this repo.
 * Apply the sql from /schema folder ```mysql -h nameofyoursever -u root -p < swoop.sql```
 * Update /html/resources/utils/db.php with your database specific.
 * Copy the html directory to your httpd directory on the server and browse.

## Install instructions using Docker

 * Make sure that you have Docker installed
 * Clone this repo to your local machine
 * Apply the sql from /schema folder ```mysql -h nameofyoursever -u root -p < swoop.sql```
 * Change into new folder and execute following.
 * Run ```docker-compose build```
 * Run ```docker-compose up```

## Application features
* PHP API endpoint in ROutes
* Jquery/Javascript front-end only. No frameworks
* PHP Objects, class extensions and PDO connection for db
* Bootstrap 4 styling
* Responsive Page
* CDN linked libraries