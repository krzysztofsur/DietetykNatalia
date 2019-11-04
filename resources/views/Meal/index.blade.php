@extends('layouts._LayoutPanel')
@section('title','Posiłki')
@section('styles')

@endsection

@section('main')

<div class="row">
    <div class="col-lg-5">
        <label for="category">Lista kategorii</label>
        <input type="text" class="form-control" id="product_search" oninput="refreshList()" placeholder="Szukaj...">
        <select multiple class="form-control" id="category" onchange="selectCategory()">
            {{-- @foreach ($categories as $category)
            <option value="{{ $category->id}}">{{ $category->name}}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="col-lg-6 pull-right">
        <label for="mealName">Nazwa posiłku</label>
        <input type="text" class="form-control" id="mealName">

        <div class="products col-lg-12" style="margin-top:20px;">
            
            <input type="text" class="form-control">

            <div class="col-lg-6">
                <input type="text" class="form-control">
            </div>
            <div class="col-lg-6">
                <input type="text" class="form-control">
            </div>
            
        </div>
    </div>
    
</div>


@endsection

@section('script')
    <script src="{{ asset('js/functions/meals.js') }}"></script>
@endsection