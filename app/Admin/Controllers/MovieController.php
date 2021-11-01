<?php

namespace App\Admin\Controllers;

use App\Models\Movies;
use App\Models\User;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use Encore\Admin\Facades\Admin;

class MovieController extends AdminController
{
    /**/
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movies';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
     public function grid()
    {
     $grid = new Grid(new Movies());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('director', __('Director'));
        $grid->column('describe', __('Describe'));
        $grid->column('rate', __('Rate'));
        $grid->column('released', __('Released'));
        $grid->column('release_at', __('Release at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

return $grid;



 /*
$grid = new Grid(new Movies);

// The first column displays the id field and sets the column as a sortable column
$grid->id('ID')->sortable();

// The second column shows the title field, because the title field name and the Grid object's title method conflict, so use Grid's column () method instead
$grid->column('title');

// The third column shows the director field, which is set by the display($callback) method to display the corresponding user name in the users table
$grid->director()->display(function ($userId) {
    return User::find($userId)->name;
});

// The fourth column appears as the describe field
$grid->describe();

// The fifth column is displayed as the rate field
$grid->rate();

// The sixth column shows the released field, formatting the display output through the display($callback) method
$grid->released('Release?')->display(function ($released) {
    return $released ? 'yes' : 'no';
});

// The following shows the columns for the three time fields
$grid->release_at();
$grid->created_at();
$grid->updated_at();

// The filter($callback) method is used to set up a simple search box for the table
$grid->filter(function ($filter) {

    // Sets the range query for the created_at field
    $filter->between('created_at', 'Created Time')->datetime();
}); */
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    public function detail($id)
    {
        $show = new Show(Movies::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('director', __('Director'));
        $show->field('describe', __('Describe'));
        $show->field('rate', __('Rate'));
        $show->field('released', __('Released'));
        $show->field('release_at', __('Release at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        $form = new Form(new Movies());

         $form->text('title', __('Title'));
        $form->number('director', __('Director'));
        $form->text('describe', __('Describe'));
        $form->switch('rate', __('Rate'));
        $form->text('released', __('Released'));
        $form->datetime('release_at', __('Release at'))->default(date('Y-m-d H:i:s'));
/* */
        return $form;
    }
}
