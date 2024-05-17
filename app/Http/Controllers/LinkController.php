<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $links = $user->links()->with('platform')->paginate(10);

        return view('links.index', compact('links'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'platform_id' => 'required|exists:platforms,id',
        ]);

        $user = $request->user();
        $link = new Link([
            'url' => $request->url,
            'platform_id' => $request->platform_id,
        ]);
        $user->links()->save($link);

        return redirect()->route('users.index')->with('success', 'Link created successfully!');
    }

    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    public function update(Request $request, $link)
    {
        $request->validate([
            'url' => 'required|url',
            'platform_id' => 'required|exists:platforms,id',
        ]);

        $link = Link::findOrFail($link);

        $link->update([
            'url' => $request->url,
            'platform_id' => $request->platform_id,
        ]);
        return redirect()->route('users.index')->with('success', 'Link updated successfully');
    }
    
    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('users.index')->with('success', 'Link deleted successfully!');
    }
}
