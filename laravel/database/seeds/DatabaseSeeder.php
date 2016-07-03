<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $this->call(UsersTableSeeder::class);
      $this->call(GroupsTableSeeder::class);
      $this->call(TeamsTableSeeder::class);
      $this->call(StadiumsTableSeeder::class);
      $this->call(MatchesTableSeeder::class);
      $this->call(EigthFinalsSeederTableSeeder::class);
      $this->call(QuarterFinalsTableSeeder::class);
      $this->call(SemiFinalsTableSeeder::class);
    }

}
