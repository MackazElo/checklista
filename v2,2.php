<style>
    body{
        font-family:'MS Comic Sans';
        background: linear-gradient(rgb(210, 200, 203), rgb(10, 239, 249)); 
        
    }
    #master{
    display: grid;
    grid-template-areas:
      'header header header header'
      'iphone macbook ipad result'
      'copy copy copy copy';
    grid-template-columns: 25% 25% 25% 25%;
    grid-template-rows: 10% 80% 10%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
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
    margin: 13px;
    padding-left: 15px;
}
#iphone{
    grid-area: iphone;
    overflow: auto;
    background-color: rgba(255, 255, 255, 0.7);
    margin: 13px;
    padding-left: 15px;
}
#macbook{
    grid-area: macbook;
    overflow: auto;
    background-color: rgba(255, 255, 255, 0.7);
    margin: 13px;
    padding-left: 15px;
}
#result{
    grid-area: result;
    overflow: auto;
    background-color: rgba(255, 255, 255, 0.7);
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
    margin: 13px;
    font-size: 30px;
    padding-left: 15px;
    padding-top: 10px;
    user-select: none;
    display: inline-block;
}
#copy{
    grid-area: copy;
    overflow: auto;
    text-align:center;
    background-color: rgba(255, 255, 255, 0.7);
    margin: 13px;
    padding-left: 15px;
    padding-top: 10px;
    font-size:30px;
    cursor: pointer;
    
    user-select: none;
        
}
.display{
    cursor: pointer;
}
    #copy:hover{
   color:cornflowerblue;
   transition: color 0.2s;
        
}
#copy:active{
   color:violet;
        
}
.display{
    cursor: pointer;
    user-select: none;
}
.display:hover{
   color:cornflowerblue;
   transition: color 0.2s;
        
}
.display:active{
   color:violet;
        
}
</style>

