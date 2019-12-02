#!/bin/sh

if (( $# != 1 ))
then
    echo "Please provide the root mysql password as an argument."
    exit 1
fi


# Change this to the correct location
ctl=~/Desktop/mampstack-7.3.11-0/ctlscript.sh


mamp_dir=${ctl%/*}

if lsof -Pi :3306 -sTCP:LISTEN -t >/dev/null ; then
    echo "MySQL is running."
else
    echo "Starting MySQL"
    $ctl start mysql
fi

myphp="$mamp_dir/php/bin/php"

cd ./app/Config

echo "Adding .db_pass file"
touch .db_pass
printf "$@" > .db_pass




echo "Creating database"
$myphp CreateDatabase.php



echo "Creating tables"
$myphp Setup.php

echo "Loading Stickers"
$myphp LoadStickers.php

cd ../..

$myphp -S 0.0.0.0:8080 -t public/

exit 1