<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'              =>  fake('id_ID')->name(),
            'alamat'            =>  fake('id_ID')->address(),
            'tempat_lahir'      =>  fake('id_ID')->city(),
            'tanggal_lahir'     =>  fake('id_ID')->date($format="Y-m-d", $max="2009-01-01"),
            'gender'            =>  fake('id_ID')->randomElement(['Laki-laki','Perempuan']),
            'hp'                =>  fake('id_ID')->phoneNumber(),
            'email'             =>  fake('id_ID')->unique()->safeEmail(),
            'role'              =>  'user',
            'username'          =>  fake('id_ID')->unique()->userName(),
            'email_verified_at' =>  now(),
            'password'          =>  static::$password ??= Hash::make('password'),
            'remember_token'    =>  Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
