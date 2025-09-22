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
        $members = $this->service->paginated(10, $type = "all"); // Customize pagination here

        return view('members.index', compact('members'));
    }

    public function dashboard()
    {
        return view('members.dashboard');
    }

    public function manage()
    {
        $members = $this->service->paginated(10, $type = "all"); // Customize pagination here

        return view('members.manage', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function archives()
    {
        $members = $this->service->paginated(10, $type = "archived"); // Customize pagination here
        return view('members.archived-members', compact('members'));
    }

    public function archiveMember($id)
    {
        $this->service->archiveMember($id);
        return redirect()->route('members.index')->with('success', 'Member archived successfully.');
    }

    public function unarchive($id)
    {
        $this->service->unarchive($id);

        return redirect()->route('members.index')->with('success', 'Member unarchived successfully.');
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
