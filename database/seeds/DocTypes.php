<?php

use Illuminate\Database\Seeder;

class DocTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Internal','Hospital Memorandum','Hospital Special Order','Hospital Order','Hospital Personnel Order','Others (internal letters and other directives)','External (agency/individual letters, memoranda, circulars, etc.)'];

        foreach($types as $type) {
            DB::table('doc_types')->insert([
                'doc_type' => $type,
                'remarks' => Str::random(10)
            ]);
        }
    }
}
