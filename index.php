<script>
    function copy() {
       document.getElementById("result").style="font-family:Arial;"
		var range = document.createRange();
        
		range.selectNode(document.getElementById("result"));
		window.getSelection().removeAllRanges(); 
		window.getSelection().addRange(range); 
		document.execCommand("copy");
		window.getSelection().removeAllRanges();
        document.getElementById("result").style="   font-family: 'Roboto Mono', monospace;"
	}
    function insert_new_line(target, display, name, value, placeholder, type){
        let number_of_rows = document.getElementById(`i_${target}`).value
        let new_row = document.getElementById(`t_${target}`).insertRow(number_of_rows);
        if (type=="bat"){
    new_row.insertCell(-1).innerHTML=`<input type='checkbox' id='cb_${target}_${number_of_rows}' onclick='update_bat("${target}", "${number_of_rows}"),load_to_result("${target}", "${value}")' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'>`
    new_row.insertCell(-1).innerHTML=`<h3 onclick='update_bat("${target}", "${number_of_rows}"), cheange_state("cb_${target}_${number_of_rows}"), load_to_result("${target}", "${value}")' class='display'>${display}</h3><input id='dis_${target}_${number_of_rows}' value='${display}' hidden>`
    new_row.insertCell(-1).innerHTML=`<table><tr><td><input style="width:35px;" id='b1_${target}_${number_of_rows}' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'></td><td>%</td><td><input style="width:35px;" id='b2_${target}_${number_of_rows}' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'></td><td>Cykle</td></tr><tr><input name='${name}' id='com_${target}_${number_of_rows}' hidden value='${value}'  placeholder='${placeholder}' onclick='load_to_result("${target}", "${value}")' onchange='load_to_result("${target}", "${value}")' ><input id='fcom_${target}_${number_of_rows}' value='${value}'  placeholder='${placeholder}' onclick='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'></tr></table>`        
    
}
else if (type=="com"){
        new_row.insertCell(-1).innerHTML=`<input hidden type='checkbox' id='cb_${target}_${number_of_rows}' onchange='load_to_result("${target}", "${value}")'>`
        new_row.insertCell(-1).innerHTML=`<h3 class='display'>${display}</h3><input id='dis_${target}_${number_of_rows}' value='${display}' hidden>`
        new_row.insertCell(-1).innerHTML=`<input name='${name}' id='com_${target}_${number_of_rows}' value='${value}'  placeholder='${placeholder}' onchange='load_to_result("${target}", "${value}")'>`        
}
else if (type=="url"){
    new_row.insertCell(-1).innerHTML=`<input hidden type='checkbox' id='cb_${target}_${number_of_rows}' onchange='load_to_result("${target}", "${value}")'>`
    new_row.insertCell(-1).innerHTML=`<h3 onclick='open_tab("${value}")' class='display'>${display}</h3>`


}
else{
        new_row.insertCell(-1).innerHTML=`<input type='checkbox' id='cb_${target}_${number_of_rows}' onclick='load_to_result("${target}", "${value}")' onchange='load_to_result("${target}", "${value}")'>`
        new_row.insertCell(-1).innerHTML=`<h3 onclick='cheange_state("cb_${target}_${number_of_rows}"), load_to_result("${target}", "${value}")' class='display'>${display}</h3><input id='dis_${target}_${number_of_rows}' value='${display}' hidden>`
        new_row.insertCell(-1).innerHTML=`<input name='${name}' id='com_${target}_${number_of_rows}' value='${value}'  placeholder='${placeholder}' onclick='load_to_result("${target}", "${value}")' onchange='load_to_result("${target}", "${value}")'>`        
}   
        document.getElementById(`i_${target}`).value = parseInt(number_of_rows)+1
    }
    function load_to_result(target, deafult_value){
        let result = document.getElementById('result')
        let number_of_rows = document.getElementById(`i_${target}`).value
        result.innerHTML=""
        for(i=0; i<number_of_rows; i++){
            let checkbox = document.getElementById(`cb_${target}_${i}`)
            let comment = document.getElementById(`com_${target}_${i}`)
            let display = document.getElementById(`dis_${target}_${i}`)
            result.innerHTML+=`${display.value} - `
            if (checkbox.checked==true){
            
                if(comment.value==deafult_value){
                 
                    comment.value=""
                }
                result.innerHTML+="OK"
                if (comment.value!=""){
                    result.innerHTML+=", "
                }
            }
            result.innerHTML+= comment.value
            
            result.innerHTML+= "<br>"
        }
    }
    function cheange_state(target){
        let checkbox = document.getElementById(target)
        if (checkbox.checked==true){
            checkbox.checked=false
        }
        else if (checkbox.checked==false){
            checkbox.checked=true
        }

    }
    function open_tab(url){
        window.open(url);
    }
    function update_bat(target, row){
        let b1=document.getElementById(`b1_${target}_${row}`)
        let b2=document.getElementById(`b2_${target}_${row}`)
        let com=document.getElementById(`fcom_${target}_${row}`)
        let result=document.getElementById(`com_${target}_${row}`)
        result.value=""
        if(b1.value!=""){
            result.value+=b1.value+" %"
        }
		if(b2.value!=""){
            if (result.value!=""){
                result.value+=", "    
            }
            result.value+=b2.value+" cykle"
		}
		if(com.value!=""){
            if (result.value!=""){
                result.value+=", "    
            }
			result.value+=com.value
		}
    }
    function refresh(){
        window.location.reload()
    }
    function focus_on_keyboard(){
        alert("a")
        document.getElementById("iframe_window").contentWindow.focus()
        console.log(document.getElementById("iframe_window"))

    }
    function choose(selected){
        document.getElementById('choose').hidden=true;
        document.getElementById(selected).hidden=false;
    }
    function overlay(mode){
        target=document.getElementById("overlay")
        if(mode=="close"){
            target.hidden=true;
            target.innerHTML=""
        }
        else{
            // target.innerHTML=`<input type='button' onclick="overlay('close')" value='X'><br>`
            target.hidden=false;
            target.innerHTML=`<iframe src="${mode}" id='iframe_window' width="90%" height="90%" ></iframe><br>`
            // setTimeout(focus_on_keyboard(), 500000)
            setTimeout(() => {
                document.getElementById("iframe_window").contentWindow.focus()

}, 3000);
            
        }
    }
   
    function popup(url){
       newwindow=window.open(url,"AFT Test",'height=600,width=800');
       if (window.focus) {newwindow.focus()}
       return false;
     }
