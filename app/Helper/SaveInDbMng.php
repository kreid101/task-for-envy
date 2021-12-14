<?php 

namespace App\Helper;

class SaveInDbMng extends SaveForm 
{
    public function getInstance()
    {
        return new SaveInDb();
    }

}