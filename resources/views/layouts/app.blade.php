<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MARVEL SHOP')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e1e1e1; /* Light gray for contrast */
            margin: 0;
            padding: 0;
            color: #333;
        }

        .navbar {
            background-color: #fff; /* White background */
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            font-size: 2.5em; /* Prominent font size */
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            color: #333; /* Dark text color */
        }

        .navbar-brand .marvel-box {
            background-color: #c8102e; /* Marvel Red */
            padding: 5px 10px;
            margin-right: 10px;
            color: #fff; /* White text */
        }

        .navbar-brand .merchandise {
            color: #333; /* Dark text color */
            position: relative;
            display: inline-block;
            padding: 0 10px;
        }

        .navbar-brand .merchandise::before,
        .navbar-brand .merchandise::after {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #333; /* Dark line color */
        }

        .navbar-brand .merchandise::before {
            top: -5px; /* Position the line above the text */
        }

        .navbar-brand .merchandise::after {
            bottom: -5px; /* Position the line below the text */
        }

        .navbar .home-button {
            background-color: #c8102e; /* Marvel Red */
            color: #fff; /* White text */
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: 700;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .navbar .home-button:hover {
            background-color: #a00e23; /* Darker Marvel Red on hover */
        }

        .container {
            max-width: 900px;
            background-color: #fff; /* White */
            padding: 30px;
            margin: 30px auto;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://ibb.co/fk3XK6S') no-repeat center center / cover; /* Marvel-themed background image */
            opacity: 0.1; /* Subtle background image */
            z-index: -1;
        }

        h1 {
            margin-bottom: 30px;
            color: #c8102e; /* Marvel Red */
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            font-size: 3em; /* Larger font size for headings */
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3); /* Comic book effect */
        }

        .btn-primary {
            background-color: #006400; /* Marvel Green */
            border: none;
            color: #fff;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1.1em;
            text-decoration: none; /* Remove underline from links */
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Slight shadow for depth */
        }

        .btn-primary:hover {
            background-color: #004d00; /* Darker Green */
            transform: scale(1.05); /* Slight zoom effect */
        }

        .text-center {
            text-align: center;
        }

        .d-flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="navbar-brand">
            <span class="marvel-box">MARVEL</span>
            <span class="merchandise">SHOP</span>
     </span>
      <a href="/" class="home-button">Add Product</a> 
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
