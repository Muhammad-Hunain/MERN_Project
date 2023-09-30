<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;
class CategoryController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Category::get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        
                        $btn = '';

                        $btn .= '<span class="action-icons">';
                        
                            $btn .= '<a href="'. route('project.edit',$row->id) .'" class="btn btn-sm btn-primary btn-circle" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>';

                            $btn .= '<a href="javascript:void(0)" class="btn  btn-sm btn-danger btn-circle delete_row_" data-url="'. route('project.destroy',$row->id) .'" 
                            data-msg="Are you sure you want to delete this category?" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>';
                        
                        
                        $btn .='</span>';
      

                        return $btn;

                    })

                    ->rawColumns(['action'])
                    ->make(true);

        }

        $pageHead = 'Projects';
        $pageTitle = 'Projects';
        $activeMenu = 'categories';
        return view('project.index', compact('activeMenu','pageHead','pageTitle',));


    }

    public function create()
    {

        $pageHead = 'Create project';
        $pageTitle = 'Create project';
        $activeMenu = 'create_category';

        return view('project.create', compact('activeMenu','pageHead','pageTitle'));

    }

    public function store(CategoryRequest $request)
    {

        $category = [

            'name' => $request->name,
        ];

        Category::create($category);

        return redirect()->route('project.index')->with('success', 'Category created successfully.');
    }

    
    public function edit(Category $category)
    {

        $pageHead = 'Edit Category';
        $pageTitle = 'Edit Category';
        $activeMenu = 'categories';

        return view('project.edit', compact('activeMenu','pageHead','pageTitle','category'));

    }

    public function update(CategoryRequest $request, Category $category)
    {
        
        $category_update_arr = [

            'name' => $request->name,
          
        ];

        $category->update($category_update_arr);

        return redirect()->route('project.index')->with('success', 'Category updated successfully.');
    }

    public function show(CategoryRequest $category)
    {

        abort(404);

    }

    public function destroy(Category $category)
    {

        $category->update([

            'is_delete' => 1,
          
        ]);

        return redirect()->route('project.index')->with('success', 'Category deleted successfully.');
        
    }


}

