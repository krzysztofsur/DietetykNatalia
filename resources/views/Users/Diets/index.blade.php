@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Request')
@section('styles')
<link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

@endsection


@section('main')

<div class="row">



    <div class="col-xs-12">
        @foreach ($diets as $diet)
            <div class="col-xs-10">
                <h4>{{ $diet->name }}</h4>
            </div>
            <div class="col-xs-2">
                <button class="btn btn-outline-info btn-sm pull-right" onclick="window.location.href='/userList/{{ $idUser }}/diet/{{ $diet->id }}'">
                    Szczegóły
                </button>
            </div>
        @endforeach
        {{ $diets->links() }}

    
    </div>

    <table style="width: 100%;">
        <thead>
            <tr>
                <td>Imie</td>
                <td>Nazwisko</td>
                <td></td>
            </tr>
        </thead>
        <tbody id="blog_list">
            @foreach ($diets as $user)
            <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>

                <td>
                    <button class="btn btn-outline-info btn-sm pull-right" onclick="window.location.href='/userList/{{ $user->id}}'">Szczegóły</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


<!-- Add Modal -->
<div class="modal fade" id="addIngredientModal" tabindex="-1" role="dialog"
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

        <div class="col-xs-6">
            <h2 class="card-inside-title">Range</h2>
            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                <div class="form-line">
                    <input type="text" class="form-control" placeholder="Date start...">
                </div>
                <span class="input-group-addon">to</span>
                <div class="form-line">
                    <input type="text" class="form-control" placeholder="Date end...">
                </div>
            </div>
        </div>



        <div class="row">
          <label for="mealRecipe">Ilość</label>
          <input type="number" class="form-control" id="productWeight" value="0">
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" onclick="addIngredient()">Save changes</button>
    </div>
  </div>
</div>
</div>
<!-- Add Modal End -->





@endsection

@section('script')
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script>

    $('#bs_datepicker_range_container').datepicker({
        autoclose: true,
        container: '#bs_datepicker_range_container'
    });
</script>
@endsection
