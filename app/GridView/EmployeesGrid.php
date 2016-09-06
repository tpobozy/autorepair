<?php

namespace App\GridView;

use App\Entities\Employee;

class EmployeesGrid {

    public function grid()
    {
        $grid = \DataGrid::source(new Employee);

        $grid->attributes(array("class" => "table table-condensed"));
        
        $grid->add('<a href="{{ route(\'employees.edit\', $id) }}" data-id="{{ $id }}"><i class="fa fa-pencil-square-o"></i></a>', '')
                ->style('width: 60px;');
        $grid->add('firstname', 'Imie')->style('width: 200px;');
        $grid->add('lastname', 'Nazwisko')->style('width: 200px;');
        $grid->add('telephone', 'Telefon');

        $grid->orderBy('firstname', 'asc');
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

