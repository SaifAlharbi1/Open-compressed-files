<?php

require_once "opan_file_zip.php";

class show_file extends openZip {

    function show_all_file(){

        if($this->countFile > 0){
            echo "<div class = 'all_name_file'>";
            foreach($this->get_file as $name){
                $name_new = substr($name,-15);
                echo "<div id='$name_new' class='$name_new box font_color' onclick='chose_file(this.id)  ,  hide_bottom()'>". $name . "</div>";
        
            }
            echo "</div>";
        }else {
            echo "<div class='box no_file' >لاتوجد ملفات مضغوطة </div>" ;
        }
    }


  
}

if(isset($_GET['show'])){
    $show_file = new show_file(new ZipArchive());
    $show_file->Test_folderProjectOrAnyDirectory( $_GET['show']);
    $show_file->show_all_file();
}

?>