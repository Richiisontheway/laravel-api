<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
class ProjectController extends Controller
{
    public function index()
    {
        //paginate serve per dividerci in pagine le risposte api
        $projects = Project::with('type','technologies')->paginate(3);
        return response()->json([
            'success' => true,
            'result' => $projects
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug',$slug)->firstOrFail();
        return response()->json([
            'success' => true,
            'result' => $project
        ]);
    }
}
