@extends('layouts._LayoutPanel')
@section('title','Dieta dniowa')
@section('styles')
<link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

@endsection


@section('main')
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<div class="row">
<input type="hidden" id="idUser" value="{{$idUser}}">
<input type="hidden" id="idDiet" value="{{$idDiet}}">
    @foreach ($diet as $keys=>$items)
        <div class="col-sm-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{$items->name}}
                    </h2>
                </div>
            <div class="body" id="mealsBox_{{$keys}}">
                    <div id="meal">
                        <table style="width:100%">
                            @foreach ($items->meals as $key=>$item)
                            <tr>
                                <td>{{$item->meal->name}}</td>
                            <td><button type="button" class="btn btn-primary" onclick="deleteDietDayMeal({{$keys}},{{$key}})">Usuń</button> </td>
                            </tr>
                            @endforeach
                        </table>
                        <br>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dietDModal" onclick="modalAdd({{$keys}})">
                        Dodaj posiłek
                    </button>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>


    <!-- Add Modal -->
    <div class="modal fade" id="dietDModal" tabindex="-1" role="dialog"
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
            <input type="hidden" id="idDietD" value="{{$id}}">
          
            <label for="meals">Lista produktów</label>
            <input type="text" class="form-control" id="meal_search" oninput="refreshMealList()" placeholder="Szukaj...">
            <br/>
            <select multiple class="form-control" id="meals">
                @foreach ($meals as $meal)
                <option value="{{ $meal->id}}">{{ $meal->name}}</option>
                @endforeach
            </select>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
          <button type="button" class="btn btn-primary" onclick="addDietDays()">Zapisz</button>
        </div>
      </div>
    </div>
    </div>
    <!-- Add Modal End -->


@endsection

@section('script')
<script src="{{ asset('js/functions/dietDays.js') }}"></script>
@endsection
