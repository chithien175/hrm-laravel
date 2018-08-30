<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoPhan;

class BoPhanController extends Controller
{
    public function dsBoPhanTheoPhongBan(Request $request)
	{
		if ($request->ajax()) {
			$ds_bo_phan = BoPhan::where('phongban_id',$request->phongban_id)->select('id', 'ten')->get();

			return response()->json($ds_bo_phan);
		}
	}
}
