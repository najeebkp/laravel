﻿@extends('layouts.app')
@section('content')

<!DOCTYPE html>
@if (session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session()->get('success')))
        <ul>
            @foreach (session()->get('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @else
            {{ session()->get('success') }}
        @endif
    </div>
@endif

<head>
      
	<!-- BOOTSTRAP STYLES-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
  
              
               
        <!-- /. NAV TOP  -->
       
 <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

<li>
                        <a href="<?php echo '/category/1' ?>"><i class="fa fa-edit "></i>Political</a>
                    </li>
                    <li>
                        <a href="<?php echo '/category/2' ?>"><i class="fa fa-edit "></i>Sports</a>
                    </li>
                     <li>
                        <a href="<?php echo '/category/3' ?>"><i class="fa fa-edit "></i>Technology </a>
                    </li>

	 <li>
                        <a href="<?php echo '/category/4' ?>"><i class="fa fa-edit "></i>Education </a>
                    </li>
                    
                </ul>
                            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row text-center pad-top">
                    <div class="col-lg ">
                     <h2>ADMIN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12  ">
                        <div class="alert alert-info">
                             <strong>Welcome {{ Auth::user()->name }}! </strong>
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
 
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="new-post" >

 <i class="fa fa-clipboard fa-5x"></i>
                      <h4>New Article</h4>
                      </a>
                      </div>
                     </div>
                     
                
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="post_list_admin" >
 <i class="fa fa-pencil-square-o fa-5x"></i>
                      <h4>Manage Article</h4>
                      </a>
                      </div>
	
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="posts" >
 <i class="fa fa-list fa-5x"></i>
                      <h4>All Articles</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="changePassword/{{Auth::user()->id}}" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>Change Password</h4>
                      </a>
                      </div>
                     
                     
                  
                     
                  </div>
              </div>

                
    
   

     <!-- /. WRAPPER  -->
   
    <!-- JQUERY SCRIPTS -->
    <script src="/assets/js/jquery-1.10.2.js"></script>
  
      <!-- CUSTOM SCRIPTS -->
    <script src="/assets/js/custom.js"></script>
    
</body>
</html>
@endsection

