{{-- toma los parámetros del dashboard --}}
@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs' => [],
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/a3035e377e.js" crossorigin="anonymous"></script>

    <!--Sweet Alert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Wire-UI-->
    <wireui:scripts />

    <!-- Styles -->
    @livewireStyles


</head>

<body class="font-sans antialiased bg-gray-50">

    @include('layouts.include.admin.navigation')

    @include('layouts.include.admin.sidebar')

    <div class="p-4 sm:ml-64">
        <!--Añadir Margen superior-->
        <div class="mt-14 flex items-center justify-between w-full">
            @include('layouts.include.admin.breadcrumb')
            {{-- 🔹 Aquí se mostrará el botón "Nuevo rol" u otras acciones --}}
            <div class="shrink-0">
                {{ $actions ?? '' }}
            </div>
        </div>

        {{ $slot }}

    </div>
    @stack('modals')

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    {{-- Mostrar sweet alert --}}
    @if (@session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif
    <script>
        //Buscar todos los elementos de una clase específica
        forms = document.querySelectorAll('.delete-form');
        forms.forEach(form => {
            //Se pone al pendiente de cualquier acción submit (Activa el modo chismoso)
            form.addEventListener('submit', function(e) {
                //Evita que se envie
                e.preventDefault();
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás revertir esto",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed)
                    {
                        //Borrar el registro
                        form.submit();
                    }
                });
            })
        });
    </script>
</body>

</html>
