<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->data['menu_title'] = "Category";
    } 

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Category::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('action', function ($row) {
                    $btn = '<a href="' . route('about-us.edit', $row['id']) . '" class="mr-2"><i class="fa fa-edit" style="color: #172774;"></i></a>';

                    $delete_link = route('about-us.destroy', $row['id']);
                    $delete_link = "'" . $delete_link . "'";
                    $btn .= '<a href="javascript:void(0);" onclick="deleteRecord(' . $delete_link . ');" data-popup="tooltip"><i class="fa fa-trash" style="color: #172774;"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        } else {
            $columns = [
                ['data' => 'DT_RowIndex', 'name' => 'id', 'title' => "Id"],
                ['data' => 'title', 'name' => 'title', 'title' => __("Title"), 'searchable' => true],
                ['data' => 'description', 'name' => 'description', 'title' => __("Description"), 'searchable' => true],
                ['data' => 'action', 'name' => 'action', 'title' => "Action", 'searchable' => true, 'orderable' => false]];

            $this->data['dateTableFields'] = $columns;
            $this->data['dateTableUrl'] = route('category.index');
            $this->data['dateTableTitle'] = "AboutUs Management";
            $this->data['dataTableId'] = time();
            $this->data['addUrl'] = route('category.create');
            return view('admin.pages.category.index', $this->data);
        }
        return Category::get();
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
