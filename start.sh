#!/bin/sh

if (( $# != 1 ))
then
    echo "Please provide the root mysql password as an argument."
    exit 1
fi

# mamp_dir=$(find /Applications -name ctlscript.sh)
ctl="/Applications/mampstack-7.3.10-0/ctlscript.sh"
mamp_dir=${ctl%/*}

if lsof -Pi :3306 -sTCP:LISTEN -t >/dev/null ; then
    echo "MySQL is running."
else
    echo "Starting MySQL"
    $ctl start mysql
    exit 1
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

$myphp -S localhost:8080 -t public/
