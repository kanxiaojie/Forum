<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhoneController extends Controller
{
    protected $phone;

    /**
     * PhoneController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->phone = new Phone();
    }

    public function index()
    {
        $phones = $this->phone->all();

        return view('phones.index', compact('phones'));
    }

    public function create()
    {
        return view('phones.create');
    }

    public function store(Request $request)
    {
        Phone::create($request->all());

        return redirect('/phones');
    }

    public function edit($id)
    {
        $phone = $this->phone->findOrFail($id);

        return view('phones.edit', compact('phone'));
    }

    public function update(Request $request, $id)
    {
        $phone = $this->phone->findOrFail($id);
        $phone->update($request->all());

        return redirect('/phones');
    }

    public function destroy($id)
    {
        $phone = $this->phone->findOrFail($id);
        $phone->delete();

        return back();
    }
}
