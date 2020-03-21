@extends('layout.app')

@section('title','Siswa')


@section('content')  

<div class="container-fluid p-5">
    <div class="row">
        <div class="form-group col-md-12">
           <h4>Siswa</h4>
           <div class="card">
            <div class="card-header">
              Table
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas Siswa</th>
                        <th scope="col">No. Induk</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if ($siswa->count() > 0)
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td class="text-center">@mdo</td>
                          </tr>
                        @else
                        <tr>
                            
                            <td class="text-center" colspan="5">Tidak Ada Data Bro</td>
                          </tr>
                        @endif

                      


                     
                    </tbody>
                  </table>
              
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>
        </div>
    </div>
</div>




@endsection
    