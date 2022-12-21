<?php

namespace App\Http\Controllers\Page\Setting;

use App\Http\Controllers\Controller;
use App\DataTables\Setting\AccountDataTable;
use App\Services\Page\Setting\AccountService;
use App\Http\Requests\Page\Setting\AccountRequest;

class AccountController extends Controller
{
    /**
     * Locate blade file
     *
     * @return string
     */
    private static $path = 'pages.setting.account';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AccountService $service, AccountDataTable $dataTable)
    {
        if ($service->index(static::$path)) {
            return $dataTable->render(static::$path);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request, AccountService $service)
    {
        if ($request->validated()) {
            $service->store($request->validated());
                
            return redirect(route('account.index'));
        } else {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountService $service, $id)
    {
        return view(static::$path, $service->edit(static::$path, $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request, AccountService $service, $id)
    {
        if ($request->validated()) {
            $service->update($request->validated(), $id);
                
            return redirect(route('account.index'));
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountService $service, $id)
    {
        $service->destroy($id);

        return redirect(route('account.index'));
    }
}