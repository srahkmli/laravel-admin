<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = 'Get form';

    public function handle(Model $model)
    {
        // $model ...
        //
        $res = $model::where('id', $this->getKey())->first()->name;
        //   return redirect()->action([FormController::class, 'index']);

        return $this->response()->success('Success message ' . $res)->refresh();
    }

}
