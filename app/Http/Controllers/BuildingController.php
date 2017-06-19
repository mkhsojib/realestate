<?php

namespace App\Http\Controllers;

use App\User;
use App\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BuildingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Facades\Datatables;

class BuildingController extends Controller
{
    public function index()
    {
        return view('admin/building/index');
    }

    public function create()
    {
        return view('admin/building/add');
    }

    public function store(BuildingRequest $request)
    {
        if($request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            $request
                ->file('image')
                ->move(base_path() . '/public/building_images/', $file_name);
            $image = $file_name;
        }

        else{
            $image = '';
        }

        Building::create([
            'building_name'  => $request->building_name,
            'building_price'  => $request->building_price,
            'building_rent'  => $request->building_rent,
            'building_area'  => $request->building_area,
            'building_type'  => $request->building_type,
            'building_small_description' => $request->building_small_description,
            'building_meta'  => $request->building_meta,
            'building_large_description' => $request->building_large_description,
            'user_id' => Auth::user()->id,
            'rooms'  => $request->rooms,
            'status' => $request->status,
            'image' => $image,
            'month' => date('m'),
            'year' => date('Y'),
        ]);

        return redirect('/adminpanel/building')->withFlashMessage('تم إضافة بيانات العقار بنجاح');
    }

    public function edit($id)
    {
        $building = Building::find($id);
        $user = User::where('id', $building->user_id)->first();
        return view('admin/building/edit', compact('building', 'user'));
    }

    public function update($id, BuildingRequest $request)
    {
        $building = Building::find($id);

        $building->fill(array_except($request->all(), ['image']))
                 ->save();

        if($request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();

            $request
                ->file('image')
                ->move(base_path() . '/public/building_images/', $file_name);
            $building->fill(['image' => $file_name])->save();
        }

        return Redirect::back()->withFlashMessage('تم تعديل بيانات العقار بنجاح');
    }

    public function destroy($id)
    {
        Building::find($id)
            ->delete();

        return redirect('adminpanel/building')->withFlashMessage('تم حذف العقار بنجاح');
    }

    public function anyData()
    {
        return Datatables::of(Building::all())
            ->editColumn('building_name', function($model){
                return
                    '<a href="' . url('adminpanel/building/' . $model->id . '/edit') . '">'
                        . $model->building_name .
                    '</a>';
            })

            ->editColumn('building_type', function($model){
                $type = building_type();
                return '<span class="badge badge-info">' . $type[$model->building_type] . '</span>';
            })

            ->editColumn('status', function($model){
                return $model->status === 0
                    ? '<span class="badge badge-warning">غير مفعل</span>'
                    : '<span class="badge badge-success">مفعل</span>';
            })

            ->editColumn('control', function($model){
                return
                    '<a href="'.url('adminpanel/building/' . $model->id . '/edit').'" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>' . ' ' .
                    '<a href="'.url('adminpanel/building/' . $model->id . '/delete').'" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                    </a>';
            })

            ->escapeColumns([])

            ->make(TRUE);
    }

    public function showAllEnabled()
    {
        $allBuildings = Building::where('status', 1)
                                ->orderBy('id', 'desc')
                                ->paginate(9);

        return view('front-end/building/all', compact('allBuildings'));
    }

    public function forRent()
    {
        $allBuildings = Building::where('status', 1)
                                ->where('building_rent', 1)
                                ->orderBy('id', 'desc')
                                ->paginate(9);

        return view('front-end/building/all', compact('allBuildings'));
    }

    public function forBuy()
    {
        $allBuildings = Building::where('status', 1)
                                ->where('building_rent', 0)
                                ->orderBy('id', 'desc')
                                ->paginate(9);

        return view('front-end/building/all', compact('allBuildings'));
    }

    public function Type($type)
    {
        if (in_array($type, ['0', '1', '2'])){
            $allBuildings = Building::where('status', 1)
                                    ->where('building_type', $type)
                                    ->orderBy('id', 'desc')
                                    ->paginate(9);

            return view('front-end/building/all', compact('allBuildings'));
        }else{
            return view('404');
        }
    }

