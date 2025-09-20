<?php

namespace App\Repositories;

use App\Models\Member;

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
        return $this->model->findOrFail($id);
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
        return Member::with(['businessDetail', 'employmentDetail', 'politicalExposure', 'emergencyContact'])
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    }
}

