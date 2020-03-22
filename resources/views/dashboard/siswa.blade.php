@extends('layout.app')

@section('title','Siswa')


@section('content')  

<div class="container-fluid p-5">
    <div class="row">
        <div class="form-group col-md-12">
           <h4>Siswa</h4>
           <div class="card">
            <div class="card-header">
                
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary btn-sm">
                            Jumlah Data <span class="badge badge-light">{{$siswa->count()}}</span>
                          </button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary btn-sm" id="tambah-data">
                            <i class="fa fa-user mr-2"></i>
                            Tambah Data Siswa
                          </button>
                    </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover table-responsive">
                    <thead>
                      <tr>
                        {{-- <th scope="col">No</th> --}}
                        <th scope="col">NISN</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="data-siswa">
                        @if ($siswa->count() > 0)
                        @foreach ($siswa as $s)
                        <tr id="siswa_id_{{$s->id}}">
                            {{-- <th scope="row">{{$s->id}}</th> --}}
                            <td>{{$s->nis}}</td>
                            <td>{{$s->name}}</td>
                            <td>{{$s->kelas}}</td>
                            <td class="text-center" width="1%">
                                
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <button class="btn btn-primary btn-sm edit-data" id="edit-data" data-id="{{$s->id}}" title="Edit Siswa"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-info btn-sm edit-password" id="edit-password" data-id="{{$s->id}}" title="Ganti Password"><i class="fa fa-lock"></i></button>
                                        <button class="btn btn-danger btn-sm delete-data" id="delete-data" data-id="{{$s->id}}" title="Hapus Siswa"><i class="fa fa-trash"></i></button>
                                    </div>
                                
                            </td>
                          </tr>
                          @endforeach
                        @else
                        
                        <tr>
                            
                            <td class="text-center" colspan="5">Tidak Ada Data Bro</td>
                          </tr>
                        @endif

                      


                     
                    </tbody>
                  </table>
              
            </div>
            <div class="card-footer text-muted">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                      {{$siswa->links()}}
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formsiswa" name="formsiswa">
              <input type="hidden" name="id_siswa" id="id_siswa">
              <div class="row">

                <div class="col-md-12">
                  <div class="input-group">
                      <input type="text" class="form-control" id="nis" name="nis" required placeholder="Masukkan NISN">
                      <div class="input-group-append">    
                        <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                      </div>
                </div>
                
                </div>

                  <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan Nama Siswa">
                        <div class="input-group-append">    
                          <span class="input-group-text"><i class="fa fa-users"></i></span>
                        </div>
                  </div>
                  
                </div>
              <br>
              <br>
              <br>
              <div class="col-md-12">
                <div class="input-group">
                    <select class="custom-select" id="kelas" name="kelas">
                       
                        @if ($kelas->count() > 0)
                        <option selected disabled>Pilih Kelas Siswa...</option>
                        @foreach ($kelas as $item)
                        <option value="{{$item->id}}">{{$item->kelas}}</option>
                        @endforeach
                        @else
                        <option selected disabled>Kelas Belum Dibuat</option>
                        @endif
                        
                        
                        
                      </select>
                      <div class="input-group-append">
                        <label class="input-group-text" for="kelas"><i class="fa fa-door-closed"></i></label>
                      </div>
              </div>
              <br>
              
              
              </div>
                            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-primary" id="action-button"></button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end modal --}}

  {{-- modal ganti password --}}
  <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formPass" name="formPass">
              <input type="hidden" name="id_siswa" id="idUser" value="">
              <div class="row">

                <div class="col-md-12">
                  <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan Password Baru">
                        <div class="input-group-append">    
                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                  </div>
                  
                </div>               
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-primary" id="buttonPass"></button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end modal --}}

<script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $("#tambah-data").click(function(){
            $("#modalaction").modal("show");
            $(".modal-title").text("Tambah Data");
            $("#action-button").text("Tambah Data");
        });

        $(".edit-data").click(function(){
            var siswa_id=$(this).data('id');
            $.get('siswa/'+siswa_id+'/edit',function(data){
            $("#modalaction").modal("show");
            $(".modal-title").text("Edit Data Siswa");
            $("#action-button").text("Simpan Perubahan");
            $("#name").val(data.name);
            $("#nis").val(data.nis);
            $("#kelas").val(data.id_kelas);
            });
        })

        $(".delete-data").click(function(){
            var id_siswa=$(this).data('id');
            var cek = confirm ("Apakah Anda Yakin?");
            if (cek == true) {
              $.ajax({
              type: "DELETE",
              url: "siswa/"+id_siswa,
              success: function (data) {
                  $("#siswa_id_" + id_siswa).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
              });
            } 
            

          });
          $(".edit-password").click(function(){
            var siswa_id=$(this).data('id');
            // alert(siswa_id);
            $("#modalPass").modal("show");
            $(".modal-title").text("Ganti Password");
            $("#buttonPass").text("Simpan");
            $("#idUser").val(siswa_id);
          })
    });
