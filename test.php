<?php 
	include_once('player.php');
	$db = new PDO("mysql:dbname=info344db;host=info344db.cryrhjhe9zkn.us-west-2.rds.amazonaws.com:3306","info344user", "qjaanr208");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$listofplayers = $db->query("SELECT FULLNAME FROM PLAYER")->fetchAll(PDO::FETCH_ASSOC);
	
	if(isset($_GET["name"])){
		$namechop = explode(" ", $_GET["name"]);
		$cleanName = $db->quote("{$namechop[0]}");
		$cleanlastname = "";
		if(count($namechop) > 1){
			$lastname = end($namechop);
			$cleanlastname = $db->quote("{$lastname}");
		}
		
		$test = $db->query("SELECT * FROM PLAYER WHERE levenshtein(FNAME, {$cleanName}) < 2 || levenshtein(LNAME, {$cleanName}) < 2")->fetchAll(PDO::FETCH_ASSOC);
	}
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>NBA Search</title>
	<link rel="stylesheet" type="text/css" href="nba.css">
</head>
<body>

<div id=container>
<a href="test.php">
<h1>NBA Player Stats</h1>
<img id="logo" src="http://a.espncdn.com/combiner/i?img=/i/teamlogos/leagues/500/nba.png?transparent=true"  height="200px" width="200px" /></a>
	<form action="test.php" method="get">
			<div>
				<input name="name" type="text" placeholder="Name" autofocus="autofocus" list="playerlist"/> 
				<datalist id="playerlist">
					<?php
						foreach ($listofplayers as $player) {
							echo "<option>{$player[FULLNAME]}</option>";
						 } 
					?>
				</datalist>
				<input id="button" type="submit" value="search" />
			</div>
	</form>
<?php
	foreach ($test as $player) {
		$nbaPlayer = NEW Player($player);
		?>
			<div class= "player">
				<div class="innercontainer">
				</div>
				<img class= "playerimg" width="230px" height="185px" alt= "player" src= <?php echo $nbaPlayer->getIMG() ?> onerror="this.src='http://i.cdn.turner.com/nba/nba/.element/img/2.0/sect/statscube/players/large/default_nba_headshot_v2.png'">
				<img class= "teamlogo" height= "110px" alt= "teamlogo" src= <?php echo $nbaPlayer->getTeamLogo() ?>>
			
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
	<a href="http://5tigerjelly.com">Made By Bum Mook Oh 2016</a>
</footer>
</body>
</html>


