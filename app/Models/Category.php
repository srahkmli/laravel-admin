<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
class Category extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'demo_categories';
 public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('id');
        $this->setOrderColumn('order');
        $this->setTitleColumn('title');
    }
}


