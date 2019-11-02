<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class SearchController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
    	// $request->validate([
	    //     'weight' => 'required_without_all',
	    //     'length' => 'required_without_all',
	    //     'height' => 'required_without_all',
	    //     'width' => 'required_without_all'
	    // ]);
    	// print_r($request->all()['length']); die;

    	$rules = [
            'weight' => 'required_without:length,height,width|nullable|numeric|between:0,99.99',
	        'length' => 'required_without:weight,height,width|nullable|numeric|between:0,99.99',
	        'height' => 'required_without:weight,length,width|nullable|numeric|between:0,99.99',
	        'width' => 'required_without:weight,height,length|nullable|numeric|between:0,99.99'
        ];

        if (empty($request->all()['weight']) && empty($request->all()['length'])
        	&& empty($request->all()['height']) && empty($request->all()['width'])
        ) {
        	$message = "Please enter a search parameter";
        	return redirect('home')
                        ->withErrors($message)
                        ->withInput();
        }

     //    $validator = Validator::make($request->all(), $rules);

	    // if ($validator->fails()) {
     //        return redirect('home')
     //                    ->withErrors($validator)
     //                    ->withInput();
     //    }

        return view('search');
    }

    /**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
	    return [
	        'title.required' => 'A title is required',
	        'body.required'  => 'A message is required',
	    ];
	}
}
