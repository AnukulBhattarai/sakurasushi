<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

    public function index(Request $request)
    {
        $query = Certificate::query();

        if ($request->filled('q')) {
            $query->where('certificate_no', 'like', '%' . $request->input('q') . '%');
        }

        $certificates = $query->latest()->simplePaginate(15);

        return view('pages.certificate.index', compact('certificates'));
    }
    public function show(Certificate $certificate)
    {
        $student = $certificate->student;
        $program = $certificate->program;
        return view('pages.certificate.show', compact('certificate', 'student', 'program'));
    }


    public function certificate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'certificate_no' => 'required|string|unique:certificates,certificate_no',
            'student_id' => 'required|integer|exists:students,id',
            'program_id' => 'required|integer|exists:programs,id',
        ]);
        $certificate = Certificate::create([
            'certificate_no' => $request->certificate_no,
            'student_id' => $request->student_id,
            'program_id' => $request->program_id,
        ]);
        return redirect()->back()->withSuccess('The certificate has been created successfully!');
    }
}
