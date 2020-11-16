
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>
		$Form
		$CommentsForm

	<% loop $Children %>
		<div>
			<h2><a href="$Link">$Title</a></h2>
		</div>
	<% end_loop %>

	<% loop $trips %>
		$Name:
		<% loop $Destinations %>
			<% if $Last %>
				<a href='$getEditUrl()'>$Name</a>
				<a href='/RestController/delete/$ID'>Delete</a>
			<% else %>
				<a href='$getEditUrl()'>$Name</a>,
				<a href='/RestController/delete/$ID'>Delete</a>
			<% end_if %>
			</br>
		<% end_loop %>
		</br>
	<% end_loop %>

	

</div>