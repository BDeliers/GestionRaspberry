<?php
	require_once('./class/modules.class.php');
	$modules = new Modules();
	$date = $modules->dateFr();
	$uptime = $modules->getUptime();
	$users = $modules->countUsers();
	$freq = $modules->frequenceCPU();
	$temp = $modules->temperature();
	$ram = $modules->ramUse();
	$sd = $modules->sdUse();
?>
<!DOCTYPE HTML>
	<!--Module de gestion pour le Raspberry Pi fait par Balthazar Deliers en FRANCAIS-->
	<!--Version 2.2 : seconde refonte graphique et nouvelles fonctions (SD et RAM)-->
	<!--Juin 2015-->
	<!--http://bdeliers.com-->
<html lang="fr"> 
	<head>
		<title>Gestion Raspberry</title>
		<link rel="stylesheet" type="text/css" href="./css/mobile.css" />
		<link href="./img/favicon.png" rel="shortcut icon" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, maximum-scale=1"/>
		<meta charset="UTF-8" />
	</head>
	<body>
		<section id="content">

			<div class="bloc" id="firstBloc">
				<span class="icon titre">
				</span>
			</div>	

			<div class="bloc">
				<span class="icon calendar">
				</span>
				<div class="txt" id="firstTxt">
					<?php echo $date[1];?> <?php echo $date[0];?> <?php echo $date[2];?>
				</div>
			</div>

			<div class="bloc">
				<span class="icon users">
				</span>
				<span class="txt">
					<?php echo $users; ?>
				</span>
			</div>

			<div class="bloc">
				<span class="icon uptime">
				</span>
				<span class="txt">
					<?php  echo $uptime;?>
				</span>
			</div>

			<div class="bloc">
				<span class="icon temp">
				</span>
				<span class="txt">
					<?php echo $temp; ?>
				</span>
			</div>

			<div class="bloc">
				<span class="icon freq">
				</span>
				<span class="txt">
					<?php echo $freq; ?>
				</span>
			</div>

			<div class="bloc">
				<span class="icon ram">	
				</span>
				<span class="txt">
					<?php  echo $ram;?>
				</span>
			</div>

			<div class="bloc">
				<span class="icon sd">
				</span>
				<span class="txt">
					<?php echo $sd; ?>
				</span>
			</div>

			<div class="bloc" onclick="reboot()">
				<span class="icon reboot">
				</span>
				<span class="txt">
					Redémarrer
				</span>
			</div>	

			<div class="bloc" onclick="halt()">
				<span class="icon halt">
				</span>
				<span class="txt">
					Eteindre
				</span>
			</div>	

			<div class="bloc copyright">
				<span id="txt_copy">
					&copy; <a href="http://bdeliers.com" target="blank">Balthazar Deliers</a> 2015
				</span>
			</div>
		</section>
	</body>
		<script type="text/javascript" src="./script/script.js"></script>
		<script type="text/javascript">setTimeout(function(){window.location.reload()}, 180000);</script>
</html>