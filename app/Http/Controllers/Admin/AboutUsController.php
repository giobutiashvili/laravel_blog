<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AboutUs;


class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::find(1);
        return view('admin/aboutUs', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
        $data = [
            'title' => $request->Title, 
            'text' => $request->Text,
        ];

        if($request->hasFile('Image')){
            $file = $request->Image;
            $imageName = Str::random(20). "." .$file->getClientOriginalExtension();
            $file->move(public_path().'/image/aboutUs/', $imageName);
            $data['image'] = $imageName;
        } 
        // $aboutUs = AboutUs::findorfail(1);

        AboutUs::updateOrcreate(['id'=>1],$data);

        return redirect() -> back() -> with('success', 'ოპერაცია წარმატებით დარედაქტირდა');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
