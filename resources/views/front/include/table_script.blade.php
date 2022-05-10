<input type="hidden" id="datatTableFields" value="{{ json_encode($dateTableFields)}}">
<script type="text/javascript">
    $(function() {
        let dataTableFields = JSON.parse(document.getElementById('datatTableFields').value);
        var table = $('#{{$dataTableId}}').DataTable({
            "lengthMenu": [
                [10, 25, 50, -1]
                , [10, 25, 50, "All"]
            ]
            , processing: true
            , serverSide: true
            , ajax: "{{$dateTableUrl}}"
            , columns: dataTableFields
            , order: []
        , });

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
