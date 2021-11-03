<?php

namespace App\Admin\Controllers;

use App\Admin\Forms;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;

class FormController extends Controller
{
    public function index(Content $content)
    {
        $forms = [
            'basic' => Forms\Setting::class,
            'site' => Forms\Suggestion::class,
            // 'upload' => Setting\Upload::class,
            //'database' => Setting\Database::class,
            // 'develop' => Setting\Develop::class,
        ];

        return $content
            ->title('Forms')
            ->body(Tab::forms($forms));
    }
}
