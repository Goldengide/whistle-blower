<?php

use Illuminate\Database\Seeder;
use App\Repository\DataRepository;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = new DataRepository;
        $tableArray = $seed->getAllTablesInADB('users');
        // return json_encode($tableArray);
        foreach ($tableArray as $table) {
            $seed->setTableName($table);
            $seed->dataTableSeederFunction();
        }
        $this->call(UsersTableSeeder::class);

    }


}
