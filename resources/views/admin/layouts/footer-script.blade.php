<script src="{{ URL::asset('backend/js/jquery.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/template.js') }}"></script>
<script src="{{ URL::asset('backend/js/settings.js') }}"></script>
<script src="{{ URL::asset('backend/js/dataTables.select.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/off-canvas.js') }}"></script>
<script src="{{ URL::asset('backend/js/hoverable-collapse.js') }}"></script>
<script src="{{ URL::asset('backend/js/todolist.js') }}"></script>

@yield('script')
<script>



    $('.dataTables_filter').css("text-align", "right");

    // $('form').parsley();
    // $("#myForm").parsley(); 

     $(document).ready(function() {
     	$('.select2').select2();
       // $('.select2').select2({
       //     tags: true,
        //    tokenSeparators: [',', ' '],
       //     placeholder: "Select or type keywords"
       // });
    });
    $(document).ready(function() {
        $(".alert").fadeTo(1000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    });

    /*delete record js*/
    function deleteRecord(deleteUrl) {
        Swal.fire({
            title: "Are you sure that you want to delete this record?"
            , text: "You will not be able to recover record!"
            , type: "warning"
            , showCancelButton: true
            , confirmButtonColor: "#172774"
            , confirmButtonText: "Yes, delete it!"
            , cancelButtonText: "No, cancel please!"
            , reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: deleteUrl
                    , type: "DELETE"
                    , data: {
                        _token: "{{ csrf_token() }}"
                    }
                    , success: function(response) {
                        if (response) {
                            location.reload();
                        }
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled'
                    , 'Your Data is safe :)'
                    , 'error'
                , )
            }
        });
    }


</script>
@yield('script-bottom')
