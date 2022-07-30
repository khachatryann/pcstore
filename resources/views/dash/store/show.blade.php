@extends('layouts.app')
@section('title')
    Buy
@endsection
@section('content')
    <div class="container">
        <div style=" font-size: 22px" class="p-3 mb-2 bg-primary text-white mt-3 w-50"><p style="color: #e8b678">Please connect your card</p>

            <div class="mb-3 mt-3">
                <label for="card_number" class="form-label">Card Number</label>
                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Enter card number 12-19 numbers">
            </div>

            <div class="mb-3">
                <label for="card_owner" class="form-label">Card Owner Name</label>
                <input type="text" class="form-control" id="card_owner" name="card_owner" placeholder="Enter card owner name">
            </div>

            <div class="mb-3 w-50">
                <label for="card_cvv" class="form-label">Card CVV</label>
                <input type="text" class="form-control" id="card_cvv" name="card_cvv" placeholder="Enter card cvv code">
            </div>

            <div class="mb-3 w-50">
                <label for="card_time" class="form-label">Card Valid Until</label>
                <input type="text" class="form-control" id="card_time" name="card_time" placeholder="mm/yyyy">
            </div>

            <button class="btn btn-success">Ready</button>
        </div>
    </div>

@endsection
