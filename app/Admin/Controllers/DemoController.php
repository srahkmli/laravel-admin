<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class DemoController extends Controller
{
    use ModelForm;

    public function index()
    {/**/
        return Admin::content(function (Content $content) {
            $content->header('Categories');
            $content->body(Category::tree());
        });



    }
}
