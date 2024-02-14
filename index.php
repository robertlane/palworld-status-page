<?php
$serverConfig = json_decode(file_get_contents("config.json"),true);
$serverName = $serverConfig["server-name"];
$serverURL = $serverConfig["server-url"];
$serverPort = $serverConfig["server-port"];
$serverPassword = $serverConfig["server-password"];
$serverTimeZone = $serverConfig["server-timezone"];
$serverTime = date('m/d/Y h:i:s A');
$serverStatus = false;

$serverInfo = exec("rcon -a $serverURL:$serverPort -p $serverPassword info");
if (strpos($serverInfo, "Welcome") !== false) {$serverStatus = true;}
$serverVersion = substr($serverInfo, strpos($serverInfo, "[") + 1, strpos($serverInfo, "]") - strpos($serverInfo, "[") - 1);

$serverPlayersActive = shell_exec("rcon -a $serverURL:$serverPort -p $serverPassword showplayers");
$playerArray = str_getcsv($serverPlayersActive, "\n");
$playerHeaderShift = array_shift($playerArray);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $serverName; ?> - Server Status</title>
    <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <main>
        <div class="server-info">
            <h1><?php echo $serverName; ?></h1>
            <p><?php if ($serverStatus) {
                 echo "Server is online running version $serverVersion"; 
                 }
                 ;?></p>
            <p>Last checked at:</p>
            <p><?php echo "$serverTime $serverTimeZone"; ?></p>
        </div>
        
        <div class="players">
            <h2>Players Online</h2>
            <?php
            if (!$playerArray) {
                echo "<p>No Players Online</p>";
            } else {
                foreach ($playerArray as $player) {
                    $userEntries = str_getcsv($player, ",");
                    echo "<p>$userEntries[0]</p>";
                }
            }
            ?>
        </div>
    </main>
</body>
</html>
