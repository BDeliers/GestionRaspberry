#Gestion Raspberry
Interface Web responsive design de monitoring pour le Raspberry Pi fait par BDeliers en FRANCAIS

Version 2.2 : seconde refonte graphique et nouvelles fonctions (SD et RAM)
Juin 2015

Pré requis :

      - un serveur web PHP d'installé sur votre Pi
      - autoriser les commandes sudo sans MDP a Apache : dans le terminal du Pi, 
      tapez "sudo visudo", ajoutez a la suite la ligne "www-data ALL(ALL) NOPASSWD : ALL", 
      enregistrez et redémarrez le pi.

Installation :

     1) Placez le dossier "GestionRaspberry" dans votre serveur web (par défaut /var/www)
     2) Accédez a votre Pi depuis un navigateur (mobile de préférence), 
     entrez dans le répertoire "GestionRaspberry", et c'est tout !
     Vous pouvez désormais avoir des infos en temps réel sur votre Rpi et l'éteindre/redémarrer a distance !
     
![alt tag](https://raw.githubusercontent.com/BDeliers/GestionRaspberry/master/screenshots.png)
