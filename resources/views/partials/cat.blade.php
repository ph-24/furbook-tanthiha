<div id="list-cats">
	@foreach($cats as $cat)
		<div class="cat">
			<a href="{{ route('cat.show', $cat->id) }}">
				<strong>{{ $cat->name }}</strong> - {{ $cat->breed->name }}
			</a>
		</div>
	@endforeach
		{{$cats->links()}}
	<script type="application/javascript">
		$(function() {
			$('a.page-link').click(function(event){
				event.preventDefault();
				// Get url from attribute href of tag a
				var url = $(this).attr('href');

				// Create request
				$.get(url, function (response) {
					$('#list-cats').replaceWith(response);
				});
				
				// User load ajax
				//$('#list-cats').load(url);
			});
		});
	</script>
</div>