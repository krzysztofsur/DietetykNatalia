@extends('layouts._LayoutPanel')
@section('title','Posiłki')
@section('styles')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=fqnmeurrl0ry206hcbd9m1dnhcflolt0mbr4u4ye7rvw11gc">
</script>
<script>
    tinymce.init({ selector:'textarea' });
</script>
@endsection

@section('main')

<div class="row">
  <div class="col-lg-5">
    <label for="category">Lista kategorii</label>
    <input type="text" class="form-control" id="meal_search" oninput="refreshList()" placeholder="Szukaj...">
    <select multiple class="form-control" id="meals" onchange="selectMeal()">
       @foreach ($meals as $meal)
            <option value="{{ $meal->id}}">{{ $meal->name}}</option>
      @endforeach 
    </select>
  </div>
  <div class="col-lg-7 pull-right">
    <label for="mealName">Nazwa posiłku</label>
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="text" class="form-control" id="mealName">
    <button onclick="newMeal()">Nowy Posiłek</button>
    <br>
    <div id="products" class="body table-responsive" style="display: none">
      <input type="hidden" id="mealId">
      <table id="productsTable" class="table table-hover">
        <thead>
          <tr>
            <th>Produkt</th>
            <th>Ilość</th>
            <th>Jednoska</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><button data-toggle="modal" data-target="#exampleModalCenter2">Edit</button></td>
          </tr>
          <tr>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
        </tbody>
      </table>
      
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        add
      </button>

      <div class="row">
        <label for="mealRecipe">Przepis</label>
        <textarea id="mealRecipe" style="width:100%"></textarea>
      </div>
    </div>
    
    <!--
            -jeżeli zmienisz zapisz w tablicy id, opcja: change 
            -jeżeli usuniesz zapisz w tablicy id, opcja: delete
            -jeżeli dodajesz zapisz w tablicy id, opcja: add
            {
                tablica=[{
                    id:id,
                    opcja:"opcja",
                    argument:[]
                },
                ]
            }

            html{
              background: black;
              filter invert(1) hue-rotate(180deg)
            }
    -->



    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addIngredientModal">
      addIngredientModal
    </button>

    <!-- ModalOne -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...add



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- ModalOneEnd -->


    <!-- addIngredientModal -->
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
          
            <label for="product">Lista produktów</label>
            <input type="text" class="form-control" id="product_search" oninput="refreshProductList()" placeholder="Szukaj...">
            <select class="form-control show-tick" onchange="refreshProductList()" id="product_search_category">
                    <option value="0">Wybierz kategorię</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                @endforeach
            </select>
            <br/>
            <select multiple class="form-control" id="product">
                @foreach ($products as $product)
                <option value="{{ $product->id}}">{{ $product->name}}</option>
                @endforeach
            </select>

            <div class="row">
              <label for="mealRecipe">Ilość</label>
              <input type="number" class="form-control" id="productWeight" value="0">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addIngredient()">Save changes</button>
        </div>
      </div>
    </div>
    </div>
    <!-- addIngredientModal END -->




  </div>

</div>


@endsection

@section('script')
<script src="{{ asset('js/functions/meals.js') }}"></script>
@endsection