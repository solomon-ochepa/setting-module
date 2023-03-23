<?php

namespace Modules\Setting\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\app\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $setting
     * @return Renderable
     */
    public function show(Setting $setting)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $setting
     * @return Renderable
     */
    public function edit(Setting $setting)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $setting
     * @return Renderable
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $setting
     * @return Renderable
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
