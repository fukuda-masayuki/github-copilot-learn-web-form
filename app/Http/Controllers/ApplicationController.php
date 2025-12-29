<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(): View
    {
        $applications = Application::query()
            ->orderByDesc('created_at')
            ->get();

        return view('applications.index', [
            'applications' => $applications,
        ]);
    }

    public function create(): View
    {
        return view('applications.create');
    }

    public function store(StoreApplicationRequest $request): RedirectResponse
    {
        $application = Application::create($request->validated());

        return redirect()->route('applications.show', $application);
    }

    public function show(Application $application): View
    {
        return view('applications.show', [
            'application' => $application,
        ]);
    }

    public function edit(Application $application): View
    {
        return view('applications.edit', [
            'application' => $application,
        ]);
    }

    public function update(UpdateApplicationRequest $request, Application $application): RedirectResponse
    {
        $application->update($request->validated());

        return redirect()->route('applications.show', $application);
    }

    public function destroy(Application $application): RedirectResponse
    {
        $application->delete();

        return redirect()->route('applications.index');
    }
}
