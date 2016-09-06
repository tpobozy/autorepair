<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Entities\Order;


class CarsController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orders;

    /**
     * @param  OrderRepository  $orders
     * @return void
     */
    public function __construct(OrderRepository $orders)
    {
        $this->middleware('auth');

        $this->orders = $orders;
    }


    public function details(Request $request)
    {
        $vin = $request->query('vin');

        $car = $this->orders->findUniqueCarsByVIN($vin, [
            'id', 'vin', 'make', 'model', 'license_number', 'year', 'engine_size', 'radio_code'
        ]);

        return response()->json([
            'status' => 'success',
            'data' => ($car) ? $car->toArray() : [],
        ]);
    }

}
