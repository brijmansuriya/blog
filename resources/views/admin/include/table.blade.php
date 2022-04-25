<table id="{{$dataTableId}}" class="table table-bordered table-striped">
		<thead>
			<tr>
				@foreach ($dateTableFields as $field)
				<th>
					{{ $field['title'] }}
				</th>
				@endforeach
			</tr>
		</thead>
	<tbody>
	</tbody>
</table>


