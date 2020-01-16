@extends('layouts._LayoutPanel')
@section('title','Lista dni diety')
@section('styles')
<link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

@endsection


@section('main')

<div class="row">
    @foreach ($diets as $diet)
    <div class="col-md-4 col-sm-6">
        <div class="card">
            <div class="header">
                <h2>
                    Data: {{$diet->day}}
                </h2>
            </div>
            <div class="body">
                <br>
            <button class="btn btn-outline-info btn-sm" onclick="window.location.href+{{$diet->id}}'">Szczegóły</button>

            </div>
        </div>
    </div>
    @endforeach
</div>




@endsection

@section('script')
<script src="{{ asset('js/functions/dietDays.js') }}"></script>
@endsection
