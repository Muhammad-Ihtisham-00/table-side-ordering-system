<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8" />
    <title>Aviato | E-commerce template</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <link href="{{asset('frontend/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

  

    <script src="{{asset('assets/jQuery.js')}}"></script>
  </head>

  @php 
  $total = 0; 
  @endphp
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-danger">
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
          </svg>
          <span style="margin-left: 10px">Cart</span>
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

    <div class="container ms-0" style="margin-top: 100px">
      <div class="row mb-4">
        <div class="col mb-4">
          <div class="card">
            <table class="table">
              <thead class="bg-danger">
                <tr>
                  <th scope="col" style="color: white">Item</th>
                  <th scope="col" style="color: white">Price</th>
                  <th scope="col" style="color: white">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartitems as $item)
                <tr>
                  <td>
                    <img style="width: 80px" src="{{ url('assets/images/'.$item->food_item->image) }}" alt="" />
                    <span><strong>{{$item->food_item->name}}</strong></span>
                  </td>
                  <td class="align-middle">Rs {{$item->food_item->price}}</td>
                  <td class="align-middle" style="text-align: center">
                    <a onclick="deleteitem({{$item->food_item->id}})"><svg
                      style="color: #dc3545"
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-trash3-fill"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"
                      />
                    </svg></a>
                  </td>
                </tr>
                @php $total = $total + $item->food_item->price * $item->prod_qty; 
                @endphp 
                @endforeach
                <tr>
                  <td><strong>Total</strong></td>
                  <td class="align-middle"><strong>Rs {{$total}}</strong></td>
                  <td class="align-middle"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <a href="{{route('checkout.index')}}">
        <div class="d-grid gap-2">
          
          <a href="{{route('checkout.index')}}" class="btn btn-success">Proceed to Checkout</a>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script>
        function deleteitem(id) {
            var prod_id = id;

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
            'prod_id': prod_id,
            },
            success: function (response){
                window.location.reload();
            }
        });
    }



    </script>
  </body>
</html>
