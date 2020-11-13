<% include SideBar %>
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
			<a href='$getEditUrl()'>$Name</a>
		<% end_loop %>
		</br>
	<% end_loop %>

	

</div>