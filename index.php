<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        direction: rtl;
        background-color: #e3e7eab0;
    }
    .all_page {
        display: flex;
    }
    .all_click {
        width: 45%;
        text-align: center;
        padding-top: 17px;
    }
    section {
        text-align: right;
        margin-bottom: 60px;
    }
    .all_click input {
        width: 100%;
        height: 40px;
        border-radius: 5px;
        border: 1px solid green;
        padding-left: 5px;
        color:  #1b6f7b;;
        font-weight: 600;
        text-align: left;
        outline: none;
        text-align: center;
        margin-bottom: 6px;
    }
    section small {
        color: #5a0f0f;
        font-size: .7em;
        font-weight: bold;
    }
    label {
        display: block;
        padding: 8px
    }
    .all_click input:focus {
        outline: 1px solid green;
    }
    .click_send {
        width: 55%;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid green;
        margin-top: 50px;
        border-radius: 4px;
        cursor: pointer;
        background-color: white;
        transition: .5s;
        margin: 13px auto 0;
    }
    .click_send:hover {
        background: #0080000d;
    }
    #name_file_and_cho {
        position: relative;
        width: 90%;
        display: flex;
        flex-direction: column;
    }
    .loding {
        position: absolute;
        height: 100%;
        width: 100%;
        display: none;
        background-color: #1b6f7b3b;
        align-items: center;
        justify-content: center;
    }
    .loding img {
        width: 15%;
    }


    .all_name_file {
        text-align: left;
        padding: 14px;
        color: mediumblue;
        font-weight: bold;
    }
    .all_name_file div {
        background-color: white;
        padding: 11px;
        border-radius: 4px;
        margin-top: 1px;
        cursor: pointer;
    }
    .box {
        box-shadow: 2px 2px 2px #047f194d;
        background: white;
        color:green;
        border-radius: 9px;
        text-align: center;
        width: 75%;
        margin: 6px auto;
        padding: 20px 20px;
        font-weight: bold;
    }
    .nameFile {
        background-color: #0000000a;
        color: blue;
        border-radius: 4px;
        padding: 7px;
        margin-top: 10px;
        margin-bottom: 0;
    }
    .no_file {
        width: 50%;
        margin: 59px auto;
        color:red
    }
    .font_color {
        color: blue;
    }
    .Active {
        background-color: #a9ceb366  !important;
    }

    #chose_fi{
        display: none;
    }
    .size_file {
        background-color: white;
        border: 1px solid green;
        padding: 5px;
        margin-top: 10px;
        display: inline-block;
        color: #220581;
        border-radius: 3px;
        font-size: .8em;
    }
</style>
<body>
    

<div class="all_page" id="all_page">
    <div class="all_click">
            <label for="path">مسار الملفات المضغوطة</label>
            <section>
                <input type="text" name="" id="path" value="C:/Users/saifa/Downloads">
                <small>أذا لم يتم تحديد مسار سوف يظهر الملفات المضغوطة بداخل مجلد المشروع</small>
            </section>
            <!-- <input type="file" name="" id="user_chos" > -->
            <div id="show" class="click_send" onclick="ajax_opan_zip(this.id)">اظهار الملفات المضغوطة</div>
            <div id="send" class="click_send" onclick="ajax_opan_zip(this.id)">فتح الملفات المضغوطة</div>
            <div id="" class="click_send" onclick="wathout_opan_zip()">فتح الملفات المضغوطة بدون حذف الملفات</div>
    </div>
    <div id="name_file_and_cho">
        <div class="loding"><img src="loding.gif" alt="" srcset=""></div>
        <div id="name_file_opan">

        </div>
        <div id="chose_fi" class="click_send" onclick="open_chose_zip()">فتح الملفات المختارة</div>
    </div>
</div>

<script src="index.js"></script>
</body>
</html>




