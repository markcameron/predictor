<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCanPredictToMatchesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('matches', function (Blueprint $table) {
        $table->boolean('can_predict')->after('away_team_id')->default(FALSE);
        $table->boolean('is_ko_stage')->after('can_predict')->default(FALSE);
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('matches', function (Blueprint $table) {
        $table->dropColumn('can_predict');
        $table->dropColumn('is_ko_stage');
      });
  }

}
