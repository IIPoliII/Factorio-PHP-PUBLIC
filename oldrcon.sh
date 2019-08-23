#!/bin/bash
CurrentHome=$PWD
Directory=$2
IP=$3
Port=$4
Password=$5

qote='"'
file='"hours.txt"'

if [ "$1" = "Players" ]
then
mkdir $Directory/script-output
$CurrentHome/mcrcon -H $IP -P $Port -p $Password '/players online' | sed -r "s/\x1B\[[0-9;]*[a-zA-Z]//g" | sed '1d' | sed 's/^..//' > $Directory/script-output/playersonline.txt
while read playersonline; do
playerfixed=$( echo "${playersonline}" | sed 's/ (online)//g')
player="$qote${playerfixed}$qote"
$CurrentHome/mcrcon -c -H $IP -P $Port -p $Password "/silent-command game.write_file($file, game.players[$player].online_time / 60 / 3600, false, 0)"
time=`cat $Directory/script-output/hours.txt`
timehour=$( printf "%2.2f\n" $time)
echo "$playersonline : played $timehour hours, minutes"
done <$Directory/script-output/playersonline.txt

while read players; do
if [[ $players == *"online"* ]]; then
	:
else
player="$qote${players}$qote"
$CurrentHome/mcrcon -c -H $IP -P $Port -p $Password "/silent-command game.write_file($file, game.players[$player].online_time / 60 / 3600, false, 0)"
time=`cat $Directory/script-output/hours.txt`
timehour=$( printf "%2.2f\n" $time)
echo "$players : played $timehour hours, minutes"
fi
done <$Directory/script-output/players.txt



fi
