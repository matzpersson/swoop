# Swoop Cumulative Chart

Single Page App connecting to a basic php api utilising CDN based libraries, Jquery and Javascripts. No frameworks.


Includes docker file and shell script for launching the docker image. Script  creates a private subnet to communicate with seperate mysql/pgsql database container if applicable. The Docker file installs php extension for mysql/pgsql depedent on the Dockerfile you choose.

## Install instructions on your own Webserver

 * Clone this repo.
 * Apply the sql from /schema folder ```mysql -h nameofyoursever -u root -p < swoop.sql```
 * Update /html/resources/utils/db.php with details for your database. In a production environment, i would use system environment variables.
 * Copy the html directory to your httpd directory on the server and browse.

## Install instructions using Docker

 * Make sure that you have Docker installed
 * Clone this repo to your local machine
 * Apply the sql from /schema folder ```mysql -h mysql_db -u root -p < swoop.sql```
 * Change into new folder and execute following.
 * Run ```docker-compose build```
 * Run ```docker-compose up```

## Application features
* PHP API endpoint in Routes for consumption by Ajax XHR connections.
* Jquery/Javascript front-end only. No frameworks.
* Using MorrisJs charts.
* PHP Objects, class extensions and PDO handling for db interaction.
* Bootstrap 4 styling
* Responsive Page
* CDN linked libraries
