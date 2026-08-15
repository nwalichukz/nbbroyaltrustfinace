<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AccountPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investment_types')->insert([
            [
            'parent_name' => 'Savings',
            'name' => 'Beginner Plan',
            'min_amt'=>'150',
            'max_amt' => '4999',
            'earning_percentage'=> '0.8',
            'duration' => '60',
            'int_interval'=> '7',
            'monthly_contribution'=>null,
            'description'=> 'savings investment plan',
            ],

            [
                'parent_name' => 'Savings',
                'name' => 'MTC Saving 2',
                'min_amt'=>'5000',
                'max_amt' => '29999',
                'earning_percentage'=> '1.2',
                'duration' => '90',
                'int_interval'=> '7',
                'monthly_contribution'=>null,
                'description'=> 'savings investment plan',
                ],

                [
                    'parent_name' => 'Savings',
                    'name' => 'MTC Saving 3',
                    'min_amt'=>'30000',
                    'max_amt' => '149999',
                    'earning_percentage'=> '1.5',
                    'duration' => '120',
                    'int_interval'=> '7',
                    'monthly_contribution'=>null,
                    'description'=> 'savings investment plan'
                    ],

                    [
                        'parent_name' => 'Savings',
                        'name' => 'MTC Saving 4',
                        'min_amt'=>'150000',
                        'max_amt' => '100000000',
                        'earning_percentage'=> '2',
                        'duration' => '365',
                        'int_interval'=> '7',
                        'monthly_contribution'=>null,
                        'description'=> 'savings investment plan'
                        ],

                        [
                            'parent_name' => 'Current',
                            'name' => 'Basic Plan',
                            'min_amt'=>'1000',
                            'max_amt' => '49999',
                            'earning_percentage'=> '0.5',
                            'duration' => '30',
                            'int_interval'=> '7',
                            'monthly_contribution'=>null,
                            'description'=> 'current investment plans'
                            ],

                            [
                                'parent_name' => 'Current',
                                'name' => 'MTC Current Plan 2',
                                'min_amt'=>'50000',
                                'max_amt' => '199999',
                                'earning_percentage'=> '0.8',
                                'duration' => '30',
                                'int_interval'=> '7',
                                'monthly_contribution'=>null,
                                'description'=> 'current investment plans'
                                ],
                                
                                [
                                    'parent_name' => 'Current',
                                    'name' => 'MTC Current Plan 3',
                                    'min_amt'=>'200000',
                                    'max_amt' => '999999',
                                    'earning_percentage'=> '1.2',
                                    'duration' => '60',
                                    'int_interval'=> '7',
                                    'monthly_contribution'=>null,
                                    'description'=> 'current investment plans'
                                    ],

                                    [
                                        'parent_name' => 'Retirement Plan',
                                        'name' => 'Basic Plan',
                                        'min_amt'=>'1000',
                                        'max_amt' => '99999',
                                        'monthly_contribution' =>'500',
                                        'earning_percentage'=> '3',
                                        'int_interval'=> '30',
                                        'duration' => '365',
                                        'description'=> 'Retirement investment plans'
                                        ],

                                        [
                                            'parent_name' => 'Retirement Plan',
                                            'name' => 'MTC Retirement 2',
                                            'min_amt'=>'1000',
                                            'max_amt' => '499999',
                                            'monthly_contribution' =>'2000',
                                            'earning_percentage'=> '3',
                                            'int_interval'=> '30',
                                            'duration' => '1095',
                                            'description'=> 'Retirement investment plans'
                                            ],

                                            [
                                                'parent_name' => 'Retirement Plan',
                                                'name' => 'MTC Retirement 3',
                                                'min_amt'=>'1000',
                                                'max_amt' => '999999',
                                                'monthly_contribution' =>'2000',
                                                'int_interval'=> '30',
                                                'earning_percentage'=> '3',
                                                'duration' => '1460',
                                                'description'=> 'Retirement investment plans'
                                                ],

                                                [
                                                    'parent_name' => 'Retirement Plan',
                                                    'name' => 'MTC Retirement 4',
                                                    'min_amt'=>'1000',
                                                    'max_amt' => '100000000',
                                                    'monthly_contribution' =>'2000',
                                                    'earning_percentage'=> '3',
                                                    'int_interval'=> '30',
                                                    'duration' => '1815',
                                                    'description'=> 'Retirement investment plans'
                                                    ],
        ]);
    }
}
