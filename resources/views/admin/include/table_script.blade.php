<link href="{{ URL::asset('assets/libs/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('assets/libs/bootstrap-table/bootstrap-table.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
<input type="hidden" id="datatTableFields" value="{{ json_encode($dateTableFields)}}">
{{-- <input type="hidden" id="datatTableFields2" value="{{ json_encode($dateTableFields2)}}"> --}}
<script type="text/javascript">
$(function() {
    
    let dataTableFields= JSON.parse(document.getElementById('datatTableFields').value);
    // let dataTableFields2= JSON.parse(document.getElementById('datatTableFields2').value);

    var table = $('#{{$dataTableId}}').DataTable({
		
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing: true,
        serverSide: true,
        ajax: "{{$dateTableUrl}}",
        columns: dataTableFields,
        order: [],
    });

    $('#filter-form').on('submit', function(e) {
        var obj = {};
        var data = $(this).serialize().split("&");
        for (var key in data) {
            obj[data[key].split("=")[0]] = data[key].split("=")[1];
        }
        $.ajaxSetup({
            data: obj
        });
        table.draw();
        e.preventDefault();
    });

  
});

</script>

