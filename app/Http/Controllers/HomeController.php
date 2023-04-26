<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VprContentMaterial;
use App\Models\VprContentMaterialPerson;
use App\Models\VprContentPerson;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $material_top = VprContentMaterial::whereIn('material_id', 
        ['0e60bfc6',
        '01f46fc2',
        '2d2e6a46',
        '3ec080b8',
        '4c212f92',
        '4dbdd6c5',
        '022e4f84',
        '45df218a',
        'b14d14a4',
        'be82eba8',
        'c3ad3533',
        'c6628b9e',
        'd4aa7723',
        'ecacee10',
        'f2feed3c',
        'f2feed3c',
        'f05253f3',
        'fd2f579c'])->inRandomOrder()->limit(6)->get();

      
        for($i = 0; $i < sizeof($material_top); $i++) {
            if(!empty($material_top[$i]->id))
            $author[] = DB::table('vpr_content_materialperson')
            ->where('vpr_content_materialperson.material_rid', $material_top[$i]->id)
            ->join('vpr_content_person', 'vpr_content_person.id', '=', 
            'vpr_content_materialperson.person_id')
            ->where('vpr_content_materialperson.role', '=', 1)
            ->get();

            // $author = DB::table('vpr_content_materialperson')->where('vpr_content_materialperson.material_rid', $material_top[$i]->id)->join('vpr_content_person', 'vpr_content_person.id', '=', 'vpr_content_materialperson.person_id')->where('vpr_content_materialperson.role', '=', 1)->first();

        }

        // $author = new VprContentPerson();
  

        for($i1 = 0; $i1 < sizeof($material_top); $i1++){
            $materials_try[] = $material_top[$i1];

            for($i = 0; $i < sizeof($materials_try); $i++){
                $categories[] = $materials_try[$i]->categories;
                $material_ids[] = $materials_try[$i]->id;
            }
        }

        $categories = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $categories);

        $name_arr = array();
        if (!empty($categories)) {
            for($i1 = 0; $i1 < sizeof($categories); $i1++){
                $categories_name = explode('  ', trim($categories[$i1]));
                $name = DB::table('vpr_content_category')->whereIn('id', $categories_name)->get();
                $name = $name->map(function($val, $index) use ($material_ids, $i1) {
                    return [
                        'id' => $val->id,
                        'name' => $val->name,
                        'parent' => $val->parent,
                        'description' => $val->description,
                        'material_id' => $material_ids[$i1],
                    ];
                })->toArray();
                $name_arr[] = $name;
                // dd($material_top);
                // dd($name_arr);
            }
        }

                    // dd($name_arr);
        $author_top = VprContentPerson::whereIn('id', 
        ['50',
        '69',
        '214',
        '702',
        '1233',
        '1651'])->inRandomOrder()->limit(6)->get();
        return view('welcome',['material_top' => $material_top, 'author_top' => $author_top, 'name_arr' => $name_arr, 'author' => $author]);
    }

    public function changeLang($locale){
        $lang = $locale;
        Session::put('language', $lang);
        return redirect()->back();
    }

    public function changePassword()
        {
        return view('user.change-password');
        }

        public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth('front')->user()->password)){
            return back()->with("error", "Mật khẩu cũ chưa chính xác, vui lòng kiểm tra lại!");
        }


        #Update the new Password
        VprContentPerson::whereId(auth('front')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Thay đổi mật khẩu thành công!");
}

}
