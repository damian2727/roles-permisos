<?php

namespace App\TiendaPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	//desde aqui
    protected $fillable = [
        'name', 'slug', 'description', 'full-access',
    ];



    public function users(){

    	return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permissions(){

        return $this->belongsToMany('App\TiendaPermission\Models\Permission')->withTimesTamps();
    }
}
