@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Lista diet użytkownika')
@section('styles')
<link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

@endsection


@section('main')
<div class="row m-b-10">
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#DietModal" onclick="addModal()">
        Dodaj Dietę
    </button>
</div>

<div class="row">
    <table style="width: 100%;">
        <thead>
            <tr>
                <td>Tytuł</td>
                <td>Data od</td>
                <td>Data do</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody id="diet_list">
            @foreach ($diets as $diet)
            <tr>
                <td>{{ $diet->title}}</td>
                <td>{{ $diet->dateFrom}}</td>
                <td>{{ $diet->dateTo}}</td>
                <td>
                    <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#DietModal" onclick="selectDiet({{ $diet->id }})">Edycja</button>
                </td>
                <td>
                    <button class="btn btn-outline-info btn-sm" onclick="window.location.href='/userList/{{ $idUser }}/diet/{{ $diet->id }}/dietDays'">Szczegóły</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $diets->links() }}

</div>


<!-- Modal -->
<div class="modal fade" id="DietModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle2">Dodaj dietę</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="m-b-10">
            <label for="dietTitle">Tytuł</label>
            <input type="text" class="form-control" id="dietTitle">
        </div>
        <div>
            <label for="range_data">Zakres dat</label>
            <div class="input-daterange input-group" id="range_data">
                <div class="form-line">
                    <input type="text" id="dateFrom" class="form-control" placeholder="Date start...">
                </div>
                <span class="input-group-addon">do</span>
                <div class="form-line">
                    <input type="text" id="dateTo" class="form-control" placeholder="Date end...">
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
      <button type="button" class="btn btn-primary" onclick="addDiet()">Zapisz zmiany</button>
    </div>
  </div>
</div>
</div>
<!-- Modal End -->

@endsection

@section('script')
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/functions/diets.js') }}"></script>
@endsection
