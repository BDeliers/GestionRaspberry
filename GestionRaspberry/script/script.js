//script de Gestion Raspberry 2.2 par Balthazar DELIERS, juin 2015

(function()
{
      var larg;
   	var firstBloc;
   	var blocs;
   	var lh;
      var vert;
      var firstTxt;
      var heightTxt;
      var txt;

	//on recupère la largeur calculée par le navigateur de #firstBloc
	firstBloc = document.getElementById('firstBloc');
   firstTxt = document.getElementById('firstTxt');
	larg = window.getComputedStyle(firstBloc,null).getPropertyValue("width"); 
   marge = window.getComputedStyle(firstBloc,null).getPropertyValue("margin-left"); 

   //on l'applique a tous les blocs en tant que hauteur afin d'obtenir un carré
   blocs = document.querySelectorAll('.bloc');
   for (var i = 0; i < blocs.length; i++) {
      blocs[i].style.height = larg;
      blocs[i].style.marginTop = marge;
   }

   heightTxt = window.getComputedStyle(firstTxt,null).getPropertyValue("height"); 
   txt = document.querySelectorAll('.txt');
   for (var i = 0; i < txt.length; i++) {
      txt[i].style.lineHeight = heightTxt;
   }

   document.getElementById('txt_copy').style.lineHeight = larg;

   //on l'applique a tous les .vert en tant que hauteur et largeur afin de centrer verticalement
   //vert = document.querySelectorAll('.vert');
   //for (var i = 0; i < vert.length; i++) {
   //   vert[i].style.height = larg;
   //   vert[i].style.width = larg;
   //}

})()

function halt()
{
   var xhr = new XMLHttpRequest();
   xhr.open('GET', './actions/commandes.php?commande=halt');
   xhr.send(null);
   alert('Le PI va s\'éteindre');
}

function reboot()
{
   var xhr = new XMLHttpRequest();
   xhr.open('GET', './actions/commandes.php?commande=reboot');
   xhr.send(null);
   alert('Le PI va redémarrer');
}