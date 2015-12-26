<!DOCTYPE html>
<html lang="de-DE">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>cynHost Facebook App</title>
<link type="text/css" href="assets/style.css" rel="stylesheet" />
<link type="text/css" href="assets/jquery-ui.css" rel="stylesheet" />	
<link type="text/css" href="assets/buttons.css" rel="stylesheet" />
<script type="text/javascript" src="assets/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="assets/jquery-ui-1.8.16.custom.js"></script>
<script type="text/javascript">
$(function(){

	// Accordion
	$("#accordion").accordion({ header: "h3" });
	
	// Tabs
	$('#tabs').tabs();
	
	// Button
	$('button').button();
	
	// Dialog			
	$('#dialog').dialog({
		autoOpen: false,
		width: 600,
		draggable: false,
		buttons: {
			"Ok": function() { 
				$(this).dialog("close");
			}, 
			"Abbrechen": function() { 
				$(this).dialog("close"); 
			} 
		}
	});
	
	// Dialog Link
	$('#dialog_link').click(function(){
		$('#dialog').dialog('open');
		return false;
	});
	// Dialog Link
	$('#dialog_button').click(function(){
		$('#dialog').dialog('open');
		return false;
	});

	// Datepicker
	$('#datepicker').datepicker({
		inline: true
	});
	
	// Slider
	$('#slider').slider({
		range: true,
		values: [17, 67]
	});
	
	// Progressbar
	$("#progressbar").progressbar({
		value: 20 
	});
	
	//hover states on the static widgets
	$('#dialog_link, ul#icons li').hover(
		function() { $(this).addClass('ui-state-hover'); }, 
		function() { $(this).removeClass('ui-state-hover'); }
	);
	
});

$(document).ready(function() {
	
	var loading;
	var results;
	
	form = document.getElementById('form');
	loading = document.getElementById('loading');
	results = document.getElementById('results');
	
	$('#Submit').click( function() {
		
		//if($('#Search').val() == "")
		//{alert('Bitte geben Sie eine Domain ein.');return false;}
		
		results.style.display = 'none';
		$('#results').html('');
		loading.style.display = 'inline';
		
		$.post('inc/checkdomain.php?domain=' + escape($('#Search').val()) + '&domain2=' + $('select[name=domain2]').val(),{
		}, function(response){
			
			results.style.display = 'block';
			$('#results').html(unescape(response));	
			loading.style.display = 'none';
		});
		
		return false;
	});
	
});

function imgReload(imgId) {
	var path = document.getElementById(imgId).src;
	if(path.indexOf('?') < 1) path+= '?';
	path+= Math.round(Math.random()*9).toString();
	document.getElementById(imgId).src = path;
};

$(document).ready(function(e) {
    $("form input[type=reset]").click(function(e) {
        $("form input[type=text], form input[type=email], form input[type=password], form textarea").attr("value","");
        return false;
    });
});
</script>

</head>
	
<body marginheight="0" marginwidth="0">
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1676615215954981',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '893815290695120',
      xfbml      : true,
      version    : 'v2.5'
    });

    function onLogin(response) {
  if (response.status == 'connected') {
    FB.api('/me?fields=first_name', function(data) {
      var welcomeBlock = document.getElementById('fb-welcome');
      welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
    });
  }
}

FB.getLoginStatus(function(response) {
  // Check login status on load, and if the user is
  // already logged in, go directly to the welcome message.
  if (response.status == 'connected') {
    onLogin(response);
  } else {
    // Otherwise, show Login dialog first.
    FB.login(function(response) {
      onLogin(response);
    }, {scope: 'user_friends, email'});
  }
});
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<h1>cynHost • Facebook App</h1>
<h1 id="fb-welcome"></h1>



<noscript>
	<div class="ui-widget">
		<div class="ui-state-error ui-corner-all" style="padding: 0 .7em; padding-left:20px"> 
			<p>
				<strong><span>Hinweis:<br />Bitte aktiviere bei Deinem verwendeten Browser Javascript, damit die Seite korrekt angezeigt werden kann.</span></strong>
			</p>
		</div>
	</div>
