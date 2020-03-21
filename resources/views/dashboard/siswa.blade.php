@extends('layout.app')

@section('title','Siswa')


@section('content')  

<div class="container-fluid p-5">
    <div class="row">
        <div class="form-group col-md-12">
           <h4>Siswa</h4>

            <div class="card">
                <div class="card-header">
                  
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" id="add-data-siswa">Tambah Data Siswa</button>
                        
                      </div>

                </div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover">
                        <thead>
                          <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="siswa-data">
                            @if($siswa->count() > 0 )
                            @foreach ($siswa as $item)
                            <tr id="id_siswa_{{$item->userID}}">
                                <th>{{$item->userID}}</th>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->kelas}}</td>
                                <td>{{$item->nis}}</td>
                                <td>
                                    <div class="btn-group mr-2" role="group" aria-label="First group">    
                                    <button type="button" class="btn btn-sm btn-primary edit-data mr-2" data-id="{{$item->userID}}"> <i class="fa fa-edit"></i> </button>
                                    <button type="button" class="btn btn-sm btn-info info-data mr-2" data-id="{{$item->userID}}"> <i class="fa fa-info"></i> </button>
                                    <button type="button" class="btn btn-sm btn-danger delete-data" data-id="{{$item->userID}}"> <i class="fa fa-trash"></i> </button>
                                    </div>
                                </td>
                              </tr>
                            @endforeach
                            
                            @else
                            <tr>
                                <th colspan="5" class="text-center">
                                    <div class="alert alert-info"> Tidak ada data bro</div>
                                </th>
                                
                              </tr>
                              @endif
                          
                        </tbody>
                      </table>
                </div>
                <div class="card-footer ">
                    <div class="btn-group" role="group">
                         {{ $siswa->links() }}
                    </div>
                  </div>
              </div>
              

           

        </div>
        
        
    </div>
</div>



{{-- Modal  --}}


<!-- Modal -->
<div class="modal fade" id="modal-action" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaltitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="" id="formsiswa" name="formsiswa">
            <input type="hidden" id="id_user" name="id_user">
          <hr>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"></i></span>
            </div>
            <input type="text" required id="nama" class="form-control" placeholder="Nama Lengkap" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-table"></i></span>
            </div>
            <input type="text" required id="nis" class="form-control" placeholder="Nomer Induk Siswa" aria-label="Username" aria-describedby="basic-addon1">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-door-open"></i></span>
            </div>

            <input type="text" required id="kelas" class="form-control" placeholder="Kelas" aria-label="Username" aria-describedby="basic-addon1">



           {{-- <select name="kelas" id="kelas" class="form-control">
             <option value="" disabled selected>Pilih Kelas</option>
             <option value="1">Kelas 9</option>
             <option value="2">Kelas 10</option>
             <option value="3">Kelas 11</option>
           </select> --}}
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary action"></button>
        </div>
      </form>
      </div>
    </div>
  </div>



  <script>
        $(document).ready(function () {
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        
        $("#add-data-siswa").click(function(){
          
          $(".action").html("<i class='fa fa-user'></i>" + " " + "Tambah Data");
          $(".modal-title").text("Tambah Data Siswa");
          $("#modal-action").modal("show");
          $("#formsiswa").trigger("reset");
        })
        

        $(".edit-data").click(function(){
          var id_siswa=$(this).data('id');
          $.get('siswa/'+id_siswa+'/edit', function(data){

          $(".action").html("<i class='fa fa-edit'></i>" + " " + "Edit Data");
          $(".modal-title").text("Edit Data Siswa");
          $("#id_user").val(data.userID);
          $("#username").val(data.username);
          $("#password").val(data.password);
          $("#nama").val(data.nama);
          $("#nis").val(data.nis);
          $("#kelas").val(data.kelas);
          $("#modal-action").modal("show");

          })
        });
       
        $(".info-data").click(function(){
          var id_siswa=$(this).data('id');
          $.get('siswa/'+id_siswa+'/edit', function(data){
          $("input").prop('disabled', true);
          $(".action").hide();
          $(".modal-title").text("Info Data Siswa");
          $("#id_user").val(data.userID).readonly;
          
          $("#nama").val(data.nama);
          $("#nis").val(data.nis);
          $("#kelas").val(data.kelas);
          $("#modal-action").modal("show");

          })
        });

        $(".delete-data").click(function(){
          var id_siswa=$(this).data('id');
          confirm("Yakin Bro?");

          $.ajax({
            type:"delete",
            url:"siswa"+'/'+id_siswa,
            success:function(data){
              $("#siswaID_" + id_siswa).remove();
            },
            error:function(data){
              console.log('error',data);
            }
          });

        });
});

if($("#formsiswa").length > 0){
  $("#formsiswa").validate({
      sumbithandler:function(form){
        var actionType=$(".action").val();
        $(".action").html("<i class='fa fa-spin fa-spinner'></i>" + " " + "Proccessing..");
    
    

       $.ajax({
       data:$("#formsiswa").serialize(),
        url:"{{route('siswa.store')}}",
        type: "POST",
        dataType:'json',
        success:function(data){
        var siswa = '<th id="id_siswa_' + data.userID + '"><td>'+ data.nama +'</td><td>'+ data.kelas +'</td><td>'+ data.nis +'</td>';
        siswa+= '<td><div class="btn-group mr-2" role="group" aria-label="First group"> <button type="button" class="btn btn-sm btn-primary edit-data mr-2" data-id="'+data.userID+'"> <i class="fa fa-edit"></i> </button><button type="button" class="btn btn-sm btn-info info-data mr-2" data-id="'+data.userID+'"> <i class="fa fa-info"></i> </button><button type="button" class="btn btn-sm btn-danger delete-data" data-id="'+data.userID+'"> <i class="fa fa-trash"></i> </button></div></td>';
          if(actionType == 'add-data-siswa'){
            $("#siswa-data").prepend(siswa);

          }
          else{
          $("#id_siswa_" + data.userID).replaceWith(siswa);
          }

        $("#formsiswa").trigger("reset");
        $("#modal-action").modal("close");
        $(".action").html("Simpan");
        },

        error:function(data){
        console.log('error',data);
        $(".action").html("Simpan");
      }
    
    });
      }
  });
}

  </script>



@endsection
    