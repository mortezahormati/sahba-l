<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
    <livewire:admin.dashboard.head/>
</head>
<livewire:styles/>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">
    <livewire:admin.dashboard.nav-bar/>
    <livewire:admin.dashboard.sidebar/>
    <div class="content-wrapper" style="min-height: 823px;">
        <livewire:admin.dashboard.breadcrumb/>
        <section class="content">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </section>
    </div>
    <footer class="main-footer" style="text-align: center">
        <strong>تمامی حقوق مادی و معنوی این سایت متعلق به شرکت صهبا بوده و هرگونه کپی‌برداری از مطالب، حتی با ذکر منبع، غیرمجاز و مشمول پیگرد قانونی است..</strong>
    </footer>
</div>


<livewire:admin.dashboard.footer/>

@yield('scripts')


</body>

</html>
