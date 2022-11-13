<?php namespace AppSpaceWeb\Project\Http\Controllers;

use Illuminate\Routing\Controller;
use AppSpaceWeb\Project\Models\Project;
use AppSpaceWeb\Project\Http\Resources\ProjectResource;

class ProjectsController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(
            Project::isPublished()
                ->orderBy('sort_order', 'asc')
                ->get()
        );
    }
}
