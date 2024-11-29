<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Ready the permissions.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:report-list|report-create|report-edit|report-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:report-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:report-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:report-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $reports = Report::latest()->paginate(5);

        return view('reports.index', compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'report_type' => 'required',
            'detail' => 'required',
            'user_id' => 'required'
        ]);

        Report::create($request->all());

        return redirect()->route('reports.index')
            ->with('success', 'Report created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Report $report
     * @return View
     */
    public function show(Report $report): View
    {
        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Report $report
     * @return View
     */
    public function edit(Report $report): View
    {
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Report $report
     * @return RedirectResponse
     */
    public function update(Request $request, Report $report): RedirectResponse
    {
        request()->validate([
            'report_type' => 'required',
            'detail' => 'required',
            'user_id' => 'required'
        ]);

        $report->update($request->all());

        return redirect()->route('reports.index')
            ->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Report $report
     * @return RedirectResponse
     */
    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();

        return redirect()->route('reports.index')
            ->with('success', 'Report deleted successfully.');
    }
}
