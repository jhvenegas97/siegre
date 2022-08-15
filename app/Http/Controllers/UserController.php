<?php

namespace App\Http\Controllers;

use App\Models\Identification;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UserController extends Controller
{
    public function index()
    {
        dd(User::where(array('id'=>'1'))->roles->first());
        if (request()->ajax()) {
            return datatables()->of(DB::select('select u.id,name,email,state,identification_id from users u where u.id !="' . Auth::user()->id . '"'))
                ->addColumn('action', 'admin.userAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminUsers')
        ->with('roles',DB::select('select * from roles'))
        ->with('user', Auth::user());
    }

    public function changeState(Request $request)
    {
        try{
            $userId = $request->user_id;
            $user   =   User::updateOrCreate(
                [
                    'id' => $userId
                ],
                [
                    'state' => $request->state,
                ]
            );

            return Response()->json($user);
        }
        catch (Exception $e){
            return Response()->json($e,500);
        }
    }

    public function changeStateEdit(Request $request)
    {
        try{
            $where = array('id' => $request->id);
            $user  = User::where($where)->first();

            return Response()->json($user);
        }
        catch (Exception $e){
            return Response()->json($e,500);
        }
    }

    public function assingRole(Request $request)
    {
        try{
            $where = array('id' => $request->user_id);
            $user  = User::where($where)->first();

            $user->syncRoles([]);
            $user->assignRole([$request->role_id]);

            return Response()->json($user);
        }
        catch (Exception $e){
            return Response()->json($e,500);
        }
    }

    public function assingRoleEdit(Request $request)
    {
        try{
            $where = array('id' => $request->id);
            $user  = User::where($where)->first();
            $userToReturn = array('user'=>$user,'role'=>$user->roles->first());

            return Response()->json($userToReturn);
        }
        catch (Exception $e){
            return Response()->json($e,500);
        }
    }

    public function storeAdmin(Request $request)
    {
        $userHasPermissions = true;
        if(in_array("Egresado",Auth::user()->getRoleNames()->toArray()) || in_array("Gestor",Auth::user()->getRoleNames()->toArray())){
            if(Auth::user()->id != $request->id){
                $userHasPermissions = false;
            }
        }
        if($userHasPermissions){
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'identification_id' => 'required',
                'gender_id' => 'required',
                'role_id' => 'required',
                'state' => 'required',
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);


            try {
                $userId = $request->id;
                if ($request->has('file')) {
                    $imagePath = $request->file('file');
                    $imageName = $imagePath->getClientOriginalName();
                    $name = time().'.'.request()->file->getClientOriginalExtension();
                    $path = $request->file->move(public_path('uploads'), $imageName);

                    $user   =   User::updateOrCreate(
                        [
                            'id' => $userId
                        ],
                        [
                            'name' => $request->name,
                            'email' => $request->email,
                            'description' => $request->description,
                            'phone' => $request->phone,
                            'showCurriculum' => $request->has('showCurriculum') ? $request->input('showCurriculum') == 0 ? 1 : 0 : 0,
                            'identification_id' => $request->identification_id,
                            'program_id' => $request->program_id,
                            'gender_id' => $request->gender_id,
                            'state' => $request->state,
                            'role_id' => $request->role_id,
                            'direction' => $request->direction,
                            'fileName'=> $imageName,
                            'path'=>$path,
                        ]
                    );
                    
                }
                $user   =   User::updateOrCreate(
                    [
                        'id' => $userId
                    ],
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'description' => $request->description,
                        'phone' => $request->phone,
                        'showCurriculum' => $request->has('showCurriculum') ? $request->input('showCurriculum') == 0 ? 1 : 0 : 0,
                        'identification_id' => $request->identification_id,
                        'state' => $request->state,
                        'role_id' => $request->role_id,
                        'program_id' => $request->program_id,
                        'gender_id' => $request->gender_id,
                        'direction' => $request->direction,
                    ]
                );

                return Response()->json($user);

            } catch (Exception $e) {
                return Response()->json($e,500);
            }
        }
        else{
            return response()->json([
                'errors'=>'USER DOES NOT HAVE THE RIGHT PERMISSIONS. D'
            ],401);
        }
    }

    public function store(Request $request)
    {
        $userHasPermissions = true;
        if(in_array("Egresado",Auth::user()->getRoleNames()->toArray()) || in_array("Gestor",Auth::user()->getRoleNames()->toArray())){
            if(Auth::user()->id != $request->id){
                $userHasPermissions = false;
            }
        }
        if($userHasPermissions){
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'identification_id' => 'required',
                'gender_id' => 'required',
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);


            try {
                $userId = $request->id;
                if ($request->has('file')) {
                    $imagePath = $request->file('file');
                    $imageName = $imagePath->getClientOriginalName();
                    $name = time().'.'.request()->file->getClientOriginalExtension();
                    $path = $request->file->move(public_path('uploads'), $imageName);

                    $user   =   User::updateOrCreate(
                        [
                            'id' => $userId
                        ],
                        [
                            'name' => $request->name,
                            'email' => $request->email,
                            'description' => $request->description,
                            'phone' => $request->phone,
                            'showCurriculum' => $request->has('showCurriculum') ? $request->input('showCurriculum') == 0 ? 1 : 0 : 0,
                            'identification_id' => $request->identification_id,
                            'program_id' => $request->program_id,
                            'gender_id' => $request->gender_id,
                            'direction' => $request->direction,
                            'fileName'=> $imageName,
                            'path'=>$path,
                        ]
                    );
                    
                }
                $user   =   User::updateOrCreate(
                    [
                        'id' => $userId
                    ],
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'description' => $request->description,
                        'phone' => $request->phone,
                        'showCurriculum' => $request->has('showCurriculum') ? $request->input('showCurriculum') == 0 ? 1 : 0 : 0,
                        'identification_id' => $request->identification_id,
                        'program_id' => $request->program_id,
                        'gender_id' => $request->gender_id,
                        'direction' => $request->direction,
                    ]
                );

                return Response()->json($user);

            } catch (Exception $e) {
                return Response()->json($e,500);
            }
        }
        else{
            return response()->json([
                'errors'=>'USER DOES NOT HAVE THE RIGHT PERMISSIONS. D'
            ],401);
        }
    }

    public function createUser(Request $request)
    {
        $userHasPermissions = false;
        if(in_array("Admin",Auth::user()->getRoleNames()->toArray())){
            $userHasPermissions = true;
        }

        if($userHasPermissions){
            return view('admin.adminUsersCreate')
                ->with('programs', DB::select('select * from programs'))
                ->with('academicLevels', DB::select('select * from academic_levels'))
                ->with('workTypes', DB::select('select * from work_types'))
                ->with('roles',DB::select('select * from roles'))
                ->with('genders',DB::select('select * from genders'));
        }
        else{
            return response()->json([
                'errors'=>'USER DOES NOT HAVE THE RIGHT PERMISSIONS.'
            ],401);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $user  = User::where($where)->first();

        $userHasPermissions = true;
        if(in_array("Egresado",Auth::user()->getRoleNames()->toArray()) || in_array("Gestor",Auth::user()->getRoleNames()->toArray())){
            if(Auth::user()->id != $user->id){
                $userHasPermissions = false;
            }
        }

        if($userHasPermissions){
            return view('admin.adminUsersEdit')
                ->with('user', $user)
                ->with('programs', DB::select('select * from programs'))
                ->with('academicLevels', DB::select('select * from academic_levels'))
                ->with('workTypes', DB::select('select * from work_types'))
                ->with('roles',DB::select('select * from roles'))
                ->with('genders',DB::select('select * from genders'));
        }
        else{
            return response()->json([
                'errors'=>'USER DOES NOT HAVE THE RIGHT PERMISSIONS.'
            ],401);
        }

    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        $userHasPermissions = true;
        if(in_array("Egresado",Auth::user()->getRoleNames()->toArray()) || in_array("Gestor",Auth::user()->getRoleNames()->toArray())){
            if(Auth::user()->id != $user->id){
                $userHasPermissions = false;
            }
        }
        if($userHasPermissions){
            //Delete on cascade, because the publications and all data related is going to be deleted
            $user = User::where('id', $request->id)->delete();
            return Response()->json($user);
        }
        else{
            return response()->json([
                'errors'=>'USER DOES NOT HAVE THE RIGHT PERMISSIONS.'
            ],401);
        }
    }

    public function exportExcel()
    {
    	return Excel::download(new UsersExport, 'user-list.xlsx');
    }
}
