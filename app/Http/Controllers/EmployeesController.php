<?php

namespace App\Http\Controllers;

use App\Entities\Employee;
use App\GridView\EmployeesGrid;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;


class EmployeesController extends Controller
{
    /**
     * @var EmployeeRepository
     */
    protected $employees;

    /**
     * @param  EmployeeRepository $employees
     * @return void
     */
    public function __construct(EmployeeRepository $employees)
    {
        $this->middleware('auth');

        $this->employees = $employees;
    }


    /**
     * Default: recent orders
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grid = (new EmployeesGrid())->grid();

        return view('employees.index', compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd( $request->request->all() );

        $this->validate($request, [
            'firstname'     => 'required|max:100',
            'lastname'      => 'required|max:100',
            'telephone'     => 'max:50',
        ]);


        $post = $request->request->all();
        
        $this->employees->create($post);


        return redirect('/employees');
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
        $employee = Employee::findOrFail($id);
        
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->request->all();
        $employee = Employee::findOrFail($id);

        $employee->update($post);

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect('/employees');
    }

}
