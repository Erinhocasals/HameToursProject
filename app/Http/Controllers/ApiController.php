<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function category($friendly) {
        $category = Category::where('friendly', '=', $friendly)->firstOrFail();
        return $category->toJson();
    }

    public function entity($friendly) {
        $entity = Entity::where('friendly', '=', $friendly)->firstOrFail();
        return $entity->toJson();
    }
}
