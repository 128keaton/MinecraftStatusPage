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
	<script type="text/javascript" src="mc.js"></script>
	<title><?= $serverName ?></title>
</head>
<body>
	<script>
	 generateList("<?php echo($serverIP); ?>", <?php echo($iconSize); ?>);
	</script>
<div id="status"></div>
</body>
</html>
