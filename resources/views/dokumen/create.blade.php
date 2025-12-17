@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Halaman pengurus</div>
  <div class="card-body">
      
    <form action="{{ url('dokumen') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Nama File</label></br>
        <input type="text" name="nama" id="nama" class="form-control"></br>
        <label>Upload file</label></br>
        <input type="file" name="file" id="file" class="form-control"></br>

        <input type="submit" value="Simpan" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
<script>
  tea.classList.add('active')
 </script>
@stop