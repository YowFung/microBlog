<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'notes_content' => 'required|min:5|max:140'
        ]);

        Auth::user()->notes()->create([
            'content' => $request->notes_content,
        ]);

        return redirect()->back();
    }

    public function destroy(Note $note)
    {
        $this->authorize('destroy', $note);
        $note->delete();

        session()->flash('success', '该条微博已被成功删除！');

        return redirect()->back();
    }
}
