<?php

use Illuminate\Database\Seeder;
use App\Models\Summary;

class ImportDataFromFile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        try{
            $file = new SplFileObject(storage_path(config('import.filename')));

            while (!$file->eof()) {
                $row = explode(',',$file->fgets());

                if(5 == count($row) && (int)$row[0] > 0){
                    $summary = Summary::firstOrNew([
                                    'created_on'  => trim($row[1]),
                                    'country_iso' => trim($row[2])
                                ],
                                [
                                    'shows'  => (int)$row[3],
                                    'clicks' => (int)$row[4],
                                ]);
                    $summary->save();
                }
            }

            $file = null;
        } catch(Exception $e){
            \Log::error($e->getMessage());
            echo('Import failed:'.$e->getMessage());
        }

    }
}
