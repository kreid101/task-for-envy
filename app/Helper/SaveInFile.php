<?php 

namespace App\Helper;

use Illuminate\Http\Request;

class SaveInfile 
{
    public function save(Request $request) 
    {
       $myfile=fopen(dirname($_SERVER['DOCUMENT_ROOT'],1).'/storage/app/form.txt','a');
       $name=$request->name;
       $phone=$request->phone;
       $message=$request->message;
       $txt="
       ---------------------
       имя: ${name}\n
       Телефон:${phone}\n
       Сообщение:${message}\n

       ";
       fwrite($myfile,$txt);
       fclose($myfile);
       return 'true';
       
    }
}