<?php

namespace App\Http\Controllers;

use App\Models\CategoryPublication;
use Exception;
use Illuminate\Http\Request;

class CategoryPublicationController extends Controller
{
    public function index(){
        if(request()->ajax()) {
            return datatables()->of(CategoryPublication::select('*'))
                ->addColumn('action', 'admin.categoryPublicationAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.adminCategoryPublications');
    }

    public function store(Request $request){
        $request->validate([
            'name_category_publication' => 'required',
        ]);

        try
        {
            $categoryPublicationId = $request->id;
            $categoryPublication   =   CategoryPublication::updateOrCreate(
                [
                    'id' => $categoryPublicationId
                ],
                [
                    'name_faculty' => $request->name_category_publication
                ]);
            return Response()->json($categoryPublication);
        }
        catch (Exception $e)
        {
            return Response()->json($e,500);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $categoryPublication  = CategoryPublication::where($where)->first();

        return response()->json($categoryPublication);
    }

    public function destroy(Request $request)
    {
        $categoryPublication = CategoryPublication::where('id',$request->id)->delete();

        return Response()->json($categoryPublication);
    }
}
