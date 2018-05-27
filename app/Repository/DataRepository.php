<?php
namespace App\Repository;
use DB;
use Illuminate\Support\Facades\File;
/**
* 
*/
class DataRepository
{
        private $tableName;
        private $jsonFile;
        private $jsonDumpFolder;
        
        # Datetime $date is what I intended to use at the parameter
        # format of date parameter is 2016-03-12 04:12:34
        public function __construct()
        {
        }

        /*public function __destruct() {
                $this->tableName = null;
                $this->jsonFile =null;
                $this->jsonDumpFolder = null;
        }*/

        public function setTableName($tableName) {
                $this->tableName = $tableName;
                $jsonDumpFolder = public_path('..\database\seeds\dumps\json_dumps');
                $jsonFile = public_path('../database/seeds/dumps/json_dumps/'.$tableName.'.json');
                $this->jsonFile = $jsonFile;
                $this->jsonDumpFolder = $jsonDumpFolder;
                
        }

        public function downloadTableContents() {
                $this->createJsonDumpFolder();
                $data = DB::table($this->tableName)->get();
                $jsonData = json_encode($data, JSON_PRETTY_PRINT);

                if($handle = fopen($this->jsonFile, 'w')) {

                        (fwrite($handle, $jsonData));

                }
                return true;
        }

        public function isTableUpdated() {
                if(file_exists($this->jsonFile)) {
                        $previousData = File::get($this->jsonFile);
                        $previousDataCount = count(json_decode($previousData, TRUE));
                        $currentDataCount = DB::table($this->tableName)->count();
                        if($previousDataCount < $currentDataCount) {
                                // return 1111;
                                return true;
                        }
                        else {
                                // return 1000;
                                return false;
                        }
                }
                else {
                        // return 0000;
                        return false;
                }

        }

        public function isBackupDataYetToBeCreated() {
                if(!file_exists($this->jsonFile)) {
                        return true;
                }
                else {
                        return false;
                }
        }

        public function backup() {

                if($this->isTableUpdated()) {

                        $this->downloadTableContents();
                        
                }
                else if($this->isBackupDataYetToBeCreated()) {

                        $this->downloadTableContents();

                }
        }

        public function dataTableSeederFunction() {
            if(!$this->isBackupDataYetToBeCreated()) {
                $jsonData = File::get($this->jsonFile);
                $jsonArray = json_decode($jsonData, TRUE);
                if(count($jsonArray) > 0) {
                        DB::table($this->tableName)->insert($jsonArray);
                }
            }
            else {
                return false;
            }
        }

        public function dataTableSeedAllTableFunction() {
                $tables = $this->getAllTablesInADB();
                foreach ($tables as $table) {
                        $jsonData = File::get($this->jsonFile);
                        $jsonArray = json_decode($jsonData, TRUE);
                        if(count($jsonArray) > 0) {
                                DB::table($this->tableName)->insert($jsonArray);
                        }
                }
        }

        public function createJsonDumpFolder(){
                $this->createFolderIfNotExist($this->jsonDumpFolder);
        }

        public function createFolderIfNotExist($folderPath) {
                $segment = explode("\\", $folderPath);
                foreach ($segment as $path) {
                        if (!is_dir($path)) {
                                mkdir($path, $mode=0777, $recursive = false);
                                chdir($path);
                        }
                        elseif(is_dir($path)) {
                                chdir($path);
                        }
                }
        }

        //The two consequtive functions have not been tested
        public function getAllTablesInADB($exception = null) {
                $listOfTablesInDBArray = DB::select('SHOW TABLES');
                $json = json_encode($listOfTablesInDBArray, JSON_PRETTY_PRINT);
                $db = env('DB_DATABASE');
                $object = "Tables_in_".$db;
                $tableListArray = array();
                foreach ($listOfTablesInDBArray as $tableObject) {
                        if($tableObject->$object != 'migrations' || $tableObject->$object != $exception) {
                                $tableListArray[] = $tableObject->$object; 
                        }
                }
                return $tableListArray;
        }

        public function backupAllDatas() {
                $tableNameArray = $this->getAllTablesInADB();
                $backupData = new DataRepository();
                foreach ($tableNameArray as $tableName) {
                        $backupData->setTableName($tableName);
                        $backupData->backup();
                }
        }

        // Installations

        // Step 1: Create a directory in the app Folder named Repository
        // Also include use App/Repository/DataRepository in the lines of code before the declaration of your Controller's class.
        // Then the use the web route knowledge to continue the process

        // web routes will be Route::get('/backup/data', 'NameController@backupData')
        // function backupData will look like the following:
        // public function backupData () {
        //         $backup = new DataRepository;
        //         $backup->backupAllDatas();
        // }

        //Place the below script in whatever layout blade file you are using
        //the script does the backup of your database data asynchronously without causing your page to load slowly.

        /*<script type="text/javascript">
        var url = "{{url('/backup/data')}}";
        $.ajax({
            type: 'GET',
            async: true,
            url: url,
            success: function (data) {
                console.log("Routine Backup");
                console.log(data);
            },
            error: function () {
                console.log(".....xxxxxx....");
            }
        }); 
        </script>*/

}