    public function Search(Request $request)
    {
        $requestAll = array_except($request->toArray(), ['submit', '_token', 'page']);
        $query = DB::table('buildings')
                   ->select('*');
        $array = [];
        $count = $requestAll;
        $i = 0;

        foreach ($requestAll as $key => $req) {
            $i++;

            if($req != ''){
                if($key == 'building_price_from' && $request->building_price_to == ''){
                    $query->where ('building_price', '>=', $req);
                }

                elseif($key == 'building_price_to' && $request->building_price_from == ''){
                    $query->where ('building_price', '<=', $req);
                }

                else{
                    if($key != 'building_price_to' && $key != 'building_price_from'){
                        $query->where($key, $req);
                    }
                }
                $array[$key] = $req;
            }elseif ($count == $i && $request->building_price_to && $request->building_price_from){
                $query->whereBetween('building_price', [$request->building_price_from, $request->building_price_to]);
            }
        }

        $allBuildings = $query->paginate(9);

        return view('front-end/building/all', compact('allBuildings', 'array'));
    }

    public function SingleBuilding($id)
    {
        $building_info = Building::findOrFail($id);

        if($building_info->status == 0){
            $message_title = 'لم يتم الموافقة علي هذا العقار بعد';
            $message_body  = '"' . $building_info->name .'"' . 'يجب انتظار الإدارة حتي توافق علي العقار ';

            return view(
                'front-end/building/inactive',
                compact('building_info', 'message_title', 'message_body')
            );
        }

        $same_rent = Building::where('building_rent', $building_info->building_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type = Building::where('building_type', $building_info->building_type)->orderBy(DB::raw('RAND()'))->take(3)->get();

        return view('front-end/building/single', compact('building_info', 'same_rent', 'same_type'));
    }

    public function GetAjaxInformation(Request $request)
    {
        return Building::find($request->id)->toJson();
    }

    public function UserAddBuilding()
    {
        return view('user-building/add');
    }

    public function UserStore(BuildingRequest $request)
    {
        if($request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            $request
                ->file('image')
                ->move(base_path() . '/public/building_images/', $file_name);
            $image = $file_name;
        }

        else{
            $image = '';
        }

        $user = Auth::user() ? Auth::user()->id : 0;

        Building::create([
            'building_name'  => $request->building_name,
            'building_price' => $request->building_price,
            'building_rent'  => $request->building_rent,
            'building_area'  => $request->building_area,
            'building_type'  => $request->building_type,
            'building_large_description' => strip_tags(str_limit($request->building_large_description, 160)),
            'building_meta'  => $request->building_meta,
            'user_id' => $user,
            'rooms'  => $request->rooms,
            'image' => $image,
            'month' => date('m'),
            'year' => date('Y'),
        ]);

        return view('user-building/done');
    }

    public function ShowUserBuilding()
    {
        $user = Auth::user();
        $building = Building::where('user_id', $user->id)->where('status', 1)->paginate(9);
        return view('user-building/my-building', compact('building', 'user'));
    }

    public function InactiveBuilding()
    {
        $user = Auth::user();
        $building = Building::where('user_id', $user->id)->where('status', 0)->paginate(9);
        return view('user-building/my-building', compact('building', 'user'));
    }

    public function UserEditBuilding($id)
    {
        $user = Auth::user();
        $building_info = Building::find($id);

        if($user->id != $building_info->user_id){
            $message_title = 'هذا العقار لم يتم إضافته';
            $message_body = 'يجب انتظار الإدارة حتي توافق علي العقار ' .  '"' . $building_info->building_name . '"';

            return view(
                'front-end/building/inactive',
                compact('building_info', 'message_title', 'message_body')
            );
        }

        $building = $building_info;

        return view('user-building/edit', compact('building', 'user'));
    }

    public function UserUpdateBuilding(Request $request)
    {
        $building = Building::find($request->building_id);

        $building->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('تم تعديل العقار بنجاح');
    }

    public function ActivateBuilding($id, $status)
    {
        Building::find($id)
                ->fill(['status' => $status])
                ->save();

        return Redirect::back()->withFlashMessage('تم تغير حالة العقار');
    }
}