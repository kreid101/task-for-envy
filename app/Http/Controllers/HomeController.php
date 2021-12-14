<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helper\SaveInfileMng;
use App\Helper\SaveInDbMng;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|regex:/[7-8][0-9]{10}$/',
                'message' => 'required'
            ],
            [
                'name.required' => 'Необходимо заполнить поле с именем',
                'phone.required' => 'Необходимо заполнить поле с номером',
                'phone.regex' => 'введен неправильный номер',
                'message.required' => 'Необходимо заполнить поле с сообщением'
            ]
        );
        $file = new SaveInfileMng();
        $file->getInstance()->save($request);
        $db = new SaveInDbMng();
        $db->getInstance()->save($request);
    }
}
