<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use Illuminate\Support\Facades\DB;

class PortalController extends Controller
{
    public function index()
    {
        return view('pages.portal', [
            'material_count' => Materials::count(),
            'file_count' => DB::table('materials')->selectRaw("SUM(cardinality(string_to_array(files, ','))) as total_sum")->value('total_sum')
        ]);
    }
}
