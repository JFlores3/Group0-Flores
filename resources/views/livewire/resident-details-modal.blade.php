<!-- resident-details-modal.blade.php -->

<div class="modal fade" id="residentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="residentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="residentDetailsModalLabel">Resident Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display resident details -->
                <p>First Name: {{ $selectedResident->FirstName }}</p>
                <p>Middle Name: {{ $selectedResident->MiddleName }}</p>
                <p>Last Name: {{ $selectedResident->LastName }}</p>
                <p>Suffix: {{ $selectedResident->Suffix }}</p>
                <p>Date of Birth: {{ $selectedResident->DOB }}</p>
                <p>Place of Birth: {{ $selectedResident->PlaceofBirth }}</p>
                <p>Civil Status: {{ $selectedResident->CivilStatus }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" wire:click="delete('{{ $resident->id }}')">Delete</button>
                <button type="button" class="btn btn-primary" wire:click="update('{{ $resident->id }}')">Edit</button>
            </div>
        </div>
    </div>
</div>
