<?php

namespace App\Services;

use App\Repositories\MemberRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\BusinessDetail;
use App\Models\EmploymentDetail;
use App\Models\PoliticalExposure;
use App\Models\EmergencyContact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class MemberService
{
    protected $repository;

    public function __construct(MemberRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function getAllPaginated($perPage = 20) // Default to 20
    {
        return $this->repository->paginate($perPage);
    }

    public function store(array $data)
    {
        // Step 1: validate all member data
        $validator = Validator::make($data, [
            'id_no'                => 'required|string|unique:members,id_no',
            'first_name'           => 'required|string|max:100',
            'middle_name'          => 'nullable|string|max:100',
            'last_name'            => 'required|string|max:100',
            'alt_name'             => 'nullable|string|max:100',
            'email'                => 'required|email|unique:members,email',
            'mobile_no'            => 'required|string|max:20',
            'birthdate'            => 'required|date',
            'birthplace'           => 'nullable|string|max:255',
            'civil_status'         => 'required|string|max:50',
            'nationality'          => 'required|string|max:50',
            'valid_id_type'        => 'required|string|max:100',
            'present_address'      => 'nullable|string|max:255',
            'permanent_address'    => 'nullable|string|max:255',
            'business_name'        => 'nullable|string|max:255',
            'business_nature'      => 'nullable|string|max:255',
            'id_presented'         => 'nullable|string|max:255',
            'employer_name'        => 'nullable|string|max:255',
            'nature_of_work'       => 'nullable|string|max:255',
            'is_exposed'           => 'nullable|boolean',
            'relationship'         => 'nullable|string|max:255',
            'emergency_name'       => 'required|string|max:255',
            'emergency_relationship' => 'required|string|max:255',
            'emergency_contact_number' => 'required|string|max:50',
            'source_of_fund_self'     => 'nullable',
            'source_of_fund_employed' => 'nullable',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return DB::transaction(function () use ($validator, $data) {
            // Encrypt id_no before storing
            $validated = $validator->validated();
            $validated['id_no'] = Crypt::encryptString($validated['id_no']);

            $member = $this->repository->create($validated + [
                'source_of_fund_self' => isset($data['source_of_fund_self']),
                'source_of_fund_employed' => isset($data['source_of_fund_employed']),
            ]);

            // Related details
            if (!empty($validated['business_name'])) {
                $member->businessDetail()->create([
                    'business_name'   => $validated['business_name'],
                    'business_nature' => $validated['business_nature'] ?? null,
                    'id_presented'    => $validated['id_presented'] ?? null,
                ]);
            }

            if (!empty($validated['employer_name'])) {
                $member->employmentDetail()->create([
                    'employer_name' => $validated['employer_name'],
                    'nature_of_work' => $validated['nature_of_work'] ?? null,
                ]);
            }

            $member->politicalExposure()->create([
                'is_exposed' => !empty($validated['is_exposed']),
                'relationship' => $validated['relationship'] ?? null,
            ]);

            $member->emergencyContact()->create([
                'name' => $validated['emergency_name'] ?? null,
                'relationship' => $validated['emergency_relationship'] ?? null,
                'contact_number' => $validated['emergency_contact_number'] ?? null,
            ]);

            return $member;
        });
    }

    public function update($id, array $data)
    {
        $validator = Validator::make($data, [
            'first_name'      => 'sometimes|string|max:100',
            'last_name'       => 'sometimes|string|max:100',
            'email'           => "sometimes|email|unique:members,email,$id",
            'mobile_no'       => 'sometimes|string|max:20',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return DB::transaction(function () use ($id, $validator, $data) {
            $member = $this->repository->update($id, $validator->validated() + [
                'middle_name' => $data['middle_name'] ?? null,
                'alt_name' => $data['alt_name'] ?? null,
                'present_address' => $data['present_address'] ?? null,
                'permanent_address' => $data['permanent_address'] ?? null,
                'birthplace' => $data['birthplace'] ?? null,
                'source_of_fund_self' => isset($data['source_of_fund_self']),
                'source_of_fund_employed' => isset($data['source_of_fund_employed']),
            ]);

            // update or create related details
            $member->businessDetail()->updateOrCreate([], [
                'business_name'   => $data['business_name'] ?? null,
                'business_nature' => $data['business_nature'] ?? null,
                'id_presented'    => $data['id_presented'] ?? null,
            ]);

            $member->employmentDetail()->updateOrCreate([], [
                'employer_name'  => $data['employer_name'] ?? null,
                'nature_of_work' => $data['nature_of_work'] ?? null,
            ]);

            $member->politicalExposure()->updateOrCreate([], [
                'is_exposed' => isset($data['is_exposed']),
                'relationship' => $data['relationship'] ?? null,
            ]);

            $member->emergencyContact()->updateOrCreate([], [
                'name' => $data['emergency_name'] ?? null,
                'relationship' => $data['emergency_relationship'] ?? null,
                'contact_number' => $data['emergency_contact_number'] ?? null,
            ]);

            return $member;
        });
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
