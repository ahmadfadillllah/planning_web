
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>{{ $title }} | {{ config('app.name') }}</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Web-based planning app for task scheduling, team collaboration, and project management." />
     <meta name="author" content="{{ config('app.name') }}" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('app') }}/assets/images/sims2.png">

     <!-- Gridjs Plugin css -->
    <link href="{{ asset('app') }}/assets/vendor/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css" />
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('app') }}/assets/css/plugins/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('app') }}/assets/css/plugins/buttons.bootstrap5.min.css">

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('app') }}/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('app') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('app') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('app') }}/assets/js/config.min.js"></script>
</head>

<body>
    @include('layout.alert')
    <style>
        @keyframes shake {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(5deg); }
            50% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
            100% { transform: rotate(0deg); }
        }

        .shake-ikon {
            display: inline-block;
            animation: shake 0.8s infinite;
        }
    </style>


     <!-- START Wrapper -->
     <div class="wrapper">