//     if ($("#formsiswa").length > 0) {
//       $("#formsiswa").validate({
 
//      submitHandler: function(form) {

//       var actionType = $('#action-button').val();
//       $('#action-button').html('Sending..');

      
//       $.ajax({
//           data: $('#formsiswa').serialize(),
//           url: "siswa.store",
//           type: "POST",
//           dataType: 'json',
//           success:function (data){
//              
//               if (actionType == "tambah-data") {
//                   $('#siswa_id').prepend(post);
//               } else {
//                   $("#siswa_id_" + data.id).replaceWith(post);
//               }
 
//               $('#formsiswa').trigger("reset");
//               $('#modalaction').modal('hide');
//               $("#action-button").text("Tambah Data");

//           },
//           error: function (data) {
//               console.log('Error:', data);
//               $("#action-button").text("Tambah Data");
//           }
//         });
//     }
//   });
// }


if ($("#formsiswa").length > 0) {
      $("#formsiswa").validate({
 
     submitHandler: function(form) {

      var actionType = $('#action-button').val();
      $('#action-button').html('Sending..');

      data= $('#formsiswa').serialize();
      // alert(data);
      $.ajax({
          data: $('#formsiswa').serialize(),
          url: "{{ route('siswa.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            // alert(data);
            console.log(data);
            // var siswa='<tr id="siswa_id_'+data.id+'"><th scope="row">'+ data.id +'</th><td>'+ data.nis +'</td><td>'+ data.name +'</td><td>'+ data.kelas +'</td>';
            //  siswa+='<td class="text-center" width="1%"><div class="btn-group mr-2" role="group" aria-label="First group"><button class="btn btn-danger btn-sm" id="delete-data" data-id="'+ data.id +'"><i class="fa fa-trash"></i></button><button class="btn btn-primary btn-sm" id="edit-data" data-id="'+ data.id +'"><i class="fa fa-pen"></i></button></div></td></tr>';
               
              
            //   if (actionType == "tambah-data") {
            //       $('#siswa_id').prepend(post);
            //   } else {
            //       $("#siswa_id_" + data.id).replaceWith(post);
            //   }
              $('#formsiswa').trigger("reset");
              $('#modalaction').modal('hide');
              $("#action-button").text("Tambah Data");
              location.reload();
          },
          error: function (data) {
              // alert(data->responseText);
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
if ($("#formPass").length > 0) {
      $("#formPass").validate({
 
     submitHandler: function(form) {

      var actionType = $('#buttonPass').val();
      $('#buttonPass').html('Sending..');

      data= $('#formPass').serialize();
      alert(data);
      $.ajax({
          data: $('#formPass').serialize(),
          url: "{{ route('siswa.gantipass') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            // alert(data);
            console.log(data);
            // var siswa='<tr id="siswa_id_'+data.id+'"><th scope="row">'+ data.id +'</th><td>'+ data.nis +'</td><td>'+ data.name +'</td><td>'+ data.kelas +'</td>';
            //  siswa+='<td class="text-center" width="1%"><div class="btn-group mr-2" role="group" aria-label="First group"><button class="btn btn-danger btn-sm" id="delete-data" data-id="'+ data.id +'"><i class="fa fa-trash"></i></button><button class="btn btn-primary btn-sm" id="edit-data" data-id="'+ data.id +'"><i class="fa fa-pen"></i></button></div></td></tr>';
               
              
            //   if (actionType == "tambah-data") {
            //       $('#siswa_id').prepend(post);
            //   } else {
            //       $("#siswa_id_" + data.id).replaceWith(post);
            //   }
              $('#formsiswa').trigger("reset");
              $('#modalaction').modal('hide');
              $("#action-button").text("Tambah Data");
              location.reload();
          },
          error: function (data) {
              // alert(data->responseText);
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
@endsection
    