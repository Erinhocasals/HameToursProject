<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Data;
use App\Models\FilterCategory;
use App\Models\Info;
use App\Models\Menu;
use App\Models\Social;
use App\Models\Template;
use Livewire\Component;

class FrontPages extends Component
{
    public $logo;

    public function render()
    {
        $categories = Category::where('category_id', '=', null)
            ->where('enabled', '=', true)
            ->get();
        $menus = Menu::where('enabled', '=', true)->where('show_in_nav', '=', true)->orderBy('order', 'ASC')->get();
        $footer = Menu::where('enabled', '=', true)->where('show_in_footer', '=', true)->orderBy('order', 'ASC')->get();
        $filters = FilterCategory::where('enabled', '=', true)->get();
        $search_template = Template::where('friendly', '=', 'busqueda-avanzada')->firstOrFail();
        $footer_links = Info::where('enabled', '=', true)->where('footer', '=', true)->get();
        $socials = Social::where('enabled', '=', true)->get();

        $data = Data::where('key', '=', 'global')->first();
        $templates = Template::all();

        return view('livewire.front-pages', compact('categories', 'menus', 'footer', 'filters', 'search_template', 'footer_links', 'socials', 'data', 'templates'));
    }
}
