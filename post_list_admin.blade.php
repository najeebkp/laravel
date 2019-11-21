@extends ('layouts.app')

<table class="table">
	<thead class="thead-dark">
	<tr>
		<th scope="col">PK</th>
		<th scope="col">Post Title</th>
		<th scope="col">Content</th>
		<th scope="col">Edit</th>
		<th scope="col">Delete</th>
	</tr>
	</thead>
<tbody>
{% for item in items %}
	<tr>
		<td>{{item.pk}}</td>
		<td>{{item.title}}</td>
		<td>{{item.body|truncatechars:50}}</td>
		<td><a href="{% url 'blog:edit_post' pk=item.pk %}"><button class="btn btn-warning">Edit</button></a></td>
		<td><a href="{% url 'blog:delete_post' pk=item.pk %}"><button class="btn btn-danger">Delete</button></a></td>
	</tr>
{% endfor %}
</table>
{% include 'blog/pagination.html' %}
        {% endblock %}
  </body>
</html>