<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use Exception;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    //

    public function index()
    {
        $degrees = Degree::all();
        return view('accountant.degree.index', ['degrees' => $degrees]);
    }


    public function config(Request $request)
    {
        try {
            $data = $request->validate(
                [
                    'coeffs' => 'array|required',
                    'coeffs.*' => 'nullable|numeric|min:1'
                ]
            );
            foreach ($data['coeffs'] as $abbr => $coeff) {
                Degree::firstWhere('abbreviation', $abbr)->update(['coeff' => $coeff]);
            }
            return back()->with('success', 'Cập nhật hệ số thành công!');
        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
