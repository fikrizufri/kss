<?php

use App\Models\Department;
use App\Models\Position;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MasterDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('fr_FR');


        $departemntSales = new Department();
        $departemntSales->name = "Sales & Marketing";
        $departemntSales->save();

        $departemntHRD = new Department();
        $departemntHRD->name = "Human Resources Department";
        $departemntHRD->save();

        $departemntPurchasing = new Department();
        $departemntPurchasing->name = "Purchasing";
        $departemntPurchasing->save();

        $departemntProduction = new Department();
        $departemntProduction->name = "Production";
        $departemntProduction->save();

        $departemntQA = new Department();
        $departemntQA->name = "Quality Assurance";
        $departemntQA->save();

        $departemntAccounting = new Department();
        $departemntAccounting->name = "Accounting";
        $departemntAccounting->save();

        $departemntWarehouse = new Department();
        $departemntWarehouse->name = "Warehouse";
        $departemntWarehouse->save();

        $departemntIT = new Department();
        $departemntIT->name = "Information & Technology";
        $departemntIT->save();

        $departemntPPIC = new Department();
        $departemntPPIC->name = "Product Planning Inventory Control";
        $departemntPPIC->save();

        $departemntGA = new Department();
        $departemntGA->name = "General Affairs";
        $departemntGA->save();


        $fakerUs = Faker::create('en_US');
        $dataDepartemnt = Department::all();

        for ($i = 0; $i < 100; $i++) {
            # code...
            foreach ($dataDepartemnt as $key => $value) {
                $position = new Position();
                $position->name = $fakerUs->jobTitle;
                $position->department_id = $value->id;
                $position->save();
            }
        }
    }
}
