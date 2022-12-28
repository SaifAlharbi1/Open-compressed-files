

<?php

use PhpParser\Node\Stmt\Echo_;


class openZip {

    public $countFile; // عدد الملفات المضغوطة
    public $folderPath = '\\*.zip';
    public $get_file ; // اسماء الملفات المضغوطة
    public $class_zip; // get class ZipArchive
    public $getAllFileZip;


    function __construct($name)
    {
        $this->class_zip = $name;
    }
    

    // الملفات المضغوطة في نفس مجلد المشروع
    function getFileInfolder($folder){

        $file_zip = [];
        foreach(scandir($folder) as $file) {

            if(pathinfo($file , PATHINFO_EXTENSION) == "zip"){
                $file_zip[] = $file;
            }
        }
        $this->countFile = count($file_zip);
        $this->get_file = $file_zip;
        
    }


    // لفتح الملفات من المسار المحدد 
    public function count_files(){

        $path = $_GET['path'];
        $get_name_folder_zip = new GlobIterator($path);
        $this->countFile =  $get_name_folder_zip->count();
        $this->get_file = $get_name_folder_zip;
        return  $this->countFile ;
    }

    function openZip(){

        if($this->countFile > 0){
            foreach($this->get_file as $name_folder) { 
                if ($this->class_zip->open($name_folder) === TRUE) {

                    $del_zip = chop($name_folder , ".zip"); // لازالة .zip من اسم المجلد

                        if($this->class_zip->extractTo($del_zip) === TRUE) {

                            $size_KB =  (int)(self::get_size_file($this->class_zip) / 1024); // تحويل حجم الملفات من البايت الى الكيلوبايت

                            echo "<div class='box' ><strong>تم فتح ضغط الملف بنجاح</strong>"; 
                            echo " <p class='nameFile'> " . $del_zip . "<br><span class='size_file'> " .$size_KB . " KB </span>" .   "</p> </div>" ;
            
                            for($i = 0; $i <= $this->class_zip->numFiles; $i++) {

                               $this->class_zip->deleteIndex($i);  // لحذف الملفات بالمجلد
                            }
                            // لحذف المجلد يجب ان يكون فارغ
                        } 
                    }else {
                        echo "لايوجد ملف مضغوط";
                    }
            
            }
        }
        else{
            echo "<div class='box no_file'>لاتوجد ملفات مضغوطة </div>" ;
        }
    }


    //  لفتح ضغط الملفات بدون حذف الملفات المضغوطة
    function openZaipWathoutDelete()
    {
        if($this->countFile > 0){
            foreach($this->get_file as $name_folder) { 
                if ($this->class_zip->open($name_folder) === TRUE) {

                    $del_zip = chop($name_folder , ".zip"); // لازالة .zip من اسم المجلد
                        if($this->class_zip->extractTo($del_zip) === TRUE) {
                            
                            $size_KB =  (int)(self::get_size_file($this->class_zip) / 1024); // تحويل حجم الملفات من البايت الى الكيلوبايت

                            echo "<div class='box' ><strong>تم فتح ضغط الملف بنجاح</strong>";
                            echo   " <p class='nameFile'> " . $del_zip . "<br><span class='size_file'> " .$size_KB . " KB </span>" .  "</p> </div><br>" ;
                            // echo " <p class='nameFile'> " . $del_zip .  "</p> </div>" ;
                        } 
                    }else {

                        echo "لايوجد ملف مضغوط";
                    }
            
            }
        }
        else{
            echo "<div class='box no_file'>لاتوجد ملفات مضغوطة </div>" ;
        }

    }


    function openZip_chos()
    {
        
        $chen_arr = explode("," , $_GET['chos_file']);

        $this->countFile = count($chen_arr);

        // echo  $this->countFile;
        if($this->countFile > 0 ){
            foreach($chen_arr as $name_folder) { 
                if(!empty($name_folder) ){
    
                    if ($this->class_zip->open($name_folder) === TRUE) {
    
                        $del_zip = chop($name_folder , ".zip"); // لازالة .zip من اسم المجلد
                            if( $this->class_zip->extractTo($del_zip) === TRUE) {
    
                                $size_KB =  (int)(self::get_size_file($this->class_zip) / 1024); // تحويل حجم الملفات من البايت الى الكيلوبايت

                                echo "<div class='box' ><strong>تم فتح ضغط الملف بنجاح</strong>"; 
                                echo " <p class='nameFile'> " . $del_zip . "<br><span class='size_file'> " .$size_KB . " KB </span>" .   "</p> </div><br>" ;    
                                for($i = 0; $i <= $this->class_zip->numFiles; $i++) {
    
                                    $this->class_zip->deleteIndex($i);  // لحذف الملفات بالمجلد
                                }
                                // لحذف المجلد يجب ان يكون فارغ
    
                            } 
                            
                        }else {
                            echo "<div class='box no_file'>لاتوجد ملفات مضغوطة </div>" ;
                        }
                }
            }
        }
        else{
            echo "<div class='box no_file'>لاتوجد ملفات مضغوطة </div>" ;
        }
    }


    // ضغط الملفات واظهار من مجلد المشروع او من اي مجلد بالجهاز
    function Test_folderProjectOrAnyDirectory($get){
        
        
        if(trim($get) == 'null'){
            $this->getFileInfolder(getcwd());
        }
        elseif(!empty($_GET['path']) && $get != 'null'){
            $this->folderPath = $_GET['path'];
            $this->count_files();
            }
        }

    function close_zip()
    {
        $this->class_zip->close();
    } 


    // جلب مجموع حجم الملفات في المجلد
    public static function  get_size_file($class_zip){
        
        $i=0;
        $totle_zi = 0;
        while(!empty($class_zip->statIndex($i))){
            $totle_zi += $class_zip->statIndex($i)["size"];
            $i++;
        }
        return $totle_zi;
    }
    
}


$openZip = new openZip(new ZipArchive());


// open with delete files
if(isset($_GET['open'])){
    $openZip->count_files()."<br>";
    $openZip->Test_folderProjectOrAnyDirectory($_GET['path']);
    $openZip->openZip();
}

// open without delete
if(isset($_GET['open_wathout_delete'])){
    $openZip->count_files()."<br>";
    $openZip->Test_folderProjectOrAnyDirectory($_GET['path']);
    $openZip->openZaipWathoutDelete();
}

// open user choose
if(isset($_GET['chos_file'])){
    $openZip->Test_folderProjectOrAnyDirectory($_GET['chos_file']);
    $openZip->openZip_chos();
}


?>

