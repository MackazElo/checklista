<html>
<head>
	<!-- <link rel='stylesheet' type='text/css' href='stylee.css'><link rel="icon" type="image/png" href="../B/favicon.png"> -->
	<meta charset='utf-8'>
	<title>Checklista v1.6</title>

</head>
<body style='font-family:arial;' onload="przenies('ipad'), macbook()">
<p hidden> Changelog: 1.0- podstawowa wersja programu; 1.1- dodanie komentarza; 1.2- dodanie funkcji clr i defaultowych odpowiedzi; 1.3- zmiana kolejności wersów (audio obok kamery), 1.4- dodano nowe pola do baterii; 1.5- dodano funkcje wprowadz() która pozwala na łatwiejsze wprowadzanie wersów oraz przecinków wraz z zmniejszonym rozmiarem programu</p>
<p hidden> To do: zrobić emoji koloru, macbook</p>
<div id='Master'>
	<div id='header'>
	<input type='button' value='run ipad' onclick='przenies("ipad")'>
	<input type='button' value='ukryj' onclick='ukryj()'>
	</div>
	<div id='left' style='float: left;'>
		<div id='ipad' style='float: left;'>
			<h1> iPad</h1>
			<div id='form'>
				<table>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_szybka_cb"),clr("ipad_szybka_cb", "ipad_szybka_kom"), przenies("ipad")'>Szybka</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_szybka_cb' onclick='clr("ipad_szybka_cb", "ipad_szybka_kom")' onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_szybka_kom'  value='Zbita' onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_dotyk_cb"), przenies("ipad")'>Dotyk</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_dotyk_cb' onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_dotyk_kom' onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_ekran_cb"), przenies("ipad")'>Ekran</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_ekran_cb'  onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_ekran_kom'  onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_przyciski_cb"), przenies("ipad")'>Przyciski</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_przyciski_cb'  onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_przyciski_kom'  onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_kamery_cb"), przenies("ipad")'>Kamery</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_kamery_cb'  onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_kamery_kom'  onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_audio_cb"), przenies("ipad")'>Audio</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_audio_cb' onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_audio_kom' onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_tid_cb"), clr("ipad_tid_cb", "ipad_tid_kom"), przenies("ipad")'>Touch id</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_tid_cb' onclick='clr("ipad_tid_cb", "ipad_tid_kom")' onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_tid_kom' onchange='przenies("ipad")' value='ND'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_wifi_cb"), przenies("ipad")'>Wifi BT</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_wifi_cb' onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_wifi_kom' onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_rotacja_cb"), przenies("ipad")'>Rotacja</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_rotacja_cb' onchange='przenies("ipad")'>
						</td>
						<td> 
							<input id='ipad_rotacja_kom' onchange='przenies("ipad")'>
						</td>
					</tr>
					<tr>
						<td>
							<h3 onclick='clickbox("ipad_bateria_cb"), przenies("ipad")'>Bateria</h3>
						</td>
						<td>
							<input type='checkbox' id='ipad_bateria_cb' onchange='przenies("ipad")'>
						</td>
						<td>
							<table>
								<tr>
									<td>
										<input style='width:30px;' id='ipad_bateria_procent' onchange='przenies("ipad")'> %
									</td>
									<td>
										<input style='width:30px;' id='ipad_bateria_cykle' onchange='przenies("ipad")'> cykli
									<td>
								</tr>
								<tr>
									<td colspan='2'>
										<input id='ipad_bateria_kom' onchange='przenies("ipad")'>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td>
							<h3>Komentarz</h3>
						</td>
						<td>
							
						</td>
						<td>
							<input id='ipad_kom_kom' onchange='przenies("ipad")'>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div id='macbook' style='float: left;'>
			<h1>Macbook</h1>
			<div id='macbook_form'>
			</div>
		</div>	
	</div>	
	<div id='right' style='float: left; padding-left:100px;'>
		<div id='copy_button'>
			<input type='button' onclick='copy()' value='Kopuj'>
		</div>
		<div id='result'>
			
		</div>
	</div>
	<script>
	function ukryj(){
		document.getElementById("header").style="visibility:hidden;"
	}
	function formularz(typ,pole){
		var typq='"'+typ+'"'
		var cb='"'+typ+"_"+pole+'_cb"'
		var kom='"'+typ+"_"+pole+'_kom"'
		document.getElementById(typ+"_form").innerHTML+="<tr><td><h3 onclick='clickbox("+cb+"), przenies("+typq+")'>"+pole+"</h3></td><td><input type='checkbox' id="+cb+" onchange='przenies("+typq+")'></td><td><input id="+kom+" onchange='przenies("+typq+")'></td></tr>"
	}
	function wprowadz(typ,cel){
		var cb=typ+"_"+cel+"_cb"
		var kom=typ+"_"+cel+"_kom"
		var wers=cel+" - "
		if(document.getElementById(cb).checked==true){
			if(document.getElementById(kom).value!=""){
				wers+="GIT, "+document.getElementById(kom).value
			}
			else{
				wers+="GIT"
			}
		}
		else{
			wers+=document.getElementById(kom).value
		}
		wers+="<br>"
	return wers
	}
	
	function macbook(){
		document.getElementById("macbook_form").innerHTML+="<table>"
		formularz("macbook", "ekran");
		formularz("macbook", "jasnosc");
		formularz("macbook", "podswietlenie");
		formularz("macbook", "kamera");
		formularz("macbook", "wifi");
		formularz("macbook", "glosnik");
		formularz("macbook", "mikrofon");
		formularz("macbook", "klawiatura");
		formularz("macbook", "touchpad");
		formularz("macbook", "usb");
		formularz("macbook", "wentylator");
		formularz("macbook", "temperatury");
		formularz("macbook", "klapa");
		formularz("macbook", "obciazenie");
		var mac='"macbook"'
		var cb='"macbook_bateria_cb"'
		document.getElementById("macbook_form").innerHTML+="<td> <h3 onclick='clickbox("+cb+"), przenies("+mac+")'>Bateria</h3> </td> <td> <input type='checkbox' id='macbook_bateria_cb' onchange='przenies("+mac+")'> </td> <td> <table> <tr> <td> <input style='width:30px;' id='macbook_bateria_procent' onchange='przenies("+mac+")'> % </td> <td> <input style='width:30px;' id='macbook_bateria_cykle' onchange='przenies("+mac+")'> cykli <td> </tr> <tr> <td colspan='2'> <input id='macbook_bateria_kom' onchange='przenies("+mac+")'> </td> </tr> </table> </td> </tr> <tr> <td> <h3>Komentarz</h3> </td> <td> </td> <td> <input id='macbook_kom_kom' onchange='przenies("+mac+")'> </td> </tr></table>"
	}
	
	function przenies(typ){
		// alert('ipad start');
		
		var bateria="Bateria - "
		var bat_kom=document.getElementById(typ+"_bateria_kom").value
		var bat_cykl=document.getElementById(typ+"_bateria_cykle").value
		var bat_proc=document.getElementById(typ+"_bateria_procent").value
		var kom=document.getElementById(typ+"_kom_kom").value;
		
		if(document.getElementById(typ+"_bateria_cb").checked==true){
				bateria+="GIT"
		}
		if(bat_proc!=""){
			if(bateria!="Bateria - "){
			bateria+=", "+bat_proc+" %"
			}
			else{
				bateria+=bat_proc+" %"
			}
		}
		if(bat_cykl!=""){
			if(bateria!="Bateria - "){
			bateria+=", "+bat_cykl+" cykli"
			}
			else{
				bateria+=bat_cykl+" cykli"
			}
		}
		if(bat_kom!=""){
			if(bateria!="Bateria - "){
			bateria+=", "+bat_kom
			}
			else{
				bateria+=bat_kom
			}
		}
		if(typ=="ipad"){
			document.getElementById('result').innerHTML=wprowadz("ipad", "szybka")+wprowadz("ipad", "dotyk")+wprowadz("ipad", "ekran")+wprowadz("ipad", "przyciski")+wprowadz("ipad", "kamery")+wprowadz("ipad", "audio")+wprowadz("ipad", "tid")+wprowadz("ipad", "wifi")+wprowadz("ipad", "rotacja")+bateria+"<br><br>"+kom
		}
		if(typ=="ipad"){
			document.getElementById('result').innerHTML=wprowadz("ipad", "szybka")+wprowadz("ipad", "dotyk")+wprowadz("ipad", "ekran")+wprowadz("ipad", "przyciski")+wprowadz("ipad", "kamery")+wprowadz("ipad", "audio")+wprowadz("ipad", "tid")+wprowadz("ipad", "wifi")+wprowadz("ipad", "rotacja")+bateria+"<br><br>"+kom
		}
		if(typ=="macbook"){
			document.getElementById('result').innerHTML=wprowadz("macbook", "ekran")+wprowadz("macbook", "jasnosc")+wprowadz("macbook", "podswietlenie")+wprowadz("macbook", "kamera")+wprowadz("macbook", "wifi")+wprowadz("macbook", "glosnik")+wprowadz("macbook", "mikrofon")+wprowadz("macbook", "klawiatura")+wprowadz("macbook", "touchpad")+wprowadz("macbook", "usb")+wprowadz("macbook", "klapa")+wprowadz("macbook", "wentylator")+wprowadz("macbook", "temperatury")+wprowadz("macbook", "obciazenie")+bateria+"<br><br>"+kom
		}
		
	}
	
	function copy() {
		var range = document.createRange();
		range.selectNode(document.getElementById("result"));
		window.getSelection().removeAllRanges(); 
		window.getSelection().addRange(range); 
		document.execCommand("copy");
		window.getSelection().removeAllRanges();
	}
				
	function clickbox(cb){
		if(document.getElementById(cb).checked==true){
			document.getElementById(cb).checked=false;
		}
		else if(document.getElementById(cb).checked==false){
				document.getElementById(cb).checked=true;		
		}
	}			
	
	function clr(cb,kom){
		if(document.getElementById(cb).checked==true){
		document.getElementById(kom).value=""
		}
	}
	</script>
	
</div>
</body>
</html>