@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Request')
@section('styles')
<link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

@endsection


@section('main')
<div class="row m-b-10">
    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addDietModal">
        add
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
        <tbody id="blog_list">
            @foreach ($diets as $diet)
            <tr>
                <td>{{ $diet->title}}</td>
                <td>{{ $diet->dateFrom}}</td>
                <td>{{ $diet->dateTo}}</td>

                <td>
                    <button class="btn btn-outline-info btn-sm" onclick="editDiet({{ $diet->id }})">Edit</button>
                </td>
                <td>
                    <button class="btn btn-outline-info btn-sm" onclick="window.location.href='/userList/{{ $idUser }}/diet/{{ $diet->id }}'">Szczegóły</button>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $diets->links() }}

</div>


<!-- Add Modal -->
<div class="modal fade" id="addDietModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle2">Modal title</h5>
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
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" onclick="addDiet()">Save changes</button>
    </div>
  </div>
</div>
</div>
<!-- Add Modal End -->





@endsection

@section('script')
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/functions/diets.js') }}"></script>
@endsection
