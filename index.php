<?php
	//Adjustable Varables
	$iconSize = 20;
	$serverIP = "we.buildbig.eu:25586";
	$serverName = "Build Big";

	include("MCStatusChecker.php");

	$statusChecker = new MCStatusChecker($serverIP);

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<title><?= $serverName ?></title>
</head>
<body>

<?php
	if(!$statusChecker->status){
?>

	<h1 class="cover-heading">Online: <i id="online" class="fa fa-times red"></i></h1>
	<p class="lead">Reason: <?= $statusChecker->errorMessage ?></p>

<?php }else{ ?>

<h1 class="cover-heading">Online: <i id="online" class="fa fa-check green"></i></h1>
<br>
<p class="lead">Version: <?= $statusChecker->version ?></p>
<p class="lead">Players online: <?= $statusChecker->playersOnline ?>/<?= $statusChecker->maxPlayersOnline ?></p>
	<?php if($statusChecker->playerList){ ?>
	<table class='players-list'>
		<?php foreach($statusChecker->playerList as $player){ ?>
			<tr class='player'><td class='icon'><img src='https://minotar.net/avatar/<?= $player ?>/<?= $iconSize ?>.png'></img><td><?= $player ?></td></tr>
		<?php } ?>
	</table>
	<?php } ?>
<?php } ?>
</body>
</html>
