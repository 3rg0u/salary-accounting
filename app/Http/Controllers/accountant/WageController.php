<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Wage;
use Exception;
use Illuminate\Http\Request;

class WageController extends Controller
{
    //

    public function index()
    {
        $wages = Wage::all();
        $opening = AcademicYear::opening();
        return view('accountant.wage.index', ['wages' => $wages, 'opening' => $opening]);
    }


    public function config(Request $request)
    {
        try {
            $valid = $request->validate(
                [
                    'amount' => 'nullable|numeric|min:10000',
                    'description' => 'nullable',
                ]
            );

            AcademicYear::opening()->wage->update(
                $valid
            );

            return back()->with('success', 'Cập nhật thông tin thành công!');

        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
