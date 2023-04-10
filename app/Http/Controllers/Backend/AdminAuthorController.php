<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VprContentPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\VprContentMaterialPerson;
use App\Http\Requests\AuthorUpdateRequest;
use Illuminate\Support\Facades\Gate;

class AdminAuthorController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('is_supperuser') && !Gate::allows('is_staff')) {
            abort(403);
        }
        $author = new VprContentPerson();

        $author = $author->paginate(10);

        $data['author'] = $author;
        return view('backend.authors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = VprContentPerson::where('id', $id)->first();
        return view('backend.authors.edit')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdateRequest $request, $id)
    {
        $author = VprContentPerson::find($id);
        $author->fullname = $request->last_name.' '.$request->first_name;
        $author->email = $request->email;
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->homepage = $request->homepage;
        $author->national = $request->national;
        $author->biography = $request->biography;

        if ($request->hasFile('avatar')) {
            // Delete old image
            if ($author->avatar) {
                Storage::delete($author->avatar);
            }
            // Store image
            $image_path = $request->file('avatar')->store('authors', 'public');
            // Save to Database
            $author->avatar = $image_path;
        }


        if (!$author->save()) {
            return redirect()->back()->with('error', 'update không thành công.');
        }
        return redirect()->route('author.index')->with('success', 'Cập nhật thông tin tác giả thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = VprContentPerson::find($id);
        if($author){
            $materialperson = VprContentMaterialPerson::where('person_id', $id);
            $materialperson->delete();
        }
        $author->delete();

        return response('Xóa bản ghi thành công.', 200);
    }
}
