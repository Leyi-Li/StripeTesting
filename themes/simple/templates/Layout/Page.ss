<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>
		$Form
		$CommentsForm

	<% loop $trips %>
		$Name:
		<% loop $Destinations %>
			$Name
		<% end_loop %>
		</br>
	<% end_loop %>

	$DestinationForm

</div>