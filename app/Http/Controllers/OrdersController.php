<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Entities\OrderProduct;
use App\Entities\OrderService;
use App\GridView\OrdersGrid;
use App\Repositories\EmployeeRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;


class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orders;

    /**
     * @var ServiceRepository
     */
    protected $services;

    /**
     * @var EmployeeRepository
     */
    protected $employees;

    /**
     * @param  OrderRepository  $orders
     * @return void
     */
    public function __construct(OrderRepository $orders, ServiceRepository $services, EmployeeRepository $employees)
    {
        $this->middleware('auth');

        $this->orders = $orders;
        $this->services = $services;
        $this->employees = $employees;
    }


    /**
     * Default: recent orders
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grid = (new OrdersGrid())->grid();

        return view('orders.index', compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * @TODO - generate new order number
         */
        
        $services = $this->services->findAll();
        $employees = $this->employees->findAll();
        
        return view('orders.create', compact('services', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //dd( $request->request->all() );
        
        $post = $request->request->all();
        $post['date'] = (isset($post['date'])) ? $post['date'] : date('Y-m-d');
        
        $order = $this->orders->create($post);


        $services = $request->input('services');
        unset($services['#number#']);

        foreach ($services as $key => $service) {
            if ($service['service_id']) {
                $service['price'] = \str_replace(',', '.', $service['price']);
                
                $orderService = new OrderService($service);
                $instance = $order->services()->save($orderService);

                $instance->employees()->attach($service['employee_id']);
            }
        }


        $products = $request->input('products');
        unset($products['#number#']);
        
        foreach ($products as $key => $product) {
            if ($product['product']) {
                $product['purchased_price'] = \str_replace(',', '.', $product['purchased_price']);
                $product['selling_price'] = \str_replace(',', '.', $product['selling_price']);
                
                $orderProduct = new OrderProduct($product);
                $order->products()->save($orderProduct);
            }
        }


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $services = $this->services->findAll();
        $employees = $this->employees->findAll();
        
        return view('orders.edit', compact('order', 'services', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $post = $request->request->all();
        $order = Order::findOrFail($id);

        $order->update($post);


        $order->services()->delete();

        $services = $request->input('services');
        unset($services['#number#']);

        foreach ($services as $key => $service) {
            if ($service['service_id']) {
                $service['price'] = \str_replace(',', '.', $service['price']);

                $orderService = new OrderService($service);
                $instance = $order->services()->save($orderService);

                $instance->employees()->attach($service['employee_id']);
            }
        }

        
        $order->products()->delete();

        $products = $request->input('products');
        unset($products['#number#']);
        
        foreach ($products as $key => $product) {
            if ($product['product']) {
                $product['purchased_price'] = \str_replace(',', '.', $product['purchased_price']);
                $product['selling_price'] = \str_replace(',', '.', $product['selling_price']);
                
                $orderProduct = new OrderProduct($product);
                $order->products()->save($orderProduct);
            }
        }
        

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return redirect('/');
    }


    public function printer($id)
    {
        $order = Order::findOrFail($id);

        $data = $order->toArray();
        $data['fuel'] = $order->html_fuel();

//        $data = [
//            'title' => 'Zlecenie ' . $order->number,
//            'name' => $order->name,
//        ];

        $pdf = \PDF::loadView('orders.printer', $data);

        return $pdf->stream();
    }

    
    public function template()
    {
        return view('orders.template');
    }

}