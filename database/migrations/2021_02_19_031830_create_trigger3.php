<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrigger3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trigger_stock_3 AFTER UPDATE ON `carts` FOR EACH ROW
        BEGIN
            
            IF NEW.qty < OLD.qty THEN 
                UPDATE products SET stock=stock+(OLD.qty-NEW.qty)
                WHERE id=OLD.product_id;
            END IF;
            IF NEW.qty > OLD.qty THEN 
                UPDATE products SET stock=stock-(OLD.qty-NEW.qty)
                WHERE id=OLD.product_id;
            END IF;
            
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `trigger_stock_3`');
    }
}
