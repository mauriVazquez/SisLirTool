<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'evaluaciones';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'resultado' => 'array'
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

    public function articulo()
    {
        return $this->hasOne(Articulo::class, 'articulo_id');
    }

    public function evaluador()
    {
        return $this->hasOne(User::class, 'user_id');
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
