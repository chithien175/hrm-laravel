<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoPhan extends Model
{
    public function scopeGetByPhongBanId($query, $id)
    {
        return $query->where('phongban_id', $id);
    }
}
