<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('argon-template-front-end')}}/assets/img/apple-icon.png">
  <title>
    Wings Store
  </title>
  @include('part_front_end/css')
  @livewireStyles
</head>

<body class="landing-page">
  <!-- Navbar -->
    @include('livewire/counter')
    <livewire:nav/>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="section section-hero section-shaped">
      @include('part_front_end/page_header')
    </div>

   <!-- @include('part_front_end/section')-->
    <div class="section features-1">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <h3 class="display-3">@yield('judul_halaman')</h3><br>
            <?php $level = optional(Auth::user())->level; ?>
            @if ($level == !null)

            @else
            <p style="color: red" class="lead">Silahkan Login Terlebih Dahulu Untuk Berbelanja.</p>
            @endif
          </div>
        </div>
        <!-- ISI (OPSI 2)
            <div class="row">
        </div>-->
        @yield('konten')

      </div>
    <br /><br />
    @include('part_front_end/footer')
  </div>
  @include('part_front_end/script')
  @livewireScripts
</body>

</html>
