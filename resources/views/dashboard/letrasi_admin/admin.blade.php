@extends('layout.app')

@section('title','Letrasi')


@section('content')  

<div class="container-fluid p-5">
    <div class="row">
        <div class="form-group col-md-12">
           <h4>Letrasi</h4>
           <div class="card">
            <div class="card-header">
                
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary btn-sm">
                            Jumlah Data <span class="badge badge-light">{{$data->count()}}</span>
                          </button>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-primary btn-sm" id="tambah-data">
                            <i class="fa fa-book mr-2"></i>
                            Tambah Data Letrasi
                          </button>
                    </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover ">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Jam</th>
                       
                        
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="data-siswa">
                       @if ($data->count() > 0)
                       @foreach ($data as $item)

                       <tr class="text-center">
                        <td>{{$item->id}}</td>
                        <td>{{$item->id_siswa}}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->tanggal}}</td>
                        

                        
                        <td class="text-center" width="1%">
                              
                          <div class="btn-group mr-2" role="group" aria-label="First group">
                              <button class="btn btn-danger btn-sm" id="delete-data" data-id=""><i class="fa fa-trash"></i></button>
                              <button class="btn btn-primary btn-sm" id="edit-data" data-id=""><i class="fa fa-pen"></i></button>
                          </div>
                      
                  </td>
                      </tr>
                       @endforeach
                           
                       @else
                       <tr>
                        <td colspan="6"> <p class="alert text-center">Tidak Ada Data Bro</p></td>
                      </tr>
                       @endif
                      


                     
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
              <input type="hidden" name="id_letrasi" id="id_letrasi">
             
              <div class="row">
                  <div class="col-md-12">
                    <div class="input-group">
                        <select name="id_siswa" id="id_siswa" class="form-control">
                         
                            {{-- @foreach ($item->siswa as $s) --}}
                            <option value="" selected disabled>Pilih Nama Siswa..</option>
                            {{-- <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach --}}
                              
                        
                              <option value="" selected disabled>Data Siswa Belum Ada</option>
                      
                        </select>
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
                    <select name="id_siswa" id="id_guru" class="form-control">
                     
                        {{-- @foreach ($item->dataguru as $s) --}}
                        <option value="" selected disabled>Pilih Nama Guru..</option>
                        {{-- <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach --}}
                          
                     
                          <option value="" selected disabled>Data Guru Belum Ada</option>
                      
                    </select>
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
                    <input type="text" class="form-control" id="judulbuku" name="judulbuku" required placeholder="Masukkan Judul Buku">
                    <div class="input-group-append">    
                      <span class="input-group-text"><i class="fa fa-book"></i></span>
                    </div>
              </div>
              
          </div>
          <br>
          <br>
          <br>
          
          <div class="col-md-12">
            <div class="input-group">
                <input type="text" class="form-control" id="halaman" name="halaman" required placeholder="Masukkan Halaman Buku">
                <div class="input-group-append">    
                  <span class="input-group-text"><i class="fa fa-book-open"></i></span>
                </div>
          </div>
          
      </div>
      <br>
          <br>
          <br>
          
          <div class="col-md-12">
            <div class="input-group">
               <textarea name="review" id="review" cols="30" rows="2" class="form-control" placeholder="Review Buku"></textarea>
          </div>
          
      </div>
     <br>
     <br>
     <br>
     <br>
          
          <div class="col-md-12">
            <div class="input-group">
               <textarea name="ket" id="ket" cols="30" rows="2" class="form-control" placeholder="Keterangan Buku"></textarea>
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
    