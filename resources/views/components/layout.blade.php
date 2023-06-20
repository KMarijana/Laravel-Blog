<!doctype html>

<title>Baza znanja</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="{{ asset('css/treeview.css') }}" rel="stylesheet">
    <style type="text/css">
        .dropdown-toggle{
            height: 40px;
            width: 400px !important;
        }
    </style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/knowledge.jpg" alt="Knowledge Logo" width="150" height="10">
            </a>
        </div>

        <div class="mt-8 md:mt-5 mr-10 flex items-center">
            @auth
                <h4 class="mr-6 text-xl font-bold uppercase">Dobrodošli, {{auth()->user()->name }}</h4>

                <a href="/admin/posts" class="bg-blue-200 ml-3 rounded-full text-xl font-semibold text-black py-3 px-5">Kontrolna tabla</a>

                <form method="POST" action="/logout" class="bg-gray-200 ml-3 rounded-full text-xl font-semibold text-black py-3 px-5">
                    @csrf
                    <button type="submit">Odjavi se</button>
                </form>

            @else
                <a href="/register" class="text-xl font-bold text-black uppercase">Registruj se</a>
                <a href="/login" class="ml-6 mr-6 text-xl text-blue-600 font-bold uppercase">Prijavi se</a>
            @endauth

        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-10 px-10 mt-16">
        <img src="/images/brain.png" alt="" class="mx-auto mb-6" style="width: 150px;">
       <h1 class="text-xl" >Marijana Kalamin MIT 6/22</h1>
    </footer>
</section>

    <x-flash/>
</body>
