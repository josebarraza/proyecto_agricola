<?php

namespace Agricola;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    
    protected $table = 'users';

    protected $fillable = ['nombre', 'email', 'password','apellido_pat','apellido_mat','tipo'];

    protected $hidden = ['password', 'remember_token'];

    public function bodegas(){
        return $this->hasMany('Agricola\Renta');
    }
    public function tarjeta(){
       return $this->hasOne('Agricola\Card');
    }
    public function carrito(){
        return $this->hasOne('Agricola\Carrito');
    }
    public function datosF(){
        return $this->hasOne('Agricola\DatosFacturacion');
    }
    public function addresses(){
        return $this->hasMany('Agricola\Address');
    }
     public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    } 
    

}
