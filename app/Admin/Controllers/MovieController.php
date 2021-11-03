<?php

namespace App\Admin\Controllers;

use App\Models\Movies;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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

        //  $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        //  $grid->column('director', __('Director'));
        //  $grid->column('describe', __('Describe'));
        // $grid->column('rate', __('Rate'));
        // $grid->column('released', __('Released'));
        // $grid->column('release_at', __('Release at'));
        // $grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));
        $grid->column('rate')->label([
            1 => 'default',
            5 => 'warning',
            9 => 'success',
            10 => 'info',
        ]);
        $grid->column('release_at')->editable('datetime');

        $grid->filter(function ($filter) {
            $filter->scope('directors')->where('director', '15');
        });
        $grid->actions(function ($actions) {

            $actions->disableEdit();
            $actions->disableView();
        });
        $grid->column('released')->filter([
            1 => 'yes',
            0 => 'Not yet',
        ]);
        $grid->quickCreate(function (Grid\Tools\QuickCreate$create) {
            $create->text('title', 'Title');
            $create->integer('rate', 'Rate');
            $create->datetime('released', 'Released');
        });

        $grid->column('title')->filter('like');


        return $grid;

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
