# Palworld Status Page
Simple status page for dedicated Palworld servers.

This page will inform you if the server is online, and list the server version and the players currently online.

## Installation

After cloning the repo to your web server, copy or move the example-config.json to config.json and css/example-style.css to css/style.css. Edit your config.json file to match your server login details.

Any style changes desired can be made in style.css. The example code will pull in a jpg titled 'background.jpg' by default if you just want to add a background image.

## V2 Update Changes
Previously this used RCON for communication with the server, but with the introduction of the server api, this is no longer needed. Previous config.json files will need to be rewritten based off of the new example.