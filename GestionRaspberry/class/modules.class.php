<?php

	//Fonctionnalités des blocs de Gestion Raspberry 2.2 par Balthazar DELIERS, juin 2015

	class Modules
	{
		public function dateFr()
		{
			$jour = date(l);
			$mois = date(F);
			$date = date(j);

			switch ($jour) {
				case 'Monday':
					$jour = 'Lun.';
					break;
				
				case 'Tuesday':
					$jour = 'Mar.';
					break;
				
				case 'Wednesday':
					$jour = 'Mer.';
					break;
				
				case 'Thursday':
					$jour = 'Jeu.';
					break;
				
				case 'Friday':
					$jour = 'Ven.';
					break;
				
				case 'Saturday':
					$jour = 'Sam.';
					break;
				
				case 'Sunday':
					$jour = 'Dim.';
					break;
				
				default:
					
					break;
			}

			switch ($mois) {
				case 'January':
					$mois = 'Janvier';
					break;
				
				case 'February':
					$mois = 'Février';
					break;
				
				case 'March':
					$mois = 'Mars';
					break;
				
				case 'April':
					$mois = 'Avril';
					break;
				
				case 'May':
					$mois = 'Mai';
					break;
				
				case 'June':
					$mois = 'Juin';
					break;
				
				case 'July':
					$mois = 'Juillet';
					break;
					case 'Wednesday':
					$mois = 'Mercredi';
					break;
				
				case 'August':
					$mois = 'Aout';
					break;
				
				case 'September':
					$mois = 'Septembre';
					break;
				
				case 'October':
					$mois = 'Octobre';
					break;
				
				case 'November':
					$mois = 'Novembre';
					break;
				
				case 'December':
					$mois = 'Décembre';
					break;

				default:
					
					break;
			}

			return array($date, $jour, $mois);

		}

		public function getUptime() 
		{
		  $fd = fopen('/proc/uptime', 'r');
		  $ar_buf = split(' ', fgets($fd, 4096));
		  fclose($fd);
		   
		  $sys_ticks = trim($ar_buf[0]);
		   
		  $min   = $sys_ticks / 60;
		  $hours = $min / 60;
		  $days  = floor($hours / 24);
		  $hours = floor($hours - ($days * 24));
		  $min   = floor($min - ($days * 60 * 24) - ($hours * 60));
		   
		  if ($days != 0) {
		  	if ($days == 1) {
		  		$result = $days.'j - ';
		  	}
		  	else{
		    	$result = $days.'j - ';
		  	}
		  }
		   
		  if ($hours != 0) {
		  	if ($hours == 1) {
		  		$result .= $hours.'h - ';
		  	}
		  	else{
		    	$result .= $hours.'h - ';
		  	}
		  }  
		  $result .= $min.'min. ';
		   
		  return $result;
		} 

		public function countUsers()
		{
			$users = exec('users');
			$nbusers = str_word_count($users);
			
			if ($nbusers == 1) {
				$phrase = '1 Utilisateur';
			}
			elseif ($nbusers == 0) {
				$phrase = '0 Utilisateur';
			}
			else{
				$phrase = $nbusers.' Utilisateurs';
			}
			
			return $phrase;
		}

		public function frequenceCPU()
		{
			$freq = exec('sudo vcgencmd measure_clock arm');
			$freq = substr($freq, 14, 3);
			return $freq.' MHZ';
		}

		public function temperature()
		{
			$temp = exec('awk \'{printf "%3.1f\n", $1/1000}\' /sys/class/thermal/thermal_zone0/temp');
			return $temp.'°C';
		}

		public function meteo() //flux de http://www.prevision-meteo.ch/services
		{
			$json = file_get_contents('http://www.prevision-meteo.ch/services/json/lille');
			$json = json_decode($json);
			return array($json->current_condition->tmp.' °C',$json->current_condition->icon);
		}

		public function ramUse()
		{
			$total = substr(exec('head -1 /proc/meminfo'), 10);
			$total = floor($total / 1000);
			$active = substr(exec('head -7 /proc/meminfo'), 7);
			$active = floor($active / 1000);

			return $active.'/'.$total.' Mo';
		}

		public function sdUse()
		{
			$space = exec('df -h /');
			$use = substr($space, 22, 3);
			$total = substr($space, 16, 3);
			return $use.'/'.$total.' Go';
		}
	}
?>