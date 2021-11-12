<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function hasImage()
    {
        if (!is_null($this->flag)) {
            return true;
        }
        return false;
    }

    public static function store($data)
    {
        $country = new Country;
        $country->fill($data);
        $country->flag = Storage::putFile('images', $data['flag']);
        $country->save();

        return $country;
    }
}