</noscript>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Informationen</a></li>
		<li><a href="#tabs-3">Regeln</a></li>
	</ul>

	<div id="tabs-1">
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr>
	<td width="70%">Wir bieten kostenlose Webhosting Pakete zur Entwicklung und veröffentlichung von Projekten an.<br><br>
	Öffentliche Projekte müssen eine Gegenleistung einfügen.
	</td>
	<!--<td width="30%" align="center"><script type="text/javascript" src="https://www.startssl.com/validation.js"></script></td>-->
	</tr></table>

	<br />

	<table width="100%" border="0" cellpadding="3" cellspacing="1"><tbody>
	<tr class="even">
    <td style="padding-left: 4px;" height="20" width="25%">Paket</td>
    <td width="25%" align="center">Developers Package</td>
	</tr>
    <tr>
    <td style="padding-left: 4px;" height="20">Domain</td>
    <td align="center"><a href="#">https://wunsch.web.cynhost.de</a></td>
	</tr>
	<tr class="even">
    <td style="padding-left: 4px;" height="20">Speicherplatz</td>
    <td align="center">50 MB Speicher</td>
	</tr>
	<tr>
    <td style="padding-left: 4px;" height="20">Traffic</td>
    <td align="center"><a href="#" class="box">Traffic Flatrate (?)<span>Bei einer Überschreitung von 100 GB/Monat kann die Anbindung auf 10 MBit/s reduziert werden.</span></a></td>
	</tr>
	<tr class="even">
    <td style="padding-left: 4px;" height="20">MySQL Datenbanken</td>
    <td align="center">1x MySQL</td>
	</tr>
	<tr>
    
	<td style="padding-left: 4px;" height="20">Facebook Apps</td>
    <td align="center"><a href="#" class="box">max. 3 Apps erlaubt (?)<span>Sollen mehr als 3 Apps gehostet werden, bitte Paket #1 oder Paket #2 auf www.cynHost.de bestellen!</span></a></td>
	</tr>
	<tr class="even">
    <td style="padding-left: 4px;" height="20">PHP 5.4 / optional 5.3 und 5.5</td>
    <td align="center"><img src="assets/haken.gif.png"></td>
	</tr>
	<tr>
    <td style="padding-left: 4px;" height="20">AWstats / Statistiken</td>
    <td align="center"><img src="assets/haken.gif.png"></td>
	</tr>
	<tr class="even">
    <td style="padding-left: 4px;" height="20">WebFTP</td>
    <td align="center"><img src="assets/haken.gif.png"></td>
	</tr>
	<tr>
    <td style="padding-left: 4px;" height="20">Verzeichnisschutz</td>
    <td align="center"><img src="assets/haken.gif.png"></td>
	</tr>
	<tr class="even">
    <td style="padding-left: 4px;" height="20">IPv4 &amp; IPv6</td>
    <td align="center"><a href="#" class="box"><img src="assets/haken.gif.png" border="0"><span>IPv4 Adresse: <i>Hidden</i><br>IPv6 Adresse: <i>Hidden</i></span></a></td>
	</tr>
	<tr>
    <td style="padding-left: 4px;" height="20">https Verschlüsselung</td>
    <td align="center"><img src="assets/haken.gif.png"></td>
	</tr>
	<tr class="even">
    <td style="padding-left: 4px;" height="20">DDoS Protection</td>
    <td align="center"><img src="assets/haken.gif.png"></td>
	</tr>
	<tr>
    <td style="padding-left: 4px;" height="20">Plesk 12.x</td>
    <td align="center"><img src="assets/haken.gif.png"></td>
	</tr>
	<tr class="even">
    <td style="padding-left: 4px;" height="20">Gegenleistung</td>
    <td align="center" valign="top"><div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div><br></td>
	</tr>
	</tbody></table>
	</div>
	
