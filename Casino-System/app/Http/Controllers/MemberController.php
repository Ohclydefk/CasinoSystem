<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MemberService;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    protected $service;

    public function __construct(MemberService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $members = $this->service->getAllPaginated(10); // Customize pagination here

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        try {
            $this->service->store($request->all());
            return redirect()->route('members.index')->with('success', 'New Member added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    public function edit($id)
    {
        $member = $this->service->getById($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->service->update($id, $request->all());
            return redirect()->route('members.index')->with('success', 'Member information updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
