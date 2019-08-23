<?php
/*Scripts, PHP to import */
/*Variables to set*/
/*The server path*/
$FactorioServerPath = "/home/fctrserver";
$FactorioDataPath = "$FactorioServerPath/serverfiles";
$FactorioServerLogPath = "$FactorioDataPath/factorio-current.log";
$RconIP = "127.0.0.1";
$RconPort = "34198";
$RconPassword = "YOURPASS";
/*Fonctions*/
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
/*Variables used in the sript*/
$VersionServer = `grep "Loading mod base" "${FactorioServerLogPath}" 2> /dev/null | awk '{print $5}' | tail -1`;
$LastestVersion = ` curl -s https://factorio.com/get-download/latest/headless/linux64 | grep -o '[0-9]\.[0-9]\{1,\}\.[0-9]\{1,\}' | head -1`;
$GameToken = `grep "Matching server game" "${FactorioServerLogPath}" 2> /dev/null | awk '{print $7}' | tail -1 | tail -c +2 | head -c -2`;
$GameState = `curl -s -X GET -H "Content-type: application/json" -H "Accept: application/json" "https://multiplayer.factorio.com/get-game-details/$GameToken"`;
$GameStateDown = `curl -s -X GET -H "Content-type: application/json" -H "Accept: application/json" "https://multiplayer.factorio.com/get-game-details/99999999999999999999999999"`;
$ClientIp = getRealIpAddr();
$Players = `./rcon.sh Players $FactorioDataPath $RconIP $RconPort $RconPassword`;
/*Retruning all*/
if ($GameState != $GameStateDown) {
  echo "<h2> The Server is up and running </h2>";
} else {
  echo "<h2> The Server is currently turned off </h2>";
}
if ( $VersionServer == $LastestVersion ) {
  echo "<h2> The Server is at the lastest Version : $VersionServer </h2>";
} else {
    echo "<h2> The Server is not at the lastest Vesrion current version : $VersionServer, Lastest Version : $LastestVersion </h2>";
}

echo "$Players";

echo "<div> Your IP is : $ClientIp </div>";

?>
