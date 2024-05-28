<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Restaurant Website">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&amp;family=Nunito:wght@600;700;800&amp;family=Pacifico&amp;display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <title>@yield('title')</title>
</head>

<body>
    <header class="navbar navbar-expand-md">
        <div class="container-md">
            <a href="#" class="navbar-brand primary"><i class="fa-solid fa-utensils"></i> Restaurace</a>
            <button class="navbar-toggler" aria-label="header details" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-head">
                <span class="fa fa-bars primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-head">
                <div class="navbar-nav">
                    <a href="{{route('page.home')}}" class="nav-item nav-link">Home</a>
                    <a href="{{route('page.about')}}" class="nav-item nav-link">About</a>
                    <a href="{{route('page.services')}}" class="nav-item nav-link">Services</a>
                    <a href="{{route('page.menu')}}" class="nav-item nav-link">Menu</a>
                    <a href="{{route('page.feedback')}}" class="nav-item nav-link ">Feedback</a>
                    <div class="content d-flex">
                        <a href="{{route('page.cart')}}" aria-label="Order" class="nav-item nav-link nav-icon"><i
                                class="fa-solid fa-cart-plus primary"></i></a>
                        <a href="{{route('auth.login')}}" type="button"
                            class="btn-login secondary d-flex justify-content-center align-items-center px-4 fs-6">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    @yield('breadcrump')

    @yield('content')

    <footer class="primary-back py-5 secondary">
        <div class="container mx-auto">
            <div>
                <h5 class="ff-secondary mb-4">Pages</h5>
                <ul class="d-flex flex-column gap-2">

                    <li> <a class="secondary" href="{{route('page.home')}} "> Home</a></li>

                    <a class="secondary" href="{{route('page.about')}}">
                        <li>About</li>
                    </a>
                    <a class="secondary" href="{{route('page.services')}}">
                        <li>Services</li>
                    </a>
                    <a class="secondary" href="{{route('page.menu')}}">
                        <li>Menu</li>
                    </a>
                    <a class="secondary" href="{{route('page.feedback')}}">
                        <li>Feedback</li>
                    </a>
                </ul>
            </div>
            <div>
                <h5 class="ff-secondary mb-4">Contact</h5>
                <ul class="d-flex flex-column gap-3">
                    <li><i class="fa fa-map-marker-alt me-3"></i>123 Street, Tanta, Egypt</li>
                    <li><i class="fa fa-phone-alt me-3"></i>+20 126 254 1130</li>
                    <li><i class="fa fa-envelope me-3"></i>moh123@gmail.com</li>
                    <li>
                        <div class="icons d-flex gap-2">
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-youtube"></i>
                            <i class="fab fa-linkedin-in"></i>
                        </div>
                    </li>
                </ul>
            </div>
            <div>
                <h5 class="ff-secondary mb-4">Opening</h5>
                <ul>
                    <li>
                        <p class="mb-0 fs-5">Monday - Saturday</p>
                        <p>09AM - 09PM</p>
                    </li>
                    <li>
                        <p class="mb-0 fs-5">Sunday</p>
                        <p>10AM - 08PM</p>
                    </li>
                </ul>
            </div>
            <div>
                <h5 class="ff-secondary mb-4">Newsletter</h5>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/b40eb3e6dd.js" crossorigin="anonymous"></script>
<script src="./JS/template.js"></script>
@yield('js')

</html>