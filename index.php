<?php
//Adjustable Varables

$iconSize = 20;
$serverIP = "Mc.Hypixel.Net";
$serverName = "Build Big";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html lang="en">
<head>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
    <title><?php echo($serverName) ?></title><!-- Bootstrap core CSS -->
</head>

<body>

                    <?php

    

$string = file_get_contents("https://mcapi.ca/query/".$serverIP."/info");
$string = rtrim($string, "\0");
$jsonDecode = json_decode(trim($string), true);


if($jsonDecode['status'] == false){?>

                        <h1 class="cover-heading">Online: <i id="online" class="fa fa-times red"></i></h1>
                        <p class="lead">Reason: <?php echo($jsonDecode['error']); ?></p>

                    <?php }else{ ?>

                        <h1 class="cover-heading">Online: <i id="online" class="fa fa-check green"></i></h1><br>
                  <?php     echo('<p class="lead">Version: ' .$jsonDecode['version']);
	echo('<p class="lead">Players online: '. $jsonDecode['players']['online'].'/'.  $jsonDecode['players']['max'].'</p>');
	$string = file_get_contents("https://mcapi.ca/query/" .$serverIP. "/list");
	$string = rtrim($string, "\0");
	$jsonDecode = json_decode(trim($string), true);
	echo "<table class='players-list'>";
	if ($jsonDecode['Players']['list']){
	foreach($jsonDecode['Players']['list'] as $player){
		echo("<tr class='player'><td class='icon'><img src='https://minotar.net/avatar/".$player."/".$iconSize.".png'</img><td>".$player."</td></tr>");
	}
	}
	echo "</table>";


}
?>

    

                <div class="mastfoot">
                    <div class="inner"></div>
    </body>
</html>
