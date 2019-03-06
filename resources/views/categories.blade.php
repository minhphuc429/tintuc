@extends('dashboard.master')

@section('title', 'Category')

@section('stylesheet')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content-header', 'Category')

@section('content')
    <div class="row" id='app'>
        <category></category>
    </div>
@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#data-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
            $('#modal-delete').on('show.bs.modal', function (e) {
                var data = $(e.relatedTarget).data();
                $('.message', this).text(data.message);
                $('.btn-google', this).data('id', data.id);
            });
            $('.modal-footer').on('click', '.btn-google', function (e) {
                e.preventDefault();
                $(".btn-google").prop('disabled', true);
                var id = $(this).data('id');
                $.ajax({
                    type: "post",
                    url: '{{ action('CategoryController@index') }}' + '/' + id,
                    data: {
                        '_method': 'delete',
                        '_token': "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('table#data-table tr#' + id).remove();
                        $('#modal-delete').modal('toggle');
                        $(".btn-google").prop('disabled', false);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>

@endsection
