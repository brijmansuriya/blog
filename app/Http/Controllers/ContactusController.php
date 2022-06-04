<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Traits\ImageUpload;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ContactusController extends Controller
{
    use ImageUpload;
    public function __construct()
    {
        $this->data['menu_title'] = "Contact Us";
    } 

    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Contactus::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('contact-us.show', $row['id']) . '" class="mr-2"><i class="fa fa-eye" style="color: #172774;"></i></a>';
                    
                    $delete_link = route('contact-us.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            $columns = [
            ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
            ['data' => 'email', 'name' => 'email', 'title' => __("Email"), 'searchable' => true,'width' => '80%'],
            ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];
            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('contact-us.index');
            $this->data['dateTableTitle'] = "Contact Us Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('contact-us.index');
            return view('admin.pages.contactus.index', $this->data);
        }
        return Contactus::get();
    }

    public function destroy($id)
    {
     
        $delete = Contactus::find($id)->delete();
        Session::flash('success', 'Deleted successfully');
        return $delete;
    }
    public function show($id)
    {
        $this->data['show'] = Contactus::find($id)->get();
        return view('admin.pages.contactus.show', $this->data);
    }
   
}
