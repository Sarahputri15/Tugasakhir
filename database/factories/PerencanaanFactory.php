<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perencanaan>
 */
class PerencanaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'Dokumen_id'=> mt_rand(1,3),
            //'Dokumen' => $this->dokumen->Dokumen,
            //'edisi' => $this->faker->randomDigit(),
            //'tanggal_upload' => $this->faker->dateTimeAD(),
            //'tanggal_pengesahan' => $this->faker->dateTimeAD()
        ];
    }
}
