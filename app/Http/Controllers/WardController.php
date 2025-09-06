<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class WardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ward::select('*');
            return DataTables::of($data)
                ->addColumn('action', function ($list) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $list->id . '" title="Edit" class="edit btn btn-primary btn-sm editData"><i class="ri-edit-box-line"></i></a>';
                    $btn = auth()->user()->can('000261') ? $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" style="margin:2px" data-id="' . $list->id . '" class="btn btn-danger btn-sm deleteData"><i class="fas fa-trash-alt"></i></a>' : '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('wards.wards');
    }

    public function store(Request $request)
    {
        Ward::create($request->only('number','status'));
        return response()->json(['message' => 'Ward created successfully']);
    }

    public function edit($id){
        $data = Ward::findOrFail($id);
        $status = "<option value=''>Select One</option>";
        if($data->status == 1){
            $status .= "<option value='1' selected>Active</option><option value='2'>InActive</option>";
        }
        else{
            $status .= "<option value='1'>Active</option><option value='2' selected>InActive</option>";
        }
        return response()->json(['data' => $data, 'status' => $status]);
    }

    public function update(Request $request, $id)
    {
        $ward = Ward::findOrFail($id);
        $ward->update($request->only('number','status'));
        return response()->json(['message' => 'Ward updated successfully']);
    }

    public function destroy($id)
    {
        Ward::findOrFail($id)->delete();
        return response()->json(['message' => 'Ward deleted successfully']);
    }
}
