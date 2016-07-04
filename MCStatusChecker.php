<?php
	class MCStatusChecker{
		public $status;
		public $errorMessage;
		public $playerList;
		public $playersOnline;
		public $maxPlayersOnline;
		public $version;

		function __construct($ip) {
			$statusData = makeApiRequest("https://mcapi.ca/query/".$ip."/info");

			if(!$statusData["status"]){
				$this->status = false;
				$this->errorMessage = $statusData["error"];
			}
			else{
				$serverInfo = makeApiRequest("https://mcapi.ca/query/".$ip."/list");

				$this->status = true;
				$this->playersOnline = $serverInfo["Players"]["online"];
				$this->maxPlayersOnline = $serverInfo["Players"]["max"];
				$this->playerList = $serverInfo["Players"]["list"];
				$this->version = $serverInfo["Version"];
			}
		}
	}

	function makeApiRequest($url){
		$string = file_get_contents($url);
		$string = rtrim($string, "\0");
		return json_decode(trim($string), true);
	}

?>
