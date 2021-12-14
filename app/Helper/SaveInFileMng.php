<?php 

namespace App\Helper;

class SaveInfileMng extends SaveForm 
{
    public function getInstance()
    {
        return new SaveInfile();
    }
}