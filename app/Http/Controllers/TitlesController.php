<?php

namespace App\Http\Controllers;

use App\Http\Requests\TitleCreateFormRequest;
use App\Http\Requests\TitleEditFormRequest;
use App\Models\Title;

class TitlesController extends Controller
{
    /**
     * Display a listing of all the titles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Title::all();

        return response()->view('titles.index', ['titles' => $titles]);
    }

    /**
     * Show the form for creating a new title.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('titles.create', ['title' => new Title]);
    }

    /**
     * Store a newly created title.
     *
     * @param TitleCreateFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitleCreateFormRequest $request)
    {
        Title::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'introduced_at' => $request->introduced_at,
        ]);

        return redirect()->route('titles.index');
    }

    /**
     * Display the specified title.
     *
     * @param  Title $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        return response()->view('titles.show', ['title' => $title]);
    }

    /**
     * Show the form for editing a title.
     *
     * @param  Title $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        return response()->view('titles.edit', ['title' => $title]);
    }

    /**
     * Update the specified title.
     *
     * @param  TitleEditFormRequest  $request
     * @param  Title $title
     * @return \Illuminate\Http\Response
     */
    public function update(TitleEditFormRequest $request, Title $title)
    {
        $title->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'introduced_at' => $request->introduced_at,
        ]);

        return redirect()->route('titles.index');
    }

    /**
     * Delete the specified title.
     *
     * @param  Title $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        $title->delete();

        return redirect()->route('titles.index');
    }
}
