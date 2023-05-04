<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dubai extends Model
{
    use HasFactory;
    protected $guarded = [];  


    public function getCreatedBy($id)
    {
        // return User::select('name')->where('id', $id)->first();        
        $ok = User::where('id', $id)->get('name');
        foreach($ok as $o) {
            return $o['name'];
        }

        
        // echo "<h1>test</h1>";
    }

}
