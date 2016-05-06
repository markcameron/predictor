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
        'first_name' => 'Mark',
        'last_name' => 'Cameron',
        'email' => 'mark.oliver.cameron@gmail.com',
        'password' => Hash::make('asd'),
        'active' => TRUE,
      ]
    );
  }

}
