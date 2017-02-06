<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Invoice;
use App\InvoiceItem;

class InvoiceTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();
        Invoice::truncate();
        InvoiceItem::truncate();

        foreach (range(1, 25) as $i) {
            $items = collect();

            foreach (range(1, mt_rand(2, 6)) as $j) {
                $price = $faker->numberBetween(100, 1000);
                $quantity=$faker->numberBetween(1, 20);
                $items->push(new InvoiceItem([
                    'name'     => $faker->sentence,
                    'quantity' => $quantity,
                    'price'    => $price,
                    "total"    => ($price * $quantity)


                ]));

                $sub_total=$items->sum('total');
                $discount=$faker->numberBetween(10, 20);
                $grand_total=$sub_total-$discount;
                $invoice=Invoice::create([
                    'client' => $faker->name,
                    'client_address'       => $faker->address,
                    'title'=>$faker->sentence,
                    'invoice_no'=>$faker->numberBetween(10000, 40000),
                    'invoice_date'=>$faker->date(),
                    'due_date'=>$faker->date(),
                    'discount'=>$discount,
                    'sub_total'=>$sub_total,
                    'grand_total'=>$grand_total



                ]);

                $invoice->items()->saveMany($items);

            }

        }
    }

}
