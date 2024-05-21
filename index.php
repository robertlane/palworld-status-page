<?php
include 'src/api.php';
$serverConfig = json_decode(file_get_contents("config.json"),true);
[
    "serverName" => $serverName,
    "serverURL" => $serverURL,
    "serverPort" => $serverPort,
    "serverUser" => $serverUser,
    "serverPassword" => $serverPassword,
    "serverTimezone" => $serverTimezone
] = $serverConfig;
$serverTime = date('m/d/Y h:i:s A');
$serverURL = "$serverURL:$serverPort";

$serverInfo = getServerInfo($serverURL, 'info', $serverUser, $serverPassword);

if ($serverInfo) {
    $serverMetrics = getServerInfo($serverURL, 'metrics', $serverUser, $serverPassword);
};

$serverStatus = !is_null($serverInfo) ? true : false;

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
                 echo "Server is online running version ".$serverInfo["version"]; 
                 } else {
                    echo "Server is offline or unreachable";
                 }
                 ;?></p>
            <p>Last checked at:</p>
            <p><?php echo "$serverTime $serverTimezone"; ?></p>
        </div>
        
        <div class="players">
            <h2>Players Online</h2>
            <?php
            if (!$serverStatus || $serverMetrics["currentplayernum"] === 0) {
                echo "<p>No Players Online</p>";
            } else {
                $playerArray = getServerInfo($serverURL, 'players', $serverUser, $serverPassword);
                foreach ($playerArray as $player) {
                    ["name" => $name, "level" => $level] = $player[0];
                    echo "<p><strong>$name</strong> - <em>Level $level</em></p>";
                }
            }
            ?>
        </div>
    </main>
</body>
</html>
