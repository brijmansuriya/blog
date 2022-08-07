<input type="hidden" id="datatTableFields" value="{{ json_encode($dateTableFields)}}">
<script type="text/javascript">
    $(function() {
        let dataTableFields = JSON.parse(document.getElementById('datatTableFields').value);
        var table = $('#{{$dataTableId}}').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1]
                , [10, 25, 50, "All"]
            ],
              "buttons": [
                  { extend: 'excel', text:'<i class="fa-solid fa-file-excel"></i>' , className: 'mt-1 btn btn-sm btn-primary waves-effect waves-light filter-form' }
              ]
            , processing: true
            , serverSide: true
            , ajax: "{{$dateTableUrl}}"
            , columns: dataTableFields
            ,responsive: true
            , order: [],
            dom: '<"row"<"col-sm-2"l><"col-sm-4 "B><"col-sm-6"f>>rtip',
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
