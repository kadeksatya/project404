@extends('layout.app')

@section('title','Profile')


@section('content')

<section class="content">
@if (!empty(session('sukses')))
<div class="alert-sukses"></div>
@endif
@if (!empty(session('error')))
<div class="alert-gagal"></div>
@endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    @if (!empty(session('userIMG')))
                    <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('asset/img/logo.png')}}"
                       alt="User profile picture">
                    
                    @else
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{asset('asset/img/logo.png')}}"
                        alt="User profile picture">
                    @endif
                  
                </div>

                <h3 class="profile-username text-center">{{$profile->name}}</h3>

                <p class="text-muted text-center">{{$profile->nis}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b class="text-muted">Username :</b> <a class="float-right"><strong>{{$akun->username}}</strong></a>
                  </li>
                  {{-- <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li> --}}
                </ul>
                <button class="btn btn-md btn-sm btn-primary btn-block" id="edit-foto" data-id="{{$profile->id}}" title="Ubah Foto"><b>Ubah Foto</b></button>
                <button class="btn btn-md btn-sm btn-info btn-block" id="edit-password" data-id="{{$akun->id}}" title="Ubah Password"><b>Ubah Password</b></button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
 
                    {{-- <form class="form-horizontal"> --}}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label text-muted">Nama :</label>
                        <div class="col-sm-10">
                            <label class="col-form-label">
                                {{$profile->name}}
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label text-muted">NISN :</label>
                        <div class="col-sm-10">
                            <label class="col-form-label">
                                {{$profile->nis}}
                            </label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label text-muted">Kelas :</label>
                        <div class="col-sm-10">
                            <label class="col-form-label">
                                {{$profile->kelas}}
                            </label>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="button" class="btn btn-secondary" id="edit-profile" data-id="{{$profile->id}}" title="Edit Profile">Edit Profile</button>
                        </div>
                      </div>
                    {{-- </form> --}}

              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</section>

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
              <input type="hidden" name="id_user" id="id_user" value="">
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
          <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
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

        $(".tombolClose").click(function(event){
          // alert("weee");
          $('#formsiswa').trigger("reset");
          // $("#name").val("");
          // $("#nis").val("");
          // $("#kelas").val("");
          $('#modalaction').modal('hide');
          })

        $("#tambah-data").click(function(){
            $("#modalaction").modal("show");
            $(".modal-title").text("Tambah Data");
            $("#action-button").text("Tambah Data");
        });

        $("#edit-data").click(function(){
          
            var siswa_id=$(this).data('id');
            $.get('siswa/'+siswa_id+'/edit',function(data){
              var id_kelas = document.getElementById("id_kelas");
              var options = id_kelas.options;
              kelas_id = data.id_kelas;
              for (var i = 0; i < options.length; i++) {
                if (options[i].value == kelas_id) {
                  id_kelas.selectedIndex = i;
                  }
              }
            $("#id_siswa").val(data.id);
            $("#id_users").val(data.id_users);
            $("#name").val(data.name);
            $("#nis").val(data.nis);
            $("#kelas").val(data.id_kelas);

            $("#modalaction").modal("show");
            $(".modal-title").text("Edit Data Siswa");
            $("#action-button").text("Simpan Perubahan");
            
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
                console.log(data);
                  $("#siswa_id_" + id_siswa).remove();
                  alert("berhasil");
                  location.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
              });
            } 
            

          });
          $("#edit-password").click(function(){
            var siswa_id=$(this).data('id');
            // alert(siswa_id);
            $("#modalPass").modal("show");
            $(".modal-title").text("Ganti Password");
            $("#buttonPass").text("Simpan");
            $("#id_user").val(siswa_id);
          })
    });



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
            alert("Berhasil");
            console.log(data);
            // toastr.success("Berhasil");
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
              alert("Upss! Ada Error");
              console.log('Error:', data);
              // toastr.error("Upss! Ada Error");
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
      // alert(data);
      $.ajax({
          data: $('#formPass').serialize(),
          url: "{{ route('siswa.gantipass') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            // alert(data);
            console.log(data);
            alert('berhasil')
            // toastr.success("Ubah Password Berhasil");
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
              // toastr.error("Upss! Ada Error");
              alert("Upss! Ada Error");
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
@endsection
