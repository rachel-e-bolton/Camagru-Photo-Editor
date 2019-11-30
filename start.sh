#!/bin/sh

if (( $# != 1 ))
then
    echo "Please provide the root mysql password as an argument."
    exit 1
fi

if lsof -Pi :3306 -sTCP:LISTEN -t >/dev/null ; then
    echo "MySQL is running."
else
    echo "No MySQL instance found, please check that it is running."
    exit 1
fi


cd ./app/Config
touch .db_pass
printf "$@" > .db_pass

php CreateDatabase.php
# php Setup.php
# php LoadStickers.php

cd ../..

# php -S 0.0.0.0:8080 -t public/