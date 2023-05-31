<!-- masterlist.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Resident Masterlist</h1>
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
                @isset($list)
                    @foreach($list as $resident)
                        <?php
                            $qrCodeText = $resident->id; // Replace $resident->id with the data you want to encode in the QR code
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
                @endisset
            </tbody>
        </table>
        @include('livewire.modal')
    </div>
@endsection
