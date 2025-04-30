#!/bin/bash
DIR="$1"
# init
# look for empty dira
if [ -d "$DIR" ]
then
	if [ "$(ls -A $DIR)" ]; then
     #echo "Take action $DIR is not Empty"
	 /usr/local/bin/yarn start
	else
    #echo "$DIR is Empty"
	/usr/local/bin/yarn build
	fi
else
	#echo "Directory $DIR not found."
	/usr/local/bin/yarn build && /usr/local/bin/yarn start
fi

