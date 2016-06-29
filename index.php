<?php
//Adjustable Varables

$iconSize = 20;
$serverIP = "we.buildbig.eu:25586";
$serverName = "Build Big";

?>
<!DOCTYPE html>
<!-- saved from url=(0039)http://getbootstrap.com/examples/cover/ -->

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css">

    <title><?php echo($serverName) ?></title><!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/cover/cover.css" rel="stylesheet" type="text/css">
    <link href="cover.css" rel="stylesheet" type="text/css"><!-- Just for debugging purposes. Don't actually copy this line! -->

    <style id="holderjs-style" type="text/css">
</style>
</head>

<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="inner cover">
                
                        <?php

$string = file_get_contents("https://mcapi.ca/query/".$serverIP."/info");
$string = rtrim($string, "\0");
$jsonDecode = json_decode(trim($string), true);


if($jsonDecode['status'] == false){
    echo('<h1 class="cover-heading">Online: <i id="online" class="fa fa-times red"></i></h1>');
        echo('<p class="lead">Reason: '. $jsonDecode['error'].'</p>');
}else{
    echo('<h1 class="cover-heading">Online: <i id="online" class="fa fa-check green"></i></h1><br>');
    echo('<p class="lead">Version: ' .$jsonDecode['version']);
    echo('<p class="lead">Players online: '. $jsonDecode['players']['online'].'/'.  $jsonDecode['players']['max'].'</p>');
    $string = file_get_contents("https://mcapi.ca/query/we.buildbig.eu:25586/list");
    $string = rtrim($string, "\0");
    $jsonDecode = json_decode(trim($string), true);
    echo "<table class='players-list'>";
    foreach($jsonDecode['Players']['list'] as $player){
       echo("<tr class='player'><td class='icon'><img src='https://minotar.net/avatar/".$player."/".$iconSize.".png'</img><td>".$player."</td></tr>");
    }
	echo "</table>";

    
}
?>
                    

                
                  

                    <p class="lead"><i id="list" class="fa-circle-o-notch fa-spin grey"></i></p>

                    </div>
            

                <div class="mastfoot">
                    <div class="inner"></div>
                </div>
            </div>
        </div><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript">
</script><!-- Latest compiled and minified JavaScript -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous" type="text/javascript">
</script>
    </div>
</body>
</html>
