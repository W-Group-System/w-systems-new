<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    // protected $casts = [
    //     'department_id' => 'array', 
    // ];

    // public function departments()
    // {
    //     return Department::whereIn('id', $this->department_id ?? [])->get();
    // }
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}
