<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="{{ asset('js/app.js') }}" defer></script>

<link rel="shortcut icon" href="/images/LogoQ.ico" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
<link rel="stylesheet" href="/css/pricing.css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .bankName{
        text-decoration: none;
      }
      .BlackA:hover{
        color: black;
      }
    </style>    

<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <p class="h5 my-0 me-md-auto fw-normal"><a class="bankName BlackA" href="/home">qwerty bank</a></p>
    <nav class="my-2 my-md-0 me-md-3">
  
      <a class="p-2 text-dark" href="/home">Home</a>
      <a class="p-2 text-dark" href="/NewCard">New card</a>
    
  </nav>
  <a id="navbarDropdown" class="nav-link dropdown-toggle BlackA" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      {{ Auth::user()->name }}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item " href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>
      <a class="dropdown-item" href="/Contacts">
        Contacts
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
  </header>