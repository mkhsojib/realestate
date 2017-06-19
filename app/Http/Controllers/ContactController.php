<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Facades\Datatables;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin/contact/index');
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->all());
        return Redirect::back()->withFlashMessage('تم ارسال رسالتك بنجاح');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        $contact->fill(['contact_view' => 1])->save();
        return view('admin/contact/edit', compact('contact'));
    }

    public function update($id, Request $request)
    {
        Contact::find($id)
            ->fill($request->all())
            ->save();

        return Redirect::back()->withFlashMessage('تم تحديث الرسالة بنجاح');
    }

    public function destroy($id)
    {
        Contact::find($id)
            ->delete();

        return redirect('adminpanel/contact')->withFlashMessage('تم حذف الرسالة بنجاح');
    }


    public function anyData()
    {
        return Datatables::of(Contact::all())
            ->editColumn('contact_name', function($model){
                return '<a href="' . url('adminpanel/contact/' . $model->id . '/edit') . '">' . $model->contact_name .'</a>';
            })

            ->editColumn('contact_type', function($model){
                return '<span class="badge badge-warning">'
                            . contacts()[$model->contact_type] .
                       '</span>';
            })

            ->editColumn('contact_view', function($model){
                return $model->contact_view == 0
                    ? '<span class="badge badge-info">رسالة جديدة</span>'
                    : '<span class="badge badge-warning">رسالة قديمة</span>';
            })

            ->editColumn('control', function($model){
                return
                    '<a href="'.url('adminpanel/contact/' . $model->id . '/edit').'" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>' . ' ' .
                    '<a href="'.url('adminpanel/contact/' . $model->id . '/delete').'" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                    </a>';
            })

            ->escapeColumns([])

            ->make(TRUE);
    }
}
