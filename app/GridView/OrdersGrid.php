<?php

namespace App\GridView;

use App\Entities\Order;

class OrdersGrid {

    public function grid()
    {
        $grid = \DataGrid::source(new Order);

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
        


//        $grid = \DataGrid::source($filter);
//        $grid->attributes(array("class"=>"table table-striped"));
//        $grid->add('id','ID', true)->style("width:70px");
//        $grid->add('title','Title', true);
//        $grid->add('author.fullname','Author');
//        $grid->add('{{ implode(", ", $categories->lists("name")->all()) }}','Categories');
//        $grid->add('publication_date|strtotime|date[m/d/Y]','Date', true);
//        $grid->add('body|strip_tags|substr[0,20]','Body');
//        $grid->edit('/rapyd-demo/edit', 'Edit','modify|delete');
//        $grid->paginate(10);

        return $grid;
    }

    public function filters()
    {
        $filter = \DataFilter::source(Order::with('client', 'car'));
        $filter->add('title', 'Title', 'text');
        $filter->add('categories.name', 'Categories', 'tags');
        $filter->add('publication_date', 'publication date', 'daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        return $filter;
    }

}

