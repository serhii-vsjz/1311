<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'area_id',
        'street',
        'house',
        'additional',
        'coordinates',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function __toString()
    {
        $string = "г.{$this->city->name}, {$this->area->name} раен";
        if ($this->street) {
            $string .= ", {$this->street}";
        }
        if ($this->house) {
            $string .= " {$this->house}";
        }
        if ($this->additional) {
            $string .= " ({$this->additional})";
        }
        return $string;
    }
}
