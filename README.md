# Palworld Status Page
Simple status page for dedicated Palworld servers.

This page will inform you if the server is online, and list the server version and the players currently online.

## RCON

Use of this page **requires** the use of an rcon client installed on the server. I use rcon-cli from https://github.com/gorcon/rcon-cli. Other clients may work if they follow the same command syntax.

### Installing RCON as a system binary

*While I recommend installing any binarys through your systems package manager, there are currently no packages for rcon-cli. Here is how I'm installing it for now. Keep in mind it is your responsiblitly to check for updates and manually replace the binary file if you install it this way.*

Place the binary in /usr/bin and made it executable (chmod +x). You will not need to configure the yaml file that comes with rcon-cli as the page will add the necessary arguments when you fill out the config.

## Installation

After cloning the repo to your web server, copy or move the example-config.json to config.json and css/example-style.css to css/style.css. Edit your config.json file to match your server login details.

Any style changes desired can be made in style.css. The example code will pull in a jpg titled 'background.jpg' by default if you just want to add a background image.