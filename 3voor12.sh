#!/bin/bash

# Check if a valid savedir is given
savedir=$1
if [ ! -d "$savedir" ]; then
	echo "Usage: $0 <savedir> <days>"
	echo "	savedir:"
	echo "		Location where the podcasts will be saved on disk."
	echo "	days:"
	echo "		Download mp3 files from the last x days. This parameter"
	echo "		is not required. The default is to download the mp3"
	echo "		from yesterday"
	exit
fi	
# Check if we can write to the given savedir
if [ ! -w "$savedir" ]; then
	echo "$0 does not have writing permissions for the savedir."
	exit
fi

# Set a default of 1 days, if none are given
days=$2
if [ -z $days ]; then
	days=1
fi

# Download the mp3 file(s)
timestamp=`date +"%s"` # Current time in seconds
counter=1 # Always start with yesterday, because the current day has no mp3 yet
while [ $counter -le $days ] # Lower or Equal
do
	loopdate=$(($timestamp - 60 * 60 * 24 * $counter))
	loopyear=`date  --date="@$loopdate" +"%Y"`
	loopmonth=`date  --date="@$loopdate" +"%m"`
	loopday=`date  --date="@$loopdate" +"%d"`

	url="http://download.omroep.nl/audiologging/r3/$loopyear/$loopmonth/$loopday/"
	file="2100_0000_3voor12_radio_$loopyear$loopmonth$loopday.mp3"

	if [ ! -f $savedir$file ]; then
		wget $url$file -P $savedir
	else
		wget --continue $url$file -P $savedir
	fi

	counter=$(( $counter + 1))
done
