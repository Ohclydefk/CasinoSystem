<?php

namespace App\Repositories;

use App\Models\Member;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Stmt\TryCatch;
use App\Traits\IdDecryptor;


class MemberRepository
{
    protected $model;
    use IdDecryptor;

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
        return $this->decryptIdNo($member);
    }

    public function findActive($id)
    {
        $member = $this->model
            ->where('status', 'active')
            ->findOrFail($id);

        return $this->decryptIdNo($member);
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

    public function paginate($perPage = 20, $type = "all")
    {

        $data_to_be_shown = ['archived', 'filtered', 'onhold', 'disabled', 'all'];

        if (!in_array($type, $data_to_be_shown)) {
            $type = "all";
        }

        $query = Member::with(['businessDetail', 'employmentDetail', 'politicalExposure', 'emergencyContact'])
            ->orderBy('id', 'desc');

        switch ($type) {
            case "archived":
                $query->where('status', 'archived');
                break;

            case "disabled":
                $query->where('status', 'disabled');
                break;

            case "onhold":
                $query->where('status', 'hold');
                break;

            case "filtered":
                $query->where('status', 'active');
                break;

            case "show_all":
            case "all":
            default:
                // exclude archived and disabled by default
                $query->whereNotIn('status', ['archived', 'disabled', 'hold']);
                break;
        }

        $members = $query->paginate($perPage);

        // Decrypt id_no for each member
        $this->decryptIdNoCollection($members);
        
        return $members;
    }
}
