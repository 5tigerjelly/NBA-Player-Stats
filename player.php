<?php
	class Player {

		private $name;
		private $teamname;
		private $ppg;
		private $ptm;
		private $reb;
		private $ast;
		private $stl;
		private $bik;
		private $to;

		public function __construct($player){
			$this->name = $player["FULLNAME"];
			$this->teamname = $player["TEAM"];
			$this->ppg = $player["M_PPG"];
			$this->ptm = $player["3_M"];
			$this->reb = $player["R_TOT"];
			$this->ast = $player["M_AST"];
			$this->stl = $player["M_STL"];
			$this->bik = $player["M_BLK"];
			$this->to = $player["M_TO"];
		}

		public function getName(){
			return $this->name;
		}

		public function getTeamname(){
			return $this->teamname;
		}

		public function getPPG(){
			return $this->ppg;
		}

		public function getPTM(){
			return $this->ptm;
		}

		public function getREB(){
			return $this->reb;
		}

		public function getAST(){
			return $this->ast;
		}

		public function getSTL(){
			return $this->stl;
		}

		public function getBIK(){
			return $this->stl;
		}

		public function getTO(){
			return $this->to;
		}

		public function getIMG(){
			$lowername = str_replace(" ", "_", strtolower($this->name));
			return "http://i.cdn.turner.com/nba/nba/.element/img/2.0/sect/statscube/players/large/{$lowername}.png";
		}

		public function getTeamLogo(){
			$teamlogo = strtolower($this->teamname);
			return "http://a.espncdn.com/combiner/i?img=/i/teamlogos/nba/500/{$teamlogo}.png&w=110&h=110&transparent=true";
		}
	}
?>