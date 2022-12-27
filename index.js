const input_value = document.getElementById('path').value;
let name_zip = input_value + "\\*.zip";

// with delete file 
function ajax_opan_zip(id){

    let url = [];
    if(id === "send"){
            url = "opan_file_zip.php?open=";
    }   
    else if(id === "show"){
            url = "show_name_file.php?show=";
    }
    const xhttp = new XMLHttpRequest();

    let loding = document.querySelector('.loding');
    xhttp.onreadystatechange = function() {

        if(this.readyState == 1 ){
        loding.style.display = "flex";
        }
        if(this.readyState == 4){
            console.log(this.responseText);
            loding.style.display = "none";
            document.getElementById("name_file_opan").innerHTML = this.responseText;

            hide_bottom(this.responseText);
        }
    }

    xhttp.open("GET", url + name_zip +"&& path="+name_zip);
    xhttp.send();

}


// jast delete 

function wathout_opan_zip(){

    let url = "opan_file_zip.php?open_wathout_delete=";
    const xhttp = new XMLHttpRequest();

    let loding = document.querySelector('.loding');
    xhttp.onreadystatechange = function() {
        console.log(this.responseText);
    if(this.readyState == 1 ){
        loding.style.display = "flex";
    }
    if(this.readyState == 4){
        loding.style.display = "none";
        document.getElementById("name_file_opan").innerHTML = this.responseText;

    }
    //   console.log(this.responseText);
    }
    xhttp.open("GET", url + name_zip  +"&& path="+name_zip);
    xhttp.send();

}


// لاختيار الملف 

let file = [];
function chose_file(id){

    let get_file =  document.getElementById(id);
    if(file.includes(get_file.textContent)){
        let get_index = file.indexOf(get_file.textContent);
        file.splice(get_index,1);
    }else{
            file.push(get_file.textContent);
    }

    get_file.classList.toggle("Active"); // لاختيار الملف والغاء الاختيار

}

function open_chose_zip(){

    let url = "opan_file_zip.php?chos_file=";
    const xhttp = new XMLHttpRequest();
    let user_chos = file;
    let loding = document.querySelector('.loding');

    xhttp.onreadystatechange = function() {

        if(this.readyState == 1 ){
        loding.style.display = "flex";
        }
        if(this.readyState == 4){
            loding.style.display = "none";
            document.getElementById("name_file_opan").innerHTML += this.responseText
        }

        // Fetch all files and delete opened files 
        let get_all_active = document.querySelectorAll(".Active");
                for (let i = 0; i< get_all_active.length; i++) {     
                    get_all_active[i].style.display = "none";
                    user_chos.forEach(e =>{
                            if( e == get_all_active[i].textContent){
                                let get_index = user_chos.indexOf(e);
                                user_chos.splice(get_index,1);
                                console.log(get_all_active)
                            }  
                        })
                        get_all_active[i].textContent = " "; // مسح اسم الملف   
                }
        
    }
    console.log(user_chos);
    xhttp.open("GET", url + user_chos );
    xhttp.send();
}

function hide_bottom(message){
    // hide and show bottom chose
    let check_avtive = document.querySelectorAll(".Active");
    const bot = document.getElementById('chose_fi');

    if(check_avtive.length > 0){
        bot.style.display ="flex";
    }else if(message != undefined && message.includes("لاتوجد ملفات مضغوطة") || check_avtive.length == 0){
        bot.style.display ="none";
    }

}