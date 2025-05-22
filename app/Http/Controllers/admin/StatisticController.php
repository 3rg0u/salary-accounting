<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Falculty;
use App\Models\Professor;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class StatisticController extends Controller
{
    //

    public function index()
    {
        $counts = Falculty::withCount('profs')->get();
        return view('admin.statistic.index', ['data' => $counts]);
    }

    public function show($id)
    {
        try {
            $fal = Falculty::where('id', $id)->firstOrFail();
            $profs = Professor::where('falculty', $fal->abbreviation)->get();
            return view('admin.statistic.show', ['profs' => $profs, 'falculty' => $fal]);
        } catch (Exception $exc) {
            return back()->withErrors(['error' => 'Đã có lỗi xảy ra!']);

        }
    }
}
