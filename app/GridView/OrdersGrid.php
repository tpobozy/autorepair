<?php

namespace App\GridView;

use App\Entities\Order;

class OrdersGrid {

    public function grid()
    {
        $filter = $this->filters();
        $grid = \DataGrid::source($filter);
        //$grid = \DataGrid::source(new Order);

        $grid->attributes(array("class" => "table table-condensed table-hover"));
        
        
        $grid->add('<a href="{{ route(\'orders.edit\', $id) }}" data-id="{{ $id }}">{{ $number }}</a>', 'Nr Zlecenia')->style('width: 150px;');
        $grid->add('<a href="{{ route(\'orders.edit\', $id) }}" data-id="{{ $id }}">{{ $name }}</a> ', 'Nazwa')->style('width: 200px;');
        $grid->add('<a href="{{ route(\'orders.edit\', $id) }}" data-id="{{ $id }}">{{ $license_number }}</a>', 'Nr Rejestracyjny');
        $grid->add('{{ $make ." ". $model }}', 'Marka, model');
        $grid->add('date', 'Data', 'date')->style('width: 110px;');
        $grid->add('<a class="print" href="{{ route(\'orders.print_order\', $id) }}" data-id="{{ $id }}"><i class="fa fa-print" "></i></a>', '')
                ->style('width: 40px;');

        $grid->orderBy('date', 'desc');
        $grid->paginate(25);
        

        return $grid;
    }

    public function filters()
    {
        $filter = \DataFilter::source(new Order);
        $filter->add('name', 'Nazwa', 'text');
        $filter->add('license_number', 'Nr Rejestracyjny', 'text');
        //$filter->add('categories.name', 'Categories', 'tags');
        //$filter->add('publication_date', 'publication date', 'daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('clear');
        $filter->build();

        return $filter;
    }

}

