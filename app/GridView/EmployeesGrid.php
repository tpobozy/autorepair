<?php

namespace App\GridView;

use App\Entities\Employee;

class EmployeesGrid {

    public function grid()
    {
        $grid = \DataGrid::source(new Employee);

        $grid->attributes(array("class" => "table table-condensed table-hover"));
        
//        $grid->add('<a href="{{ route(\'employees.edit\', $id) }}" data-id="{{ $id }}"><i class="fa fa-pencil-square-o"></i></a>', '')
//                ->style('width: 60px;');
        $grid->add('<a href="{{ route(\'employees.edit\', $id) }}" data-id="{{ $id }}">{{ $firstname }}</a>', 'Imie')->style('width: 200px;');
        $grid->add('<a href="{{ route(\'employees.edit\', $id) }}" data-id="{{ $id }}">{{ $lastname }}</a>', 'Nazwisko')->style('width: 200px;');
        $grid->add('telephone', 'Telefon');

        $grid->orderBy('firstname', 'asc');
        $grid->paginate(25);
        
        return $grid;
    }

    public function filters()
    {
        $filter = \DataFilter::source(new Employee);
//        $filter->add('title','Title', 'text');
//        $filter->add('categories.name','Categories','tags');
//        $filter->add('publication_date','publication date','daterange')->format('m/d/Y', 'en');
//        $filter->submit('search');
//        $filter->reset('reset');
//        $filter->build();

        return $filter;
    }

}

