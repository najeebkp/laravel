@extends ('layouts.app')
@section('content')
<body>
<table class="table">
	<thead class="thead-dark">
	<tr>
		<th scope="col">Post Title</th>
		<th scope="col">Category</th>
		<th scope="col">Description</th>
		<th scope="col">Edit</th>
		<th scope="col">Delete</th>
	</tr>
	</thead>

<tbody>
<?php
use App\Category;

foreach($posts as $post){
	echo"
	<tr>
	<td>{$post->title}</td>
	<td>{$post->category['title']}</td>";
	echo"<td>".str_limit($post->body, $limit = 50, $end = '...')."</td>";
	echo"<td><a href='/post_details/{$post->slug}/edit'><button class='btn btn-warning'>Edit</button></a></td>
		<td><a href='/post_details/{$post->slug}/delete'><button class='btn btn-danger'>Delete</button></a></td>
	</tr>";
	}

?>

</table>
@endsection