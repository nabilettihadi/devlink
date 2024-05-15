<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the links.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $links = Link::with('user')->paginate(10);

        return view('links.index', compact('links'));
    }

    /**
     * Store a newly created link in storage.
     *
     * @param StoreLinkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLinkRequest $request)
    {
        $link = Link::create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('links.index')->with('success', 'Link created successfully!');
    }

    /**
     * Display the specified link.
     *
     * @param Link $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified link.
     *
     * @param Link $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified link in storage.
     *
     * @param UpdateLinkRequest $request
     * @param Link $link
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
        ]);

        return redirect()->route('links.index')->with('success', 'Link updated successfully!');
    }

    /**
     * Remove the specified link from storage.
     *
     * @param Link $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('links.index')->with('success', 'Link deleted successfully!');
    }
}
