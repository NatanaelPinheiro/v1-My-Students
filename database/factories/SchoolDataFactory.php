<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolData>
 */
class SchoolDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'school_name' => 'Undefined',
            'school_principal' => 'Undefined',
            'address' => 'Undefined',
            'city' => 'Undefined',
            'country' => 'Undefined',
            'school_phone' => 'Undefined',
            'national_position' => '-',
            'avarage_score' => '-',
        ];
    }
}
