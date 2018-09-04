<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSo extends Model
{
    public static function getNameById($id){
        $ho_so = HoSo::findOrFail($id);
        return $ho_so->ten;
    }
}
