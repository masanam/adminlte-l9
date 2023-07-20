@extends('adminlte::page')

@section('title', 'Buyer List')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Buyer</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('buyers.create') }}"> Create Pembeli</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Nama Pembeli</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Handphone</th>
                <th>Email</th>
                <th>Kode Dokter</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($buyers as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nama_pembeli }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->telepon }}</td>
                <td>{{ $row->handphone }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->kode_dokter }}</td>
                <td>
                <a class="btn btn-primary" href="{{ route('buyers.edit',$row->id) }}">Edit</a>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$row->id}}">
    Hapus
</button>
<div class="modal fade" id="deleteModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Category</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are You Sure?? You want to delete this Data!!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ route('buyers.destroy',$row->id) }}" class="btn btn-danger">Yes Delete</a>
            </div>
        </div>
    </div>
</div>


                    <!-- <form action="{{ route('buyers.destroy',$row->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('buyers.edit',$row->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you want to delete this data?')" class="btn btn-danger">Delete</button>
                    </form> -->
                </td>
            </tr>
            @endforeach
        </table>
        {!! $buyers->links() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop