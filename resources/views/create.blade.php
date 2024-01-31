@extends('layout.dasar')
<!-- START FORM -->
@section('konten')

@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<form action='{{ url('/admin/kasir') }}' method='post'> 
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="no_meja" class="col-sm-2 col-form-label">No Meja</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='no_meja' value="{{ Session::get('no_meja') }}" id="no_meja">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ Session::get('name') }}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pesanan" class="col-sm-2 col-form-label">Pesanan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='pesanan' value="{{ Session::get('pesanan') }}" id="pesanan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pesanan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
<!-- AKHIR FORM -->