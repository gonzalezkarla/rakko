<?php
namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

use App\Modules\General\Http\Domain\Models\Menu as LMenu;
use App\Modules\General\Http\Domain\Models\MenuLink;


use App;
//use Cache;
use Config;
//use DB;
use Menu;
use Session;


class FooterMenu extends AbstractWidget
{


	public function run()
	{

		Menu::handler('footer')->hydrate(function()
			{
			$main_menu_id = LMenu::where('name', '=', 'footer')->pluck('id');
			return MenuLink::where('menu_id', '=', $main_menu_id)->orderBy('position')->get();
			},
			function($children, $item)
			{
				$children->add($item->translate(App::getLocale())->url, $item->translate(App::getLocale())->title, Menu::items($item->as));
			});

		return view("widgets.footer_menu");
	}


}
