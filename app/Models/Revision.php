<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'revisiones';
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
    public function investigadores()
    {
        return $this->belongsToMany('App\Models\User', 'investigador_revision', 'revision_id', 'user_id');
    }
    public function metadatos()
    {
        return $this->belongsToMany('App\Models\Metadato', 'metadato_revision', 'revision_id', 'metadato_id');
    }
    public function bibliotecas()
    {
        return $this->belongsToMany('App\Models\Biblioteca', 'biblioteca_revision', 'revision_id', 'biblioteca_id');
    }

    public function articulos()
    {
        return $this->hasMany('App\Models\Articulo', 'revision_id', 'id');
    }

    public function preguntas()
    {
        return $this->hasMany('App\Models\PreguntaDeInvestigacion', 'revision_id', 'id');
    }
    public function prueba_piloto()
    {
        return $this->hasOne('App\Models\PruebaPiloto', 'id', 'prueba_piloto_id');
    }
    public function criterios()
    {
        return $this->hasMany('App\Models\Criterio', 'revision_id', 'id');
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
