<?php namespace AppSpaceWeb\Team\Http\Controllers;

use AppSpaceWeb\Team\Http\Resources\TeamResource;
use AppSpaceWeb\Team\Models\Team;
use Illuminate\Routing\Controller;

class TeamController extends Controller
{
    public function index()
    {
        return TeamResource::collection(
            Team::isPublished()
                ->orderBy('sort_order', 'asc')
                ->get()
        );
    }
}
