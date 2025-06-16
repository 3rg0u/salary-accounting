<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassCoeff;
use App\Models\OfferedCourse;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\ClassConstFetch;

class ClassController extends Controller
{
    //

    public function index()
    {
        $data = ClassCoeff::all();
        $opening = AcademicYear::opening();

        return view('accountant.classes.index', ['coeffs' => $data, 'opening' => $opening]);
    }


    public function config(Request $request)
    {
        try {
            $valid = $request->validate(
                [
                    'lowerbound' => 'required|integer|min:30',
                    'upperbound' => 'required|integer'
                ]
            );

            if ($valid['upperbound'] - $valid['lowerbound'] != 10) {
                return back()->withErrors(['error' => 'Hệ số b cần phải lớn hơn hệ số a 10 đơn vị!']);
            }


            AcademicYear::opening()->cls_coeff->update($valid);

            sleep(3);
            OfferedCourse::chunk(100, function ($classes) {
                foreach ($classes as $class) {
                    if ($class->std_nums != null) {
                        $class->update(
                            [
                                'coeff' => ClassCoeff::evalCoeff($class->std_nums)
                            ]
                        );
                    }
                }
            });

            return back()->with('success', 'Cập nhật thông tin thành công!');

        } catch (Exception $err) {
            return back()->withErrors(['error' => $err->getMessage()]);
        }
    }
}