<br><br>
			
	<div id="tabs-3">
		<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td width="100%">
			<b>§1 Allgemein</b><hr /><br />
			§1.1: Du musst mindestens 16 Jahre alt sein oder eine schriftliche Erlaubnis der Eltern besitzen.<br><br />
			§1.2: Falsche Angaben bei der Bestellung oder die Benutzung von Proxy-Servern / Trashmail-Diensten können zur Ablehnung bzw. Aufhebung des Sponsorings führen.<br><br />
			§1.3: cynHost.de hat das Recht, Bestellungen ohne Begründung abzulehnen.<br><br />
			§1.4: Pro Person bzw. Projekt ist nur ein Webspace Paket erlaubt.<br><br />
			$1.5: Wir übernehmen keine Haftung für Verfügbarkeit oder Beschädigung der Daten. Der Nutzer ist selbst dafür verantwortlich. Ein Recht auf Schadenersatz besteht nicht.<br><br />
			$1.6: Für eventuellen Datenverlust ist cynHost.de nicht verantwortlich.<br><br />
			$1.7: Die erbrachten Leistungen  können jederzeit ohne Angabe von Gründen eingestellt werden. Ein Anspruch auf Sicherung oder Herausgabe der Daten besteht nicht.<br><br />
			§1.8: Erbrachte Leistungen/Produkte dürfen nicht an dritte weiter gesponsert werden!<br /><br />
			§1.9: Die Gegenleistung muss eingehalten werden!<br><br />
			<br /><br />
			<b>§2 Webspace</b><hr /><br />
			§2.1: Homepages dürfen keine Informationsangebote mit rechtswidrigen Inhalten enthalten oder auf solche verweisen.<br><br />
			Die nationalen und internationalen Urheberrechte sind zu beachten. Inhalte, welche Leistungen oder Waren zum Gegenstand haben, für die nach den allgemeinen Gesetzen eine besondere Gewerbeerlaubnis notwendig ist, dürfen nur dann eingestellt werden, wenn der Nutzer im Besitz einer dafür gültigen Erlaubnis ist.<br><br />
			Folgende Inhalte und Nutzungsarten sind verboten:<br><br />
			<ul><li class="regeln">den Krieg verherrlichen</li><li class="regeln">Gewalttätigkeiten, die den sexuellen Missbrauch von Kindern oder sexuelle Handlungen von Menschen mit Tieren zum Gegenstand haben (§ 184 Abs. 3 StGB)</li><li class="regeln">pornographische Inhalte jeglicher Art (FSK16)</li><li class="regeln">Warez, Filesharing allgemein, Proxy-Server, Torrent Tracke, reine Downloadserver</li><li class="regeln">Clans bzw. Gilden</li><li class="regeln">Untervermietung des Webspace</li><li class="regeln">sämtliche Freeservices wie Counter-, Freemail-, Gästebuchservice, ...</li><li class="regeln">Programme und Skripte, die den Server extrem beanspruchen (z.B. Browsergames, Toplisten, Chat, ...)</li><li class="regeln">Virtuelle Besucher (eBesucher)</li></ul><br />
			§2.2: Mit dem Webspace darf kein finanzieller Profit erzielt werde, soweit es nicht anderes vereinbart ist. Darunter sind Layer oder andere Werbe Anzeigen verboten!<br><br />
			§2.3: Jeder Nutzer ist verantwortlich für die Inhalte die unter seinem Webspace publiziert werden. Der Nutzer haftet bei Verletzungen gegenüber Dritten selbst und unmittelbar.<br><br />
			§2.4: Man verpflichtet sich alle Inhalte, die auf seinen Internetseiten veröffentlicht werden, als seine eigenen deutlich zu kennzeichnen (Impressum). <br><br />
			§2.5: Pro Monat muss mind. 1 MB Traffic verbraucht werden. Sollte in einem Monat weniger als 1 MB verbraucht werden, ist cynHost.de berechtigt, den Webspace im darauf folgenden Monat zu sperren bzw. zu löschen, da wir davon ausgehen, dass der Webspace nicht mehr benötigt wird.<br><br />
			<br /><br />
			<b>§3 Schlussbestimmungen</b><hr /><br />
			$3.1: Der Nutzer hat das Recht jederzeit das Sponsoring zu beenden. Im Webhosting Control-Panel befindet sich dafür unter "Websites & Domains" ein extra Formular. <br><br />
			§3.2: Die Regeln können jeder Zeit erweitert oder gekürzt werden.<br><br />
			§3.3: Bei Verstoß der Regeln, besonders wenn Schaden entstanden ist, kann es zu einer Strafanzeige kommen!
		</td></tr></table>
	</div>
			
</div>
<!-- LiveZilla Tracking Code (ALWAYS PLACE IN BODY ELEMENT) --><div id="livezilla_tracking" style="display:none"></div><script type="text/javascript">
</body>
</html>


