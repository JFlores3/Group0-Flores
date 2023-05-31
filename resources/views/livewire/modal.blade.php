<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Resident</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form fields for editing a resident -->
                <div class="form-group">
                    <label for="editFirstName">First Name</label>
                    <input type="text" class="form-control" id="editFirstName" wire:model="editFirstName">
                    @error('editFirstName')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="editMiddleName">Middle Name</label>
                    <input type="text" class="form-control" id="editMiddleName" wire:model="editMiddleName">
                    <!-- Add error handling if required -->
                </div>
                <div class="form-group">
                    <label for="editLastName">Last Name</label>
                    <input type="text" class="form-control" id="editLastName" wire:model="editLastName">
                    <!-- Add error handling if required -->
                </div>
                <div class="form-group">
                    <label for="editSuffix">Suffix</label>
                    <input type="text" class="form-control" id="editSuffix" wire:model="editSuffix">
                    <!-- Add error handling if required -->
                </div>
                <div class="form-group">
                    <label for="editDOB">Date of Birth</label>
                    <input type="date" class="form-control" id="editDOB" wire:model="editDOB">
                    <!-- Add error handling if required -->
                </div>
                <div class="form-group">
                    <label for="editPlaceOfBirth">Place of Birth</label>
                    <input type="text" class="form-control" id="editPlaceOfBirth" wire:model="editPlaceOfBirth">
                    <!-- Add error handling if required -->
                </div>
                <div class="form-group">
                    <label for="editCivilStatus">Civil Status</label>
                    <select class="form-control" id="editCivilStatus" wire:model="editCivilStatus">
                        <option value="">-- Select Status --</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Widow">Widow</option>
                    </select>
                    <!-- Add error handling if required -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" wire:click="updateResident">Save Changes</button>
            </div>
        </div>
    </div>
</div>