<script>
    function copy() {
		var range = document.createRange();
		range.selectNode(document.getElementById("result"));
		window.getSelection().removeAllRanges(); 
		window.getSelection().addRange(range); 
		document.execCommand("copy");
		window.getSelection().removeAllRanges();
	}
    function insert_new_line(target, display, name, value, placeholder, type){
        let number_of_rows = document.getElementById(`i_${target}`).value
        let new_row = document.getElementById(`t_${target}`).insertRow(number_of_rows);
        if (type=="bat"){
    new_row.insertCell(-1).innerHTML=`<h3 onclick='update_bat("${target}", "${number_of_rows}"), cheange_state("cb_${target}_${number_of_rows}"), load_to_result("${target}", "${value}")' class='display'>${display}</h3><input id='dis_${target}_${number_of_rows}' value='${display}' hidden>`
    new_row.insertCell(-1).innerHTML=`<input type='checkbox' id='cb_${target}_${number_of_rows}' onclick='update_bat("${target}", "${number_of_rows}"),load_to_result("${target}", "${value}")' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'>`
    new_row.insertCell(-1).innerHTML=`<table><tr><td><input style="width:35px;" id='b1_${target}_${number_of_rows}' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'></td><td>%</td><td><input style="width:35px;" id='b2_${target}_${number_of_rows}' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'></td><td>Cykle</td></tr><tr><input name='${name}' id='com_${target}_${number_of_rows}' hidden value='${value}'  placeholder='${placeholder}' onclick='load_to_result("${target}", "${value}")' onchange='load_to_result("${target}", "${value}")' ><input id='fcom_${target}_${number_of_rows}' value='${value}'  placeholder='${placeholder}' onclick='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")' onchange='update_bat("${target}", "${number_of_rows}"), load_to_result("${target}", "${value}")'></tr></table>`        
    
}
else if (type=="com"){
        new_row.insertCell(-1).innerHTML=`<h3 onclick='cheange_state("cb_${target}_${number_of_rows}"), load_to_result("${target}", "${value}")' class='display'>${display}</h3><input id='dis_${target}_${number_of_rows}' value='${display}' hidden>`
        new_row.insertCell(-1).innerHTML=`<input hidden type='checkbox' id='cb_${target}_${number_of_rows}' onclick='load_to_result("${target}", "${value}")' onchange='load_to_result("${target}", "${value}")'>`
        new_row.insertCell(-1).innerHTML=`<input name='${name}' id='com_${target}_${number_of_rows}' value='${value}'  placeholder='${placeholder}' onclick='load_to_result("${target}", "${value}")' onchange='load_to_result("${target}", "${value}")'>`        
}
else{
        new_row.insertCell(-1).innerHTML=`<h3 onclick='cheange_state("cb_${target}_${number_of_rows}"), load_to_result("${target}", "${value}")' class='display'>${display}</h3><input id='dis_${target}_${number_of_rows}' value='${display}' hidden>`
        new_row.insertCell(-1).innerHTML=`<input type='checkbox' id='cb_${target}_${number_of_rows}' onclick='load_to_result("${target}", "${value}")' onchange='load_to_result("${target}", "${value}")'>`
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
                result.innerHTML+="DZIAŁA"
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

</script>
<html>
    <head><title>Checklista v2.2</title></head>
<body>
    <div id='master'>
        <div id='header' onclick='refresh()' >
           <b> Checklista v2.2</b><p style="font-size: 15px; padding-left: 15px; display: inline-block;" class="display">Wyczyść</p>
        </div>
        <div id='ipad'>
            <input id='i_ipad' value='0' hidden>
            <h1>iPad</h1>
            <table id='t_ipad'>
            </table>
        </div>
        
        <div id='macbook'>
            <input id='i_macbook' value='0' hidden>
            <h1>Macbook</h1>
            <table id='t_macbook'>
            </table>
        </div>
        
        <div id='iphone'>
            <input id='i_iphone' value='0' hidden>
            <h1>iPhone</h1>
            <table id='t_iphone'>
            </table>
        </div>
        <div id='result'>
            Tutaj pojawi się wynik checklisty
        </div>
        <div id='copy' onclick='copy()'>
            Kopiuj
        </div>
    </div>
</body>
<script>
    insert_new_line('ipad', 'Szybka', "szybka", 'Zbita', '', '')
    insert_new_line('ipad', 'Dotyk', "fotyk", '', '', '')
    insert_new_line('ipad', 'Ekran', "ekran", '', '', '')
    insert_new_line('ipad', 'Przyciski', "przyciski", '', '', '')
    insert_new_line('ipad', 'Kamery', "kamery", '', '', '')
    insert_new_line('ipad', 'Audio', "audio", '', '', '')
    insert_new_line('ipad', 'Touch id/Face id', "tid", 'Nie dotyczy', '', '')
    insert_new_line('ipad', 'Wifi', "wifi", '', '', '')
    insert_new_line('ipad', 'Rotacja', "rotacja", '', '', '')
    insert_new_line('ipad', 'Bateria', "bateria", '', '', 'bat')
    insert_new_line('ipad', 'Komentarz', "komentarz", '', '', 'com')

    insert_new_line('macbook', 'Ekran', "ekran", '', '', '')
    insert_new_line('macbook', 'Jasność', "jasnosc", '', '', '')
    insert_new_line('macbook', 'Podświetlenie', "podswietlenie", '', '', '')
    insert_new_line('macbook', 'Kamera', "kamera", '', '', '')
    insert_new_line('macbook', 'Wi-Fi', "wifi", '', '', '')
    insert_new_line('macbook', 'Głośnik', "glosnik", '', '', '')
    insert_new_line('macbook', 'Mikrofon', "mikrofon", '', '', '')
    insert_new_line('macbook', 'Klawiatura', "klawiatura", '', '', '')
    insert_new_line('macbook', 'Touchpad', "touchpad", '', '', '')
    insert_new_line('macbook', 'USB', "usb", '', '', '')
    insert_new_line('macbook', 'Wentylator', "wentylator", '', '', '')
    insert_new_line('macbook', 'Temperatury', "temperatury", '', '', '')
    insert_new_line('macbook', 'Obciążenie', "obciazenie", '', '', '')
    insert_new_line('macbook', 'Bateria', "bateria", '', '', 'bat')
    insert_new_line('macbook', 'Komentarz', "komentarz", '', '', 'com')

    insert_new_line('iphone', 'Szybka', "szybka", 'Zbita', '', '')
    insert_new_line('iphone', 'Dotyk', "fotyk", '', '', '')
    insert_new_line('iphone', 'Ekran', "ekran", '', '', '')
    insert_new_line('iphone', 'Przyciski', "przyciski", '', '', '')
    insert_new_line('iphone', 'Kamery', "kamery", '', '', '')
    insert_new_line('iphone', 'Audio', "audio", '', '', '')
    insert_new_line('iphone', 'Kompas', "kompas", '', '', '')
    insert_new_line('iphone', 'Ambient light', "ambient", '', '', '')
    insert_new_line('iphone', 'Proxymity', "proxy", '', '', '')
    insert_new_line('iphone', 'NFC', "nfc", '', '', '')
    insert_new_line('iphone', 'Indukcja', "indukcja", '', '', '')
    insert_new_line('iphone', 'Zasięg', "zasieg", '', '', '')
    insert_new_line('iphone', 'Rozmowy', "rozmowy", '', '', '')
    insert_new_line('iphone', 'Latarka', "latarka", '', '', '')
    insert_new_line('iphone', 'Touch id/Face id', "tid", 'Nie dotyczy', '', '')
    insert_new_line('iphone', 'Wifi Bluetooth', "wifi", '', '', '')
    insert_new_line('iphone', 'Rotacja', "rotacja", '', '', '')
    insert_new_line('iphone', 'Bateria', "bateria", '', '', 'bat')
    insert_new_line('iphone', 'Komentarz', "komentarz", '', '', 'com')
	
    
</script>

</html>