<?php

namespace ChristianCocco\Swapi\Models;

use ChristianCocco\Swapi\Database\Factories\PeopleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PeopleFactory::new();
    }

  // Disable Laravel's mass assignment protection
  protected $guarded = [];

  /**
     * The Planet that belong to the People.
     */
    public function planet() {
        return $this->belongsTo(Planet::class);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public static function rules($id = null) {
        $rules = [
            'name' => 'required|min:3|max:255',
            'height' => 'required|min:3|max:255',
            'mass' => 'required|min:3|max:255',
            'hair_color' => 'required|min:3|max:255',
            'skin_color' => 'required|min:3|max:255',
            'eye_color' => 'required|min:3|max:255',
            'birth_year' => 'required|min:3|max:255',
            'gender' => 'required|min:3|max:255',
            'planet_id' => 'Integer'
        ];

        return $rules;
    }
}
