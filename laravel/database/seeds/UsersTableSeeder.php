<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    if (User::count()) {
      return;
    }

    $user = User::create(
      [
        'first_name' => 'Default',
        'last_name' => 'Account',
        'email' => 'default@example.com',
        'password' => Hash::make('asd'),
        'active' => TRUE,
      ]
    );
  }

}