</script>
<html>
    <head><title>Checklista v3.5</title></head>
   
<body>
    <style>
            body{
                font-family: 'Roboto Mono', monospace;
                background-color: rgb(242, 240, 240); 
            }
            #master{
                display: grid;
                grid-template-areas:
                'header header header links copy'
                'checklist checklist checklist result result';
                grid-template-columns: 25% 25% 10% 20% 20%;
                grid-template-rows: 15% 85%;
                font-family: 'Roboto Mono', monospace;
                height: 100%;
                width: 100%;
            }
            div{
                user-select: none;
            }
            #ipad{
                grid-area: ipad;
                overflow: auto;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                padding-left: 15px;
                
            }
            #iphone{
                grid-area: iphone;
                overflow: auto;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;    
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                padding-left: 15px;
            }
            #macbook{
                grid-area: macbook;
                overflow: auto;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                padding-left: 15px;
            }
            #imac{
                grid-area: imac;
                overflow: auto;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                padding-left: 15px;
            }
            #result{
                grid-area: result;
                overflow: auto;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                padding-left: 15px;
                padding-top: 15px;
                font-size:20px;
                user-select:text;
            }
            #header{
                grid-area: header;
                overflow: hidden;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                font-size: 30px;
                padding-left: 15px;
                user-select: none;
                display:grid;
                justify-content: center;
                align-items: center;
                padding-bottom: -20px;
                padding-top: -20px;
                 }
            #reset{
                font-size:20px;
                cursor: pointer;
                margin-top: -25px;
                user-select: none;
            }
            #title{
                margin-top: 0px;
            }
            #copy{
                grid-area: copy;
                overflow: auto;
                text-align:center;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size:30px;
                cursor: pointer;
                user-select: none;
            }
            #overlay{
                height: 99vh;
                width: 99vw;
                text-align: center;
                position: absolute;
                background-color: rgba(255, 255, 255, 0.7);
            }

            #links{
                grid-area: links;
                overflow: auto;
                text-align:center;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                justify-content: center;
                align-items: center;
                font-size:11px;
                cursor: pointer;
                
                user-select: none;
                    
            }
            #iframe_window{
                overflow: hidden;
            }

            #checklist{
                grid-area: checklist;
                overflow: auto;
                padding: 5px;
            }
            .menu_position{
                overflow: auto;
                text-align:center;
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                padding-top: 10px;
                font-size:30px;

                user-select: none;
                    
                grid-area: clear;
            }
            .display{
                    cursor: pointer;
            }
            .clickable{
                cursor: pointer;
                
                transition: color 0.2s;
            }
            .clickable:hover{
                color:cornflowerblue;
                transition: color 0.2s;

            }
            .clickable:active{
                color:violet;
                
            }

            .choose_button{
                background-color: rgba(255, 255, 255, 0.7);
                border-radius: 7px;
                border: solid 2px black;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                margin: 13px;
                padding-top: 10px;
                font-size:30px;
                height: 20%;
                width: 30%;
                text-align: center;
                display:inline-flex;

                justify-content: center;
                align-items: center;
            }

            .display{
                cursor: pointer;
                user-select: none;
                display:inline-flex;

                justify-content: center;
                align-items: center;
                margin: 5px;
            }
            .display:hover{
                color:cornflowerblue;
                transition: color 0.2s;
                
            }
            .display:active{
                color:violet;
                    
            }


    </style>
    <div id='master'>
        <div id='overlay' onclick="overlay('close')" hidden>
            <!-- <input type='button' onclick="overlay('close')" value='X'> -->
        </div>
        <div id='header' onclick='refresh()' >
           <b><p id='title'>Checklista v3.5</p></b>
            <p onclick='refresh()' id='reset' class="clickable">
                Kliknij aby zresetować 
            </p>
        </div>
        <div id='checklist'>
            <div id='choose' style="text-align: center;">
                <div id='button_ipad' class='clickable choose_button'  onclick="choose('ipad')">
                    iPad
                </div>
                <div id='button_ipad' class='clickable choose_button' onclick="choose('macbook')">
                    MacBook
                </div>
                <div id='button_ipad'class='clickable choose_button' onclick="choose('iphone')">
                    iPhone
                </div>
                <div id='button_ipad'class='clickable choose_button' onclick="choose('imac')">
                    iMac
                </div>
               
            </div>
            <div id='ipad' hidden>
                <input id='i_ipad' value='0' hidden>
                <h1>iPad</h1>
                <table id='t_ipad'>
                </table>
            </div>
            
            <div id='macbook' hidden>
                <input id='i_macbook' value='0' hidden>
                <h1>Macbook</h1>
                <table id='t_macbook'>
                </table>
            </div>
            
            <div id='iphone' hidden>
                <input id='i_iphone' value='0' hidden>
                <h1>iPhone</h1>
                <table id='t_iphone'>
                </table>
            </div>
            <div id='imac' hidden>
                <input id='i_imac' value='0' hidden>
                <h1>iMac</h1>
                <table id='t_imac'>
                </table>
            </div>
        </div>
        <div id='result'>
            Tutaj pojawi się wynik checklisty
        </div>
        <div id='copy' class='clickable'onclick='copy()'>
            Kopiuj
        </div>
        <div id='links'>
            <h3 onclick="overlay('https://en.key-test.ru')" class="display">Key test</h3><br>
            <h3 onclick="overlay('https://www.youtube.com/embed/6TWJaFD6R2s?si=qqNQYxD2xsp1H44N&t=6s')" class="display">Stereo test</h3><br>
            <h3 onclick="popup('https://www.eizo.be/monitor-test/')" class="display">Screen test</h3><br>
            <h3 onclick="open_tab('smb://192.168.2.222/macapps')" class="display">Mac Apps</h3>
        </div>
    </div>
