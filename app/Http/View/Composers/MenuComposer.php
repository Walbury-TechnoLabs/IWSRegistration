<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Discipline;
use App\Portfolio;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuDisciplines', Discipline::withCount('committees')->whereHas('committees')->pluck('name', 'id'));
        $view->with('menuPortfolios', Portfolio::withCount('committees')->whereHas('committees')->pluck('name', 'id'));
    }
}