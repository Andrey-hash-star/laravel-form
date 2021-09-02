<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = User::find(auth()->user()->id);
        $applications = $user->applications()->orderBy('id', 'desc')->paginate(6);
        return view('account.list', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'tel' => 'required',
            'company' => 'required',
            'application' => 'required',
            'message' => 'required',
            'file' => 'nullable|file',
        ];
        $messages = [
            'name.required' => 'Введите имя',
            'tel.required' => 'Введите телефон',
            'company.required' => 'Введите компанию',
            'message.required' => 'Введите сообщение',
            'application.required' => 'Введите название заявки',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        Application::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'company' => $request->company,
            'application' => $request->application,
            'message' => $request->message,
            'file' => Application::uploadFile($request),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('home')->with('success', 'Заявка успешно сформирована');
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
