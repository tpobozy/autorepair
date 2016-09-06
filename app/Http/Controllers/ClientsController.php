<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Entities\Order;


class ClientsController extends Controller
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
        $name = $request->query('name');

        $client = $this->orders->findUniqueClientsByName($name, [
            'id', 'name', 'address', 'nip', 'telephone',
        ]);

        return response()->json([
            'status' => 'success',
            'data' => ($client) ? $client->toArray() : [],
        ]);
    }

}
