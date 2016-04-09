<?php 
	// calls in player.php file which contains player class information
	include_once('player.php');
	// connects to the AWS RDS
	$db = new PDO("mysql:dbname=info344db;host=info344db.cryrhjhe9zkn.us-west-2.rds.amazonaws.com:3306","info344user", "qjaanr208");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// fetches the names of the players to put in datalist.
	$playerList = $db->query("SELECT FULLNAME FROM PLAYER")->fetchAll(PDO::FETCH_ASSOC);
	
	//check if name parameter is set, and that the name is not empty string
	if(isset($_GET["name"]) && (trim($_GET["name"]) != '')){
		$cleanName = $db->quote("{$_GET["name"]}");	
		//Uses the levenshtein function which will allow users misspell the name up to 1 character.	
		$searchResult = $db->query("SELECT * FROM PLAYER WHERE levenshtein(FULLNAME, {$cleanName}) < 2 || levenshtein(LNAME, {$cleanName}) < 2 || levenshtein(FNAME, {$cleanName}) < 2")->fetchAll(PDO::FETCH_ASSOC);
	}
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>NBA Search</title>
	<!-- calls CSS file -->
	<link rel="stylesheet" type="text/css" href="nba.css">
</head>
<body>

	<div id=container>
	<a href="nba-search.php">
	<h1>NBA Player Stats</h1>
	<img id="logo" src="http://a.espncdn.com/combiner/i?img=/i/teamlogos/leagues/500/nba.png?transparent=true" /></a>
		<!-- search box -->
		<form action="nba-search.php" method="get">
				<div>
					<input name="name" type="text" placeholder="Name" autofocus="autofocus" list="playerlist"/>
					<!-- adds player full names to datalist to suggest player names. Does not work on Safari browser. -->
					<datalist id="playerlist">
						<?php
							foreach ($playerList as $player) {
								echo "<option>{$player[FULLNAME]}</option>";
							 } 
						?>
					</datalist>
					<!-- search button -->
					<input id="button" type="submit" value="search" />
				</div>
		</form>
	<?php
		// for each player a div with image, team logo, name and stats is made.
		foreach ($searchResult as $player) {
			$nbaPlayer = NEW Player($player);
			?>
				<div class= "player">
					<div class="innercontainer">
					</div>
					<!-- each player's image is called. If the image is not found, a default image is used in stead. -->
					<img class= "playerimg" width="230px" height="185px" alt= "player" src= <?php echo $nbaPlayer->getIMG() ?> onerror="this.src='http://i.cdn.turner.com/nba/nba/.element/img/2.0/sect/statscube/players/large/default_nba_headshot_v2.png'">
					<img class= "teamlogo" alt= "teamlogo" src= <?php echo $nbaPlayer->getTeamLogo() ?>>
				
					<h2><?php echo $nbaPlayer->getName() ?></h2>
					<table class="stats">
						<thead>
						<tr>
							<th>PPG</th>
							<th>PTM</th>
							<th>REB</th>
							<th>AST</th>
							<th>STL</th>
							<th>BIK</th>
							<th>TO</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td><?php echo $nbaPlayer->getPPG() ?></td>
							<td><?php echo $nbaPlayer->getPTM() ?></td>
							<td><?php echo $nbaPlayer->getREB() ?></td>
							<td><?php echo $nbaPlayer->getAST() ?></td>
							<td><?php echo $nbaPlayer->getSTL() ?></td>
							<td><?php echo $nbaPlayer->getBIK() ?></td>
							<td><?php echo $nbaPlayer->getTO() ?></td>
						</tr>
						</tbody>
					</table>
				</div>			
			<?php
		}

	?>
	</div>
	<footer>
		<!-- a link to my website -->
		<a href="http://5tigerjelly.com">Made By Bum Mook Oh 2016</a>
	</footer>
</body>
</html>


