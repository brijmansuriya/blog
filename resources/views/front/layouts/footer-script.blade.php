<script src="{{ URL::asset('public_front/vendor/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public_front/vendor/popper.min.js') }}"></script>
<script src="{{ URL::asset('public_front/vendor/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('public_front/vendor/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('public_front/vendor/dom-factory.js') }}"></script>
<script src="{{ URL::asset('public_front/vendor/material-design-kit.js') }}"></script>
<script src="{{ URL::asset('public_front/js/app.js') }}"></script>
<script src="{{ URL::asset('public_front/js/preloader.js') }}"></script>

<script src="{{ URL::asset('backend/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('backend/vendors/select2/select2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

@yield('script')

<script>


/* $( function () {
        $.notify(
            {
                title: "<strong>Title</strong>",
                message: "<br>Facendo click su questa notifica",
                icon: 'fas fa-exclamation-triangle',
            },
            {
                type: "danger",
                allow_dismiss: true,
                delay: 3000,
                placement: {
                  from: "top",
                  align: "right",
                },
            }
        );
    }); */





    $('.dataTables_filter').css("text-align", "right");

    // $('form').parsley();
    // $("#myForm").parsley(); 

     $(document).ready(function() {
     	$('.select2').select2();
        $(".alert").fadeTo(1000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    });

    /*delete record js*/
    function deleteRecord(deleteUrl) {
        Swal.fire({
            title: "Are you sure that you want to delete this record?",
            text: "You will not be able to recover record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#172774",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            reverseButtons: true
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