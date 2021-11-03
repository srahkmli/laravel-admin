<?php

namespace App\Admin\Forms;

use App\Models\Movies;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Suggestion extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'User-rate-movie';

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
        $rateUpdate = Movies::where('user_id', $request->get('uID'))->
            update(['rate' => $request->get('rate-movie')]);

        admin_success('Processed successfully.');
        return back();

    }

    /**
     * Build a form here.
     */
    public function form()
    {
        //   $this->text('id');
        $this->text('uID');

        $this->text('rate-movie');

        // $restaurants = User::all()->pluck('name', 'id');
        // $this->hidden('user_id');

    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            // 'user_id' => \request()->get('id'),
        ];
    }
}
