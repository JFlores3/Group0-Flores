<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Resident;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Residents extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $CivilStatus, $FirstName, $MiddleName, $LastName, $Suffix, $DOB, $PlaceofBirth, $sessionID;
    public $searchTerm;
    public $selectedResident = null;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $residents = $this->getResidentList()->paginate(10);
        $selectedResident = $this->selectedResident ?? new Resident();
    
        return view('livewire.residents', compact('residents', 'selectedResident'));
    }
    
    public function getResidentList()
    {
        $query = Resident::query();
    
        if ($this->searchTerm) {
            $query->where(function ($q) {
                $q->where('FirstName', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('LastName', 'LIKE', '%' . $this->searchTerm . '%');
            });
        }
    
        return $query->orderBy('id', 'DESC');
    }
    

    public function delete($id)
    {
        $delete = Resident::where('id', $id)->delete();
        if ($delete) {
            $this->alert('success', 'Successfully deleted!');
        }
    }

    public function update($id)
    {
        $info = Resident::where('id', $id)->first();

        if (isset($info)) {
            $this->forUpdate = true; // Set $forUpdate to true
            $this->sessionID = $id;
            $this->FirstName = $info->FirstName;
            $this->MiddleName = $info->MiddleName;
            $this->LastName = $info->LastName;
            $this->Suffix = $info->Suffix;
            $this->DOB = $info->DOB;
            $this->CivilStatus = $info->CivilStatus;
            $this->PlaceofBirth = $info->PlaceofBirth;
        }
    }

    public function saveResident()
    {
        $validate = $this->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'DOB' => 'required',
            'PlaceofBirth' => 'required',
            'CivilStatus' => 'required',
        ],[
            'FirstName.required' => 'First Name is required',
            'LastName.required'  => 'Last Name is required',
            'DOB.required'       => 'Date of Birth is required',
            'PlaceofBirth.required' => 'Place of Birth is required',
            'CivilStatus.required' => 'Civil Status is required',
        ]);

        if ($validate) {
            if ($this->forUpdate) {
                $data = [
                    'FirstName' => $this->FirstName,
                    'MiddleName' => $this->MiddleName,
                    'LastName' => $this->LastName,
                    'Suffix' => $this->Suffix,
                    'DOB' => $this->DOB,
                    'PlaceofBirth' => $this->PlaceofBirth,
                    'CivilStatus' => $this->CivilStatus,
                ];

                $update = Resident::where('id', $this->sessionID)
                    ->update($data);

                if ($update) {
                    $this->alert('success', $this->FirstName . ' ' . $this->LastName . ' has been updated', ['toast' => false, 'position' => 'center']);
                }
            } else {
                $resident = new Resident();
                $resident->residentNo = strtoupper(uniqid());
                $resident->FirstName = $this->FirstName;
                $resident->MiddleName = $this->MiddleName;
                $resident->LastName = $this->LastName;
                $resident->Suffix = $this->Suffix;
                $resident->DOB = $this->DOB;
                $resident->PlaceofBirth = $this->PlaceofBirth;
                $resident->CivilStatus = $this->CivilStatus;
                $resident->save();

                $this->alert('success', $this->FirstName . ' ' . $this->LastName . ' has been saved', ['toast' => false, 'position' => 'center']);
            }

            $this->resetFields();
        }
    }

    public function resetFields()
    {
        $this->sessionID = null;
        $this->FirstName = null;
        $this->MiddleName = null;
        $this->LastName = null;
        $this->Suffix = null;
        $this->DOB = null;
        $this->PlaceofBirth = null;
        $this->CivilStatus = null;
    }

   
}