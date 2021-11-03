<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Post\Replicate;
use App\Admin\Forms\Suggestion;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use App\Admin\Forms\Setting;

class UsersController extends AdminController
{

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->add(new Replicate);
        });
        return $grid;

    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
    public function setting(Content $content)
    {
        $content
            ->title('Search')
            ->row(new Search());

        // If there is data returned from the backend, take it out of the session and display it at the bottom of the form
        if ($result = session('result')) {
            $content->row('<pre>'.json_encode($result).'</pre>');
        }

        return $content;
    }
    public function suggestion(Content $content)
    {
        $forms = [
            'Movies' => Form\Suggestion::class,
        ];

        return $content
            ->title('Tools')
            ->body(Tab::forms($forms));
        //->title('User-suggestions')
        // ->body(new Suggestion());
    }

}
