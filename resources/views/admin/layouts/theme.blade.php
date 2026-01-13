<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">
    <head>
        @include('admin.includes.header')
        @include('admin.includes.css')
    </head>

    <body>
        @include('admin.includes.sidebar')

        <main class="dashboard-main">
            @include('admin.includes.topbar')

            @yield('body')

            @include('admin.includes.footer')
        </main>

        @include('admin.includes.scripts')
    </body>
</html>
