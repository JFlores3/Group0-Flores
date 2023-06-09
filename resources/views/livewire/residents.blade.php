<div>
    <div class="card-body">
        <h5>Add New Residents</h5>
        <form wire:submit.prevent="saveResident">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">First Name</div>
                        <input type="" wire:model="FirstName" class="form-control">
                        @error('FirstName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="form-label">Middle Name</div>
                        <input type="" wire:model="MiddleName" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Last Name</div>
                        <input type="" wire:model="LastName" class="form-control">
                        @error('LastName')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="form-label">Suffix</div>
                        <input type="" wire:model="Suffix" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Date of Birth</div>
                        <input type="date" wire:model="DOB" class="form-control">
                        @error('DOB')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Civil Status</div>
                        <select wire:model="CivilStatus" class="form-control">
                            <option value="">--Select Status--</option> 
                            <option value="Single">Single</option> 
                            <option value="Married">Married</option> 
                            <option value="Separated">Separated</option> 
                            <option value="Widow">Widow</option> 
                        </select>
                        @error('CivilStatus')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-label">Place of Birth</div>
                        <input type="" wire:model="PlaceofBirth" class="form-control">
                        @error('PlaceofBirth')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    @isset($forUpdate)
                        @if($forUpdate && $selectedResident)
                            <button class="btn btn-primary" wire:click="updateResident">Update</button>
                        @else
                            <button class="btn btn-primary" wire:click="saveResident">Save</button>
                        @endif
                    @endisset
                </div>
            </div>
        </form>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Suffix</th>
                <th>Date of Birth</th>
                <th>Place of Birth</th>
                <th>Civil Status</th>
                <th>QR Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($residents))
                @foreach($residents as $resident)
                    <?php
                        $qrCodeText = $resident->id;
                        $qrCodeImage = QrCode::size(200)->generate($qrCodeText);
                    ?>
                    <tr>
                        <td>{{ $resident->FirstName }}</td>
                        <td>{{ $resident->MiddleName }}</td>
                        <td>{{ $resident->LastName }}</td>
                        <td>{{ $resident->Suffix }}</td>
                        <td>{{ $resident->DOB }}</td>
                        <td>{{ $resident->PlaceofBirth }}</td>
                        <td>{{ $resident->CivilStatus }}</td>
                        <td><img src="data:image/png;base64,{{ base64_encode($qrCodeImage) }}"></td>
                        <td>
                            <button class="btn btn-info btn-sm" wire:click="update('{{ $resident->id }}')">Edit</button>
                            <button class="btn btn-danger btn-sm" wire:click="delete('{{ $resident->id }}')">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $residents->links() }}
    </div>
</div>
