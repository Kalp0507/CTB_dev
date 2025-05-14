
<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container-fluid p-0 m-0" id="parentContainer">

    <header class="header-class">
        @include('includes.header')
    </header>

    <div id="main" class="">
        <!-- <div class="loader-wrapper">
            <img src="{{ URL::to('/') }}/images/tenor.gif" style="width:30%;" alt="...">
        </div> -->
  <!--   <div id="loading" class="loading d-none" style="display: flex; justify-content: center; align-items: center;">
        <img src="{{ asset('images/loadingImage.gif') }}" style="width: 5%; height: 10vh;" alt="User Image">
    </div> -->

            @yield('content')

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>
    <div>
         @include('includes.foot')
    </div>

</div>
@include('pages.signupLogin')
</body>
</html>