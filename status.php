        <?php

$string = file_get_contents("https://mcapi.ca/query/mc.minesuperior.com/info");
$string = rtrim($string, "\0");
$jsonDecode = json_decode(trim($string), true);
$players = json_decode($jsonDecode->players);

if($jsonDecode['status'] == false){
    echo("Offline<br>");
    echo("Reason: $jsonDecode->error");
}else{
    echo("Online!<br>");
    echo("Players:<br>");
    echo($jsonDecode['players']['online'] ." / ".$jsonDecode['players']['max']);
    echo("<br>".$jsonDecode['version']);
    
      $string = file_get_contents("https://mcapi.ca/query/us.mineplex.com/list");
    $string = rtrim($string, "\0");
    $jsonDecode = json_decode(trim($string), true);
    foreach($jsonDecode['Players']['list'] as $player){
       echo($player);
    }

    
}
?>