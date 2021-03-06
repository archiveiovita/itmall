<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyMultiData extends Model
{
    protected $table = 'property_multidatas';

    protected $fillable = [
        'property_id'
    ];

    public function translations() {
        return $this->hasMany(PropertyMultiDataTranslation::class, 'property_multidata_id');
    }

    public function translation()
    {
        $lang = Lang::where('lang', session('applocale'))->first()->id ?? Lang::first()->id;

        return $this->hasMany(PropertyMultiDataTranslation::class, 'property_multidata_id')->where('lang_id', $lang);
    }

    public function translationByLanguage($lang = 1)
    {
        return $this->hasMany(PropertyMultiDataTranslation::class, 'property_multidata_id')->where('lang_id', $lang);
    }
}
