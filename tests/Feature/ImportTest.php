<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Summary;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFileImport()
    {

        \Artisan::call('db:seed', [
            '--class' => 'ImportDataFromFile',
        ]);

        $rows_count = Summary::count();
        $this->assertSame(3, $rows_count);
    }
}
