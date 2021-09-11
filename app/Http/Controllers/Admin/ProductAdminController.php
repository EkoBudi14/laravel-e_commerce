<?php

namespace App\Http\Controllers\Admin;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\productRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;


// use function GuzzleHttp\Promise\all;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Product::with(['user', 'category']);

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class ="btn-group">
                        <div class = "dropdown">
                            <button class = "btn btn-primary dropdown-toggle mr-1 mb-1" 
                            type="button"
                            data-toggle = "dropdown">
                            Aksi
                            </button>
                            <div class ="dropdown-menu">
                                <a class = "dropdown-item" href="' . route('product.edit', $item->id) . '">
                                    Sunting
                                </a>
                                <form action="' . route('product.destroy', $item->id) . '" method= "POST">
                                    ' . method_field('delete') . csrf_field() . '
                                    <button type = "submit" class="dropdown-item text-danger">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
                })
                ->rawColumns(['action', 'photo'])
                ->make();
        }
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();


        return view('pages.admin.product.create', [
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        product::create($data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = product::findOrFail($id);
        $users = User::all();
        $categories = Category::all();


        return view('pages.admin.product.edit', [
            'item' => $item,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productRequest $request, $id)
    {
        $data = $request->all();

        $item = product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index');
    }
}