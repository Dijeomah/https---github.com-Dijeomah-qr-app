<?php

namespace App\Http\Controllers\Qr;

use App\Http\Controllers\Controller;
use App\Models\QrLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use QrCode;

class QrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qr');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkQr(Request $request)
    {
        $user = $request->user();
        $qr_link = $request->input('qr_link');

        $rules = [
            'qr_link' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // $errors = $validator->errors();
            return redirect()->back()->with('error', 'Link Field is required');
        }
        
        if (isset($user->id)) {
            $generator = QrCode::size(100)->gradient(255, 50, 200, 100, 20, 50, 'diagonal')->generate('https://' . $qr_link);

            $qr_data = new QrLinks([
                'user_id' => $user->id,
                'qr_name' => $request->input('qr_name'),
                'qr_link' => $request->input('qr_link'),
                'qr_code' => $generator,
            ]);

            $qr_data->save();
        }else{
            $generator = QrCode::size(500)->gradient(255, 50, 200, 100, 20, 50, 'diagonal')->generate('https://' . $qr_link);
            // $generator = QrCode::size(500)->gradient(255, 50, 200, 100, 20, 50, 'diagonal')->phoneNumber($qr_link);
        }


        return view('show-qr', ['generator' => $generator]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
