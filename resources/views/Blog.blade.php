<!doctype html>
<html lang="en">
<head>
    <title>Archer's Tours and Travel - Blogs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="{{ asset('Template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: orange;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/images/logo_medium_3-removebg-preview.png" alt="Archer's Tours Logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/destination">Destinations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tours</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/blog">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Blog Section -->
    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4">Latest Blogs</h2>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="shadow-sm elevation-9">
                        <img src="{{ asset('storage/' . $blog->image) }}"
                             class="card-img-top" alt="{{ $blog->title }}" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="text-muted">By {{ $blog->author }} on {{ $blog->created_at->format('M d, Y') }}</p>
                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/logo_medium_3-removebg-preview.png"
                         alt="Archer's Tours Logo" style="height: 50px;">
                    <p class="mt-3">Archer's Tours and Travel offers the best travel experiences across Africa,
                    where your adventure begins!</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-light">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-light">Home</a></li>
                        <li><a href="/about.html" class="text-light">About</a></li>
                        <li><a href="#" class="text-light">Destinations</a></li>
                        <li><a href="#" class="text-light">Tours</a></li>
                        <li><a href="#" class="text-light">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-light">Location & Contact</h5>
                    <p>123 Safari Drive, Nairobi, Kenya</p>
                    <p>Email: info@archerstours.com</p>
                    <p>Phone: +254 712 345 678</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 Archer's Tours and Travel. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Template/js/main.js') }}"></script>

</body>
</html>
