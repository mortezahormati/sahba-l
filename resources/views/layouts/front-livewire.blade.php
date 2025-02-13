<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
   @include('livewire.home.home.head')
</head>
<livewire:styles/>
<body>
@include('livewire.home.home.header')

    {{ $slot }}

@include('livewire.home.home.js-scripts')
@include('livewire.home.home.footer')
@yield('scripts')
<livewire:scripts/>


</body>

</html>
