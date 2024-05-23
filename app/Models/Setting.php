<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    public function get(string $key, $default = null)
	{
		$setting = Setting::where('key', $key)->first();
		return $setting ? $setting->value : $default;
	}
}