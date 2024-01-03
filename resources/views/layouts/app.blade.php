<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Admin</title>
    <!-- Tambahkan referensi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/1f00b848b3.js" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
</head>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @if (Auth::check())
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar py-3">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('books.index') }}">
                                    <i class="fas fa-book"></i> Daftar Buku
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.index') }}">
                                    <i class="fas fa-list"></i> Daftar Kategori
                                </a>
                            </li>
                            <!-- Add the logout link at the bottom of the sidebar -->
                            @if (Auth::check())
                                <li class="nav-item mt-auto">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            @endif

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between align-items-center my-2">
                    @if (Auth::check())
                      
                    @endif
                </div>
                @yield('content')
            </main>
        </div>
    </div>

    <style>
        #sidebar {
            height: 100vh;
            /* 100% of the viewport height */
            overflow-y: auto;
            /* Enable vertical scrollbar if needed */
        }
    </style>

    <!-- ... (additional scripts) ... -->
</body>

</html>
