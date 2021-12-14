<?php 

namespace App\Helper;

use App\Models\Form;
use Illuminate\Http\Request;

class SaveInDb
{
    public function save (Request $request) 
    {
        $form=new Form();
        $form->name=$request->name;
        $form->number=$request->phone;
        $form->message=$request->message;
        $form->save();
    }
}