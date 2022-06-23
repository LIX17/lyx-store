<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();

        $data = [];
        $data['user'] = $user;
        $data['categories'] = $categories;

        return view('pages.dashboard-settings', $data);
    }

    public function account()
    {
        $user = Auth::user();

        $data = [];
        $data['user'] = $user;

        return view('pages.dashboard-account', $data);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