</body>
<script>
    insert_new_line('ipad', 'Szybka', "szybka", 'Zbita', '', '')
    insert_new_line('ipad', 'Ekran', "ekran", '', '', '')
    insert_new_line('ipad', 'Dotyk', "dotyk", '', '', '')
    insert_new_line('ipad', 'Pencil', "pencil", 'Nie dotyczy', '', '')
    insert_new_line('ipad', 'Touch id/Face id', "tid", 'Nie dotyczy', '', '')
    insert_new_line('ipad', 'Wifi', "wifi", '', '', '')
    insert_new_line('ipad', 'Kamery', "kamery", '', '', '')
    insert_new_line('ipad', 'LIDAR', "lidar", 'Nie dotyczy', '', '')
    insert_new_line('ipad', 'Przyciski', "przyciski", '', '', '')
    insert_new_line('ipad', 'Audio', "audio", '', '', '')
    insert_new_line('ipad', 'Rotacja', "rotacja", '', '', '')
    insert_new_line('ipad', 'Obudowa', "obudowa", 'wygięta', '', '')
    insert_new_line('ipad', 'Dock', "dock", '', '', '')
    insert_new_line('ipad', 'Bateria', "bateria", '', '', 'bat')
    insert_new_line('ipad', 'Komentarz', "komentarz", '', '', 'com')

    insert_new_line('macbook', 'Ekran', "ekran", '', '', '')
    insert_new_line('macbook', 'Jasność', "jasnosc", '', '', '')
    insert_new_line('macbook', 'Podświetlenie', "podswietlenie", '', '', '')
    insert_new_line('macbook', 'Kamera', "kamera", '', '', '')
    insert_new_line('macbook', 'Wi-Fi', "wifi", '', '', '')
    insert_new_line('macbook', 'Głośnik', "glosnik", '', '', '')
    insert_new_line('macbook', 'Klawiatura', "klawiatura", '', '', '')
    insert_new_line('macbook', 'Touch id', "tid", 'Nie dotyczy', '', '')
    insert_new_line('macbook', 'Mikrofon', "mikrofon", '', '', '')
    insert_new_line('macbook', 'Touchpad', "touchpad", '', '', '')
    insert_new_line('macbook', 'USB', "usb", '', '', '')
    insert_new_line('macbook', 'Wentylator', "wentylator", '', '', '')
    insert_new_line('macbook', 'Temperatury', "temperatury", '', '', '')
    insert_new_line('macbook', 'Obciążenie', "obciazenie", 'Nie testowane', '', '')
    insert_new_line('macbook', 'Bateria', "bateria", '', '', 'bat')
    insert_new_line('macbook', 'Komentarz', "komentarz", '', '', 'com')

    insert_new_line('imac', 'Ekran', "ekran", '', '', '')
    insert_new_line('imac', 'Jasność', "jasnosc", '', '', '')
    insert_new_line('imac', 'Kamera', "kamera", '', '', '')
    insert_new_line('imac', 'Wi-Fi', "wifi", '', '', '')
    insert_new_line('imac', 'Głośnik', "glosnik", '', '', '')
    insert_new_line('imac', 'Mikrofon', "mikrofon", '', '', '')
    insert_new_line('imac', 'USB', "usb", '', '', '')
    insert_new_line('imac', 'Wentylator', "wentylator", '', '', '')
    insert_new_line('imac', 'Temperatury', "temperatury", '', '', '')
    insert_new_line('imac', 'Obciążenie', "obciazenie", 'Nie testowane', '', '')
    insert_new_line('imac', 'Komentarz', "komentarz", '', '', 'com')


    insert_new_line('iphone', 'Szybka', "szybka", 'Zbita', '', '')
    insert_new_line('iphone', 'Dotyk', "dotyk", '', '', '')
    insert_new_line('iphone', 'Ekran', "ekran", '', '', '')
    insert_new_line('iphone', 'Przyciski', "przyciski", '', '', '')
    insert_new_line('iphone', 'Kamery', "kamery", '', '', '')
    insert_new_line('iphone', 'LIDAR', "lidar", 'Nie dotyczy', '', '')
    insert_new_line('iphone', 'Audio', "audio", '', '', '')
    insert_new_line('iphone', 'Kompas', "kompas", '', '', '')
    insert_new_line('iphone', 'Ambient light', "ambient", '', '', '')
    insert_new_line('iphone', 'Proxymity', "proxy", '', '', '')
    insert_new_line('iphone', 'NFC', "nfc", '', '', '')
    insert_new_line('iphone', 'Indukcja', "indukcja", 'Nie dotyczy', '', '')
    insert_new_line('iphone', 'Półączenia', "polaczenia", '', '', '')
    insert_new_line('iphone', 'Latarka', "latarka", '', '', '')
    insert_new_line('iphone', 'Touch id/Face id', "tid", 'Nie dotyczy', '', '')
    insert_new_line('iphone', 'Wifi Bluetooth', "wifi", '', '', '')
    insert_new_line('iphone', 'Rotacja', "rotacja", '', '', '')
    insert_new_line('iphone', 'Bateria', "bateria", '', '', 'bat')
    insert_new_line('iphone', 'Komentarz', "komentarz", '', '', 'com')
	
    
</script>

</html>