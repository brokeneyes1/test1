<!DOCTYPE html>
<html>

<head>
    <title>Show Jobs</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Font Awersome CDN--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

</head>

<body>

    <div class="container">
        <h1 style="text-align: center;">Show Jobs</h1>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12  text-right my-3">
                <!-- <a class="btn btn-success" href="{{route('stock.create')}}">Create Stock</a> -->
                <!-- <a class="btn btn-danger float-end" href="{{ route('export_scv') }}">Download Stock csv</a> -->
                <a href="{{route('home')}}" class="btn btn-success float-start"> Back</a>

            </div>
        </div>
    </div>
    @if(session()->has('message'))
    <p class="alert {{ session('alert-class') }}">{{ session('message') }}</p>
    @endif
    <div class="container">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Queue</th>
                    <th>Attempts</th>
                    <th>Reserved At</th>
                    <th>Available At</th>
                    <th>Created At</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</body>

<script type="text/javascript">
    $(function() {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,

            ajax: "{{ route('showJobs') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'queue',
                    name: 'queue'
                },
                {
                    data: 'attempts',
                    name: 'attempts'
                },
                {
                    data: 'reserved_at',
                    name: 'reserved_at'
                },
                {
                    data: 'available_at',
                    name: 'available_at'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
            ]
        });
    });
</script>

</html>