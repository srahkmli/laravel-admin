<?php

namespace App\Admin\Forms;


use App\Models\User;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Setting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'User-name-change';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());

;
$rateUpdate = User::where('id', $request->get('uID'))->
    update(['name' => $request->get('uName')]);

        admin_success('Processed successfully.');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
$this->text('uID')->rules('required');
$this->text('uName')->rules('required');

    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
             ];
    }
}
