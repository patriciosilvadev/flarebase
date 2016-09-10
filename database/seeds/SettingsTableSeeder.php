<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('settings')->delete();
        \DB::table('settings')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'ticket_complete_allowed' => 2,
                    'ticket_assign_allowed' => 2,
                    'lead_complete_allowed' => 2,
                    'lead_assign_allowed' => 2,
                    'time_change_allowed' => 2,
                    'comment_allowed' => 2,
                    'company' => 'Media',
                    'created_at' => null,
                    'updated_at' => null,
                ),
        ));
    }
}
