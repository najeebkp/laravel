@extends ('layouts.app')
<html>
 <!-- <link href="/assets/css/bootstrap.css" rel="stylesheet" /> -->
@section('content')
<body>
	
<?php
foreach($posts as $post){
	echo"<div class='raw'><div class= 'col-lg-5'>
	<div class='panel panel-primary'><div class='panel-body' ><h1 style='color:black;'><a href='/post_details/{$post->slug}'>".$post->title."</h1></a>";
	
	echo str_limit($post->body, $limit = 50, $end = '...');
	echo"<br>";
	echo"</div></div></div></div>";


}
?>
	
</body>
@endsection
</html>