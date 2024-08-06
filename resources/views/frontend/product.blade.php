<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aviato | E-commerce template</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Construction Html5 Template" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=5.0"
    />
    <meta name="author" content="Themefisher" />
    <meta name="generator" content="Themefisher Constra HTML Template v1.0" />

    <!-- bootstrap.min css -->
    <link href="{{asset('frontend/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  

    <script src="{{asset('assets/jQuery.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
      .checked {
  color: orange;
}
    </style>
  </head>

  <body>
    <!-- Start Top Header Bar -->
    <nav
      class="navbar fixed-top navbar-expand-lg navbar-light bg-danger"
      
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: white">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-cup-straw"
            viewBox="0 0 16 16"
          >
            <path
              d="M13.902.334a.5.5 0 0 1-.28.65l-2.254.902-.4 1.927c.376.095.715.215.972.367.228.135.56.396.56.82 0 .046-.004.09-.011.132l-.962 9.068a1.28 1.28 0 0 1-.524.93c-.488.34-1.494.87-3.01.87-1.516 0-2.522-.53-3.01-.87a1.28 1.28 0 0 1-.524-.93L3.51 5.132A.78.78 0 0 1 3.5 5c0-.424.332-.685.56-.82.262-.154.607-.276.99-.372C5.824 3.614 6.867 3.5 8 3.5c.712 0 1.389.045 1.985.127l.464-2.215a.5.5 0 0 1 .303-.356l2.5-1a.5.5 0 0 1 .65.278zM9.768 4.607A13.991 13.991 0 0 0 8 4.5c-1.076 0-2.033.11-2.707.278A3.284 3.284 0 0 0 4.645 5c.146.073.362.15.648.222C5.967 5.39 6.924 5.5 8 5.5c.571 0 1.109-.03 1.588-.085l.18-.808zm.292 1.756C9.445 6.45 8.742 6.5 8 6.5c-1.133 0-2.176-.114-2.95-.308a5.514 5.514 0 0 1-.435-.127l.838 8.03c.013.121.06.186.102.215.357.249 1.168.69 2.438.69 1.27 0 2.081-.441 2.438-.69.042-.029.09-.094.102-.215l.852-8.03a5.517 5.517 0 0 1-.435.127 8.88 8.88 0 0 1-.89.17zM4.467 4.884s.003.002.005.006l-.005-.006zm7.066 0-.005.006c.002-.004.005-.006.005-.006zM11.354 5a3.174 3.174 0 0 0-.604-.21l-.099.445.055-.013c.286-.072.502-.149.648-.222z"
            />
          </svg><span style="margin-left: 10px">Product</span>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
          style="color: white"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="22"
            height="22"
            fill="currentColor"
            class="bi bi-list"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
            />
          </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="{{ route('menu.index',session('table_id')) }}"
                style="color: white"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cart.index')}}" style="color: white">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('userOrder.show')}}" style="color: white">My Order</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container ms-0 " style="margin-top: 100px">
      <div class="row mb-4">
        <div class="col mb-4">
          <div class="card">
            
            <div class="position-relative">
              <div class="img-card">
              <svg id="ssg" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="grey" class="like bi bi-heart-fill position-absolute bottom-0 end-0" viewBox="0 0 16 16" style="margin-bottom: 10px; margin-right: 40px;">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
              </svg>
              <span  class="position-absolute bottom-0 end-0" style="margin-bottom: 13px; margin-right: 8px; font-size: 17px; color: grey"><strong class="likes" id="likes">{{$fooditem->likes}}</strong></span>
            </div>
              
            <img
              src="{{ url('assets/images/'.$fooditem->image) }}"
              class="card-img-top "
              alt="..."
            />
          </div>
            <div class="card-body">
              <input
                            type="hidden"
                            value="{{ $fooditem->id }}"
                            class="prod_id"
                            id="p-id"
                        />
              <p><strong>{{$fooditem->name}}</strong></p>
              <p>Category: <strong>{{$fooditem->category->name}}</strong></p>
              <input id="12" type="text" hidden value="4.5">
              
              <p><strong>RS {{$fooditem->price}}</strong></p>
              <p>{{$fooditem->description}}</p>
              <div class="input-group mb-3">
                <button
                  class="btn btn-danger decrement-btn"
                  type="button"
                  id="button-addon2"
                >
                  -
                </button>
                <div class="w-25">
                  <input
                    type="text"
                    id="disabledTextInput"
                    class="qty-input form-control text-center"
                    value="1"
                    disabled
                  />
                </div>
                <button
                  class="btn btn-success increment-btn"
                  type="button"
                  id="button-addon2"
                >
                  +
                </button>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="d-grid gap-2">
                    <a href="" class="btn btn-success adddToCartBtn">Add to Cart</a>
                  </div>
                </div>
                <div class="col-4">
                  <div class="d-grid gap-2">
                    <a href="{{ route('cart.index') }}" class="btn btn-warning">Cart</a>
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(function () {
        
 
 $("#rateYo1").rateYo({
   starWidth: "25px",
   rating: $("#12").val(),
 });

});
      $(document).ready(function(){
        $('.like').click(function(e){
          e.preventDefault();

          $("#ssg").attr("fill","red");
          var l = $('#likes').html();
          var l = parseInt(l);
          var l = l + 1;
          $(".likes").text(l);

          var product_id = $("#p-id").val();
          
          
          

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            method: "POST",
            url: "/like",
            data: {
              'product_id': product_id,
            },
            success: function (response){
              
            }
          });
        });

        $('.adddToCartBtn').click(function(e){
          e.preventDefault();

          var product_id = $(this).closest('.card-body').find('.prod_id').val();
          var product_qty = $(this).closest('.card-body').find('.qty-input').val();
          

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
              'product_id': product_id,
              'product_qty': product_qty,
            },
            success: function (response){
              swal.fire(response.status);
            }
          });
        });


        $('.increment-btn').click(function(e){
          e.preventDefault();

          var inc_value = $('.qty-input').val();
          var value = parseInt(inc_value, 10);
          value = isNaN(value) ? 0 : value;
          if(value < 10)
          {
            value++;
            $('.qty-input').val(value);
          }

        });

        $('.decrement-btn').click(function(e){
          e.preventDefault();
          var star = $("#rateYo").rateYo("option", "rating");
          swal.fire('b'+ star);

          var dec_value = $('.qty-input').val();
          var value = parseInt(dec_value, 10);
          value = isNaN(value) ? 0 : value;
          if(value > 1)
          {
            value--;
            $('.qty-input').val(value);
          }

        });
      });
    </script>
     <script
     src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
     crossorigin="anonymous"
   ></script>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  </body>
</html>
