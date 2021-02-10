<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaPiloto extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'pruebas_piloto';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function revision()
    {
        return $this->belongsTo('App\Models\Revision', 'revision_id');
    }

    public function bibliotecas()
    {
        return $this->belongsToMany('App\Models\Biblioteca', 'prueba_piloto_biblioteca', 'prueba_piloto_id', 'biblioteca_id');
    }

    public function articulos()
    {
        return $this->hasMany('App\Models\Articulo', 'prueba_piloto_id', 'id');
    }

    public function creado_por()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function modificado_por()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
    public function eliminado_por()
    {
        return $this->belongsTo(User::class,'deleted_by');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
