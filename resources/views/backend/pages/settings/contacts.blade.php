@extends('layouts.backend')
<!-- title -->
@section('title',$title)
<!-- internal css -->
@push('styles')

@endpush

@section('main-content')
<div class="app-main__inner">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header border-bottom">
                    <h4 class="card-title d-flex justify-content-between align-items-center">{{ $title }}
                        <a href="{{ route('admin.settings.contact.export') }}" class="btn btn-sm btn-primary"><i class="fas fa-download fa-sm"></i> Export</a>
                    </h4>
                </div>
                <div class="card-body px-0">
                        <table class="aalign-middle mb-0 table table-hover" id="contact_datatables">
                            <thead>
                                <th>SL</th>
                                <th>Full Name</th>
                                <th>Company Name</th>
                                <th>Buy calls (Advertiser or Publisher)</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Action</th>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- internal js -->
@push('scripts')
    <script>
        $('#contact_datatables').DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            lengthMenu:[
                [20, 25, 50, 100,200],
                [20, 25, 50, 100,200]
            ],
            ajax: {
                url: "{{ route('admin.settings.contact.get-data') }}",
                type: "POST",
                dataType: "JSON",
                data:{ _token:_token}
            },
            columns: [
                {data: 'DT_RowIndex',orderable: false, searchable: false},
                {data: 'full_name'},
                {data: 'company_name'},
                {data: 'buy_sell'},
                {data: 'email'},
                {data: 'phone_number'},
                {data: 'country'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ],
            bSort: false,
            pageLength: 20,
            language: {
                processing: '<img src="{{ asset("img/table-loading.svg") }}">',
                lengthMenu: "Display _MENU_ per page",
                zeroRecords: "<span class='text-danger'>No Records Found</span>",
                infoEmpty: "<span class='text-dark'>No Records Found</span>",
            }
        });

        // contact details
        $(document).on('click','button.view-btn', function(){
            let data_id = $(this).data('id'); // datatable row id
            let url = '{{ route("admin.settings.contact.view") }}'
            $.ajax({
                url: url,
                type: 'POST',
                data:{ _token:_token,data:data_id},
                dataType: 'JSON',
                cache: false,
                beforeSend: function(){
                    $('#contact_datatables').DataTable().ajax.reload();
                },
                success: function(data){
                    // value
                    $('#company-name').text(data.company_name);
                    $('#full-name').text(data.full_name);
                    $('#email').text(data.email);
                    $('#phone-number').text(data.phone_number);
                    $('#buy-sell').text(data.buy_sell);
                    $('#preferred-vertical').html(data.preferred_verticals);
                    $('#how-did-you').html(data.how_did_find_us);
                    $('#country').text(data.country);
                    $('#description').text(data.description);
                    // modal title
                    $('#title').text('Details: '+data.company_name);
                    // modal show
                    $('#contact-view').modal({
                        keyboard: false,
                        backdrop: 'static' // others window click modal not hide
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        })


         // contact delete
         $(document).on('click','button.delete-btn', function(){
            let dataId = $(this).data('id'); // datatable row id
            let url = "{{ route('admin.settings.contact.delete') }}"; // delete url define
            let tabel_name = '#contact_datatables'; // datatables name
            let title = 'Are you sure delete'; // alert message
            let type = 'POST'; // ajax type
            action_datatable(url,dataId,tabel_name,title,type); // custom function with spacific delete row
        });


        // global datatables delete
        function action_datatable(url,data,tableName,title,method){
            if (data) {
                Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: method,
                            data:{ _token:_token,data:data},
                            dataType: 'JSON',
                            cache: false,
                            success: function(data){
                                $(tableName).DataTable().ajax.reload();
                                flashMessage(data.status,data.message);
                            },
                            error: function(error){
                                console.log(error)
                            }
                        });
                    }
                })
            }
        }
    </script>
@endpush
