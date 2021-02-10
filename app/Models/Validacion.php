<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validacion extends Model
{
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'validaciones';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = ['mejoras' => 'array'];

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
    public function getMejorasJsonAttribute(){
        return json_decode($this->mejoras);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
