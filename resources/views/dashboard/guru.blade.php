@extends('layout.app')

@section('title','Guru')


@section('content')  

<div class="container-fluid p-5">
    <div class="row">
        <div class="form-group col-md-12">
           <h4>Guru</h4>
           <div class="card">
            <div class="card-header">
                
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary btn-sm">
                            Jumlah Data <span class="badge badge-light">9</span>
                          </button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary btn-sm" id="tambah-data">
                            <i class="fa fa-user mr-2"></i>
                            Tambah Data Guru
                          </button>
                    </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover ">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">No Induk Pegawai</th>
                        <th scope="col">Id_user</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="data-siswa">
                        <tr>
                          <td>1</td>
                          <td>Kadek Satya</td>
                          <td>123452338</td>
                          <td>123</td>
                          <td class="text-center" width="1%">
                                
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button class="btn btn-danger btn-sm" id="delete-data" data-id=""><i class="fa fa-trash"></i></button>
                                <button class="btn btn-primary btn-sm" id="edit-data" data-id=""><i class="fa fa-pen"></i></button>
                            </div>
                        
                    </td>
                        </tr>
                      


                     
                    </tbody>
                  </table>
              
            </div>
            <div class="card-footer text-muted">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                      {{-- {{$siswa->links()}} --}}
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
          <form id="formguru" name="formguru">
              <input type="hidden" name="id_guru" id="id_guru">
              <div class="row">
                  <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan Nama Guru">
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
                    <input type="text" class="form-control" id="nip" name="nip" required placeholder="Masukkan No Induk Pegawai">
                    <div class="input-group-append">    
                      <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                    </div>
              </div>
              
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

//         $("#edit-data").click(function(){
//             var siswa_id=$(this).data('id');
//             $.get('siswa/'+siswa_id+'/edit',function(data){
//             $("#modalaction").modal("show");
//             $(".modal-title").text("Edit Data Siswa");
//             $("#action-button").text("Simpan Perubahan");
//             $("#name").val(data.id);
//             $("#nis").val(data.nis);

//             });
//         })

//         $("#delete-data").click(function(){
//             var id_siswa=$(this).data('id');
//             confirm ("Kamu Yakin Bro?");

//             $.ajax({
//             type: "DELETE",
//             url: "siswa/"+id_siswa,
//             success: function (data) {
//                 $("#siswa_id_" + id_siswa).remove();
//             },
//             error: function (data) {
//                 console.log('Error:', data);
//             }
//         });

//         });
    });



// if ($("#formsiswa").length > 0) {
//       $("#formsiswa").validate({
 
//      submitHandler: function(form) {

//       var actionType = $('#action-button').val();
//       $('#action-button').html('Sending..');

      
//       $.ajax({
//           data: $('#formsiswa').serialize(),
//           url: "{{ route('siswa.store') }}",
//           type: "POST",
//           dataType: 'json',
//           success: function (data) {
//             var siswa='<tr id="siswa_id_'+data.id+'"><th scope="row">'+ data.id +'</th><td>'+ data.name +'</td><td>'+ data.id_kelas +'</td><td>'+ data.nis +'</td>';
//              siswa+='<td class="text-center" width="1%"><div class="btn-group mr-2" role="group" aria-label="First group"><button class="btn btn-danger btn-sm" id="delete-data" data-id="'+ data.id +'"><i class="fa fa-trash"></i></button><button class="btn btn-primary btn-sm" id="edit-data" data-id="'+ data.id +'"><i class="fa fa-pen"></i></button></div></td></tr>';
               
              
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
//               $('#btn-save').html('Save Changes');
//           }
//       });
//     }
//   })
// }
</script>
@endsection
    