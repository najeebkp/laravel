@extends ('layouts.app')
<!DOCTYPE html>

<!-- <link href="/css/bootstrap.css" rel="stylesheet" /> -->

@section('content')
<div class="container">
  <div class="jumbotron mt-3">
    <h1><?php echo $posts->title ?></h1>
    <p class="lead"><?php echo $posts->body ?></p>
    
  </div>
</div>
@endsection
