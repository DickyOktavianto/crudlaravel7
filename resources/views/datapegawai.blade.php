<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js" integrity="sha512-qKyIokLnyh6oSnWsc5h21uwMAQtljqMZZT17CIMXuCQNIfFSFF4tJdMOaJHL9fQdJUANid6OB6DRR0zdHrbWAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    <h1 class="text-center mb-4">Daftar Absen</h1>
    <div class="container">
    <a href="/tambahpegawai" class="btn btn-primary">Tambah +</a>
          <div class="row g-3 align-items-center mt-2">
              <div class="col-auto">
                  <form action="/pegawai" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                </form>
              </div>
              
              <div class="col-auto">
                  <a href="/exportpdf" class="btn btn-danger">PDF</a>
              </div>
                 
              <div class="col-auto">
                    <a href="/exportexcel" class="btn btn-success">Excel</a>
              </div>

              <div class="col-auto">
                    <a href="/grafik" class="btn btn-dark">Grafik</a>
              </div>

          </div>
        <div class="row">  
            <table class="table">
                <!-- @if ($message = Session::get('success'))
                <div class="alert alert-info" role="alert">
                    {{$message}}
                </div>
    @endif -->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Telepon</th>
      <th scope="col">Dibuat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php 
        $no = 1;
    @endphp
    @foreach( $data as $index => $row )
    <tr>
      <th scope="row">{{ $index + $data->firstItem() }}</th>
      <td>{{ $row->nama }}</td>
      <td>{{ $row->jeniskelamin }}</td>
      <td>0{{ $row->Telepon }}</td>
      <td>{{ $row->created_at->format('D M Y') }}</td>
      <td>
          <a href="/tampilkandata/{{ $row->id }}" class="btn btn-primary">Edit</a>
          <a href="/delete/{{$row->id}}" class="btn btn-secondary">Delete</a> 
      </td>
    </tr>
    @endforeach
    
     </tbody>
    </table>
    {{ $data->links() }}
  </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</body>
<!-- <script>
  // $('.delete').click(function(){
    var pegawaiid = $(this).attr('data-id')
    swal({
              title: "Yakin?",
              text: "Kamu akan Menghapus data pegawai dengan id "+pegawaiid+",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location = "/delete/"+pegawaiid+""
                swal("Data Berhasil Dihapus", {
                  icon: "success",
                });
              } else {
                swal("Data Tidak Jadi Dihapus!");
              }
            });
    });
</script> -->

<script>
  @if (Session::has('success'))
   toastr.success("{{Session::get('success')}}");
  @endif
</script>
</html>
