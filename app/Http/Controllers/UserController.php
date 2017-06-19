<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\AddUserRequestAdmin;

class UserController extends Controller
{
    public function index()
    {
        return view('admin/users/index');
    }

    public function create()
    {
        return view('admin/users/add');
    }

    public function store(AddUserRequestAdmin $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/adminpanel/users')->withFlashMessage('تم إضافة العضو بنجاح');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $building_inactive = Building::where('user_id', $id)->where('status', 0)->paginate(10);
        $building_active   = Building::where('user_id', $id)->where('status', 1)->paginate(10);

        return view('admin/users/edit', compact('user', 'building_inactive', 'building_active'));
    }

    public function update($id, Request $request)
    {
        User::find($id)
            ->fill($request->all())
            ->save();

        return Redirect::back()->withFlashMessage('تم تحديث بيانات العضو بنجاح');
    }

    public function updatePassword(Request $request)
    {
        $userUpdated = User::find($request->user_id);
        $password = bcrypt($request->password);

        $userUpdated
            ->fill(['password' => $password])
            ->save();

        return Redirect::back()->withFlashMessage('تم تحديث كلمة المرور العضو بنجاح');
    }

    public function destroy($id)
    {
        User::find($id)
            ->delete();

        Building::where('user_id', $id)->delete();

        return redirect('adminpanel/users')->withFlashMessage('تم حذف العضو بنجاح');
    }

    public function anyData()
    {
        return Datatables::of(User::all())
            ->editColumn('name', function($model){
                return '<a href="' . url('adminpanel/users/' . $model->id . '/edit') . '">'
                            . $model->name .
                        '</a>';
            })

            ->editColumn('admin', function($model){
                return $model->admin !== 1
                    ? '<span class="badge badge-info">عضو</span>'
                    : '<span class="badge badge-warning">مدير</span>';
            })

            ->editColumn('my_building', function($model){
                return '<a href="' . url('adminpanel/building/' . $model->id . '/edit') . '">' .
                            '<span class="btn btn-danger"><i class="fa fa-link"></i></span>'
                    .  '</a>';
            })

            ->editColumn('control', function($model){
                return
                    '<a href="'.url('adminpanel/users/' . $model->id . '/edit').'" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>' . ' ' .
                    '<a href="'.url('adminpanel/users/' . $model->id . '/delete').'" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                    </a>';
            })

            ->escapeColumns([])

            ->make(TRUE);
    }

    public function EditUser()
    {
        $user = Auth::user();
        return view('profile/edit', compact('user'));
    }

    public function UpdateUser(UpdateUserRequest $request, User $users)
    {
        $user = Auth::user();

        if ($request->email != $user->email) {
            $check_email = $users->where('email', $request->email)->count();

            if($check_email == 0){
                $user->fill($request->all())->save();
            }else {
                return Redirect::back()->withFlashMessage('هذا البريد تم استعماله');
            }
        }
        else{
            $user->fill(['name' => $request->name])->save();
        }

        return Redirect::back()->withFlashMessage('تم تعديل المعلومات بنجاح');
    }

    public function ChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            $new_password = Hash::make($request->new_password);
            $user->fill(['password' => $new_password])->save();
            return Redirect::back()->withFlashMessage('تم تغير كلمة المرور بنجاح');
        }

        else{
            return Redirect::back()->withFlashMessage('كلمة المرور الجديدة غير مطابقة لكلمة المرور التي لدينا');
        }
    }
}