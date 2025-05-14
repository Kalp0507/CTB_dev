<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Carmodels;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class ModelCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cars = Carmodels::get();
         dd($cars);
       // return view('car.create', compact('brands'));

        //  $model = Carmodels::latest()->paginate(5);
        //  dd($model);
    
        // return view('car.index',compact('model'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        // //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get();
       return view('car.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'model_name' => 'required',
            'model_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'make_id'       => 'required',
        ]);
        $model = new Carmodels($request->input()) ;
     
        if($file = $request->hasFile('model_image')) {
            $file = $request->file('model_image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/models/' ;
            $file->move($destinationPath,$fileName);
            $model->model_image = $fileName ;
        }
        $model->save() ;
         return redirect()->route('car.index')
                        ->with('success','You have successfully uploaded your files');
    }


    public function show(Request $request, Carmodels $models)
    {

        return view('car.show',compact('models'));
    } 

    public function edit(Carmodels $model)
    {
        //
        // dd($model);
        return view('car.edit',compact('model'));
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carmodels $model)
    {
        //
         $request->validate([
            'model_name' => 'required',
            'model_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'make_id'       => 'required',
        ]);
    
        $model->update($request->all());
    
        return redirect()->route('car.index')
                        ->with('success','model updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carmodels $model)
    {
        $model->delete();
    
        return redirect()->route('car.index')
                        ->with('success','Product deleted successfully');
    }
}
