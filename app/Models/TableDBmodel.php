<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

//class TableDBmodel extends Model
class TableDBmodel extends Authenticatable
{
    use HasFactory;
    protected $table='tableusers';
    protected $primaryKey ='id';

    protected $fillable=['nom','prenom','username','password'];
}
