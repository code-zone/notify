<?php

use Illuminate\Database\Seeder;

class SetUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $abilities = ['view-orders', 'create-payments', 'create-meals', 'view-reports', 'view-payments', 'dispense-orders', 'update-meals', 'view-students', 'manage-students', 'manage-users'];
        foreach ($abilities as $ability) {
            Bouncer::allow('admin')->to($ability);
        }
        $studentPerms = ['view-orders', 'view-payments', 'order-meals'];
        foreach ($studentPerms as $ability) {
            Bouncer::allow('student')->to($ability);
        }
        $clerkPerms = ['view-orders', 'create-payments', 'create-meals', 'view-reports', 'view-payments', 'dispense-orders', 'update-meals', 'view-students'];
        foreach ($clerkPerms as $ability) {
            Bouncer::allow('clerk')->to($ability);
        }
    }
}
