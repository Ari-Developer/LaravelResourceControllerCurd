<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Resource Controller - BS4 - CURD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('public/css/toastr.min.css') }}">
  <style type="text/css">
  .toast {
    opacity: 1 !important;
  }
  #toast-container > div {
    opacity: 1 !important; 
  }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="https://github.com/Ari-Developer">Developer Git-Profile</a>
    </li>
    @if(isset($menu) && $menu == 'index')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/users/create') }}">Add New User</a>
    </li>
    @endif
    @if(isset($menu) && $menu == 'create-edit')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/users') }}">View All Users</a>
    </li>
    @endif
  </ul>
</nav>


<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1><strong>Larave 5.5 Resource Controller CURD Application</strong></h1>      
  </div>
</div>