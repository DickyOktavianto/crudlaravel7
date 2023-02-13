<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </head>
  <body>
    <h1 class="text-center mb-4">Tambah data Pegawai</h1>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
          <div class="card">
            <div class="card-body">
            <form action="insertdata" method="POST" entype="multipart/form-data">
              @csrf
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div> 
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jeniskelamin"  aria-label="Default select example">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="cowo">Cowo</option>
                        <option value="cewe">cewe</option>
                    </select>
              </div>
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                    <input type="number" name="Telepon"  class="form-control">
              </div>
              <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                    <input type="file" name="foto"  class="form-control">
              </div>
                   <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
           
         </div>
        </div> 
        </div>
      </div>
    </body>
</html>
    