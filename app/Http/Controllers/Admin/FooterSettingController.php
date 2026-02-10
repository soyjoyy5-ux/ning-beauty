<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;

class FooterSettingController extends Controller
{
    public function edit()
    {
        $footer = FooterSetting::first();
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $footer = FooterSetting::first();

        $footer->update($request->all());

        return back()->with('success','Footer updated successfully');
    }
}
