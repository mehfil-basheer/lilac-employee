<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('fk_department')->constrained('departments')->onDelete('cascade');
            $table->foreignId('fk_designation')->constrained('designations')->onDelete('cascade');
            $table->string('phone_number')->nullable();
        });
    
        DB::table('users')->insert([
            ['name' => 'John Due', 'fk_department' => 1, 'fk_designation' => 1, 'phone_number' => '1234567890', 'created_at' => now()],
            ['name' => 'Tommy Mark', 'fk_department' => 2, 'fk_designation' => 2, 'phone_number' => '0987654321', 'created_at' => now()],
            ['name' => 'mammootty', 'fk_department' => 1, 'fk_designation' => 2, 'phone_number' => '1234567111', 'created_at' => now()],
            ['name' => 'Mohanlal', 'fk_department' => 2, 'fk_designation' => 1, 'phone_number' => '1234567555', 'created_at' => now()],
           
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['fk_department']);
            $table->dropForeign(['fk_designation']);
            $table->dropColumn(['fk_department', 'fk_designation', 'phone_number']);
        });
    }
};
