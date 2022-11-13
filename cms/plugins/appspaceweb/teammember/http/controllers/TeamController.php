<?php namespace AppSpaceWeb\TeamMember\Http\Controllers;

use AppSpaceWeb\TeamMember\Http\Resources\TeamResource;
use AppSpaceWeb\TeamMember\Models\TeamMember;
use Illuminate\Routing\Controller;

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
