<?php

namespace App\Repositories;

use App\Models\Member;
use Illuminate\Support\Facades\Crypt;

class MemberRepository
{
    protected $model;

    public function __construct(Member $member)
    {
        $this->model = $member;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $member = $this->model->findOrFail($id);
        try {
            $member->id_no = Crypt::decryptString($member->id_no);
        } catch (\Exception $e) {
            $member->id_no = null;
        }

        // $formattedBirthday = $member->birthdate = date('F j, Y', strtotime($member->birthdate)); // Format date e.g. September 20, 2025
        // dd($formatted);
        
        return $member;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $member = $this->find($id);
        $member->update($data);
        return $member;
    }

    public function delete($id)
    {
        $member = $this->find($id);
        return $member->delete();
    }

    public function paginate($perPage = 20) // Default to 20
    {
        $members = Member::with(['businessDetail', 'employmentDetail', 'politicalExposure', 'emergencyContact'])
            ->orderBy('id', 'desc')
            ->paginate($perPage);

        // Decrypt id_no for each member
        $members->getCollection()->transform(function ($member) {
            try {
                $member->id_no = Crypt::decryptString($member->id_no);
            } catch (\Exception $e) {
                $member->id_no = null;
            }
            return $member;
        });

        return $members;
    }
}
