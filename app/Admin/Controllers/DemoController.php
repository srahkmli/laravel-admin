<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movies;
use App\Models\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;


class DemoController extends Controller
{

    public function index()
    {

        $grid = new Grid(new User);

        $grid->column('id')->sortable();
        $grid->column('name');


        return $grid;

        $grid = new Grid(new Movies);
        $grid->column('id');
        $grid->column('user_id');
        $grid->column('title');

        return $grid;

    }

}
