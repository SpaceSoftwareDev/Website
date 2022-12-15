<?php namespace AppSpaceWeb\TeamMember\Http\Controllers;

use Illuminate\Routing\Controller;
use AppSpaceWeb\TeamMember\Models\TeamMember;
use AppSpaceWeb\TeamMember\Http\Resources\TeamResource;

class TeamController extends Controller
{
    public function index()
    {
        return TeamResource::collection(
            TeamMember::isPublished()
                ->orderBy('sort_order', 'asc')
                ->get()
        );
    }
}
