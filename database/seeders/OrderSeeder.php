<?php

namespace Database\Seeders;

use App\Model\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Order::firstOrCreate(
            [
                'name' => 'Photo',
                'status' => 1,
                'rank' => 1,
                'details_required' => 1,
                'rate' => null,
            ]
        );
        Order::firstOrCreate(
            [
                'name' => 'Frame',
                'status' => 1,
                'rank' => 2,
                'details_required' => 1,
                'rate' => null,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Flex',
                'status' => 1,
                'rank' => 3,
                'details_required' => 1,
                'rate' => null,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Urgent',
                'status' => 1,
                'rank' => 4,
                'details_required' => 1,
                'rate' => null,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Reprint',
                'status' => 1,
                'rank' => 5,
                'details_required' => 1,
                'rate' => null,
            ]
        );
        Order::firstOrCreate(
            [
                'name' => 'Lamination(Photo)',
                'status' => 1,
                'rank' => 6,
                'details_required' => 1,
                'rate' => null,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Cup Print',
                'status' => 1,
                'rank' => 7,
                'details_required' => 1,
                'rate' => null,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Magic Cup',
                'status' => 1,
                'rank' => 8,
                'details_required' => 1,
                'rate' => null,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Photocopy',
                'status' => 1,
                'rank' => 9,
                'details_required' => 0,
                'rate' => 5,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Lamination(Documents)',
                'status' => 1,
                'rank' => 10,
                'details_required' => 0,
                'rate' => 30,
            ]
        );
      
        
        Order::firstOrCreate(
            [
                'name' => 'SIM Card',
                'status' => 1,
                'rank' => 12,
                'details_required' => 0,
                'rate' => 100,
            ]
        );
        
        Order::firstOrCreate(
            [
                'name' => 'EDV',
                'status' => 1,
                'rank' => 13,
                'details_required' => 0,
                'rate' => 250,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Others',
                'status' => 1,
                'rank' => 14,
                'details_required' => 0,
                'rate' => 0,
            ]
        );

        Order::firstOrCreate(
            [
                'name' => 'Others',
                'status' => 1,
                'rank' => 14,
                'details_required' => 0,
                'rate' => 0,
            ]
        );



    }
}
