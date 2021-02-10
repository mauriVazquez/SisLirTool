<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'articulos';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $appends = array('biblioteca_nombre');

    protected $casts = [
        'extras' => 'array',
        'aceptado' => 'boolean'
    ];

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
        return $this->belongsTo(Revision::class, 'revision_id');
    }

    public function prueba_piloto()
    {
        return $this->belongsTo(PruebaPiloto::class, 'prueba_piloto_id');
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'articulo_id', 'id');
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
    public function getBibliotecaNombreAttribute()
    {
        return Biblioteca::findOrFail($this->extras['biblioteca'])->nombre;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
