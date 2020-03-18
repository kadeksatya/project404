@extends('layout.app')

@section('title','Home Page')

@section('content')



  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="{{asset('asset/photo/buleleng.jpeg')}}">
      </div>
      <a href="#user"><img class="circle" src="{{asset('asset/photo/IMG_9248.JPG')}}" width="150" height="50"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!" data-target="modal2" class="btn modal-trigger">Edit Profile</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger btn">Show Menus</a>
<hr>



<div class="row">
    
    <div class="col s3">

  <div class="row">
    <div class="col s12 m12">
      <div class="card-panel">
        <!-- Modal Trigger -->
        <button data-target="modal1" class="btn modal-trigger">Add Pelajaran</button>
        
      </div>
    </div>
  </div>
    </div>
    <div class="col s9">
        <div class="col s12 m9">
           
            <div class="card horizontal">
              
              <div class="card-stacked">
                  
                <div class="card-content">
                    <table>
                        <thead>
                          <tr>
                              <th>Name</th>
                              <th>Item Name</th>
                              <th>Item Price</th>
                          </tr>
                        </thead>
                    
                        <tbody>
                          <tr>
                            <td>Alvin</td>
                            <td>Eclair</td>
                            <td>$0.87</td>
                          </tr>
                          <tr>
                            <td>Alvin</td>
                            <td>Eclair</td>
                            <td>$0.87</td>
                          </tr>
                          <tr>
                            <td>Alvin</td>
                            <td>Eclair</td>
                            <td>$0.87</td>
                          </tr>
                          <tr>
                            <td>Alvin</td>
                            <td>Eclair</td>
                            <td>$0.87</td>
                          </tr>
                          <tr>
                            <td>Alan</td>
                            <td>Jellybean</td>
                            <td>$3.76</td>
                          </tr>
                          <tr>
                            <td>Jonathan</td>
                            <td>Lollipop</td>
                            <td>$7.00</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                  </ul>
              </div>
            </div>
          </div>
    </div>
  </div>
 
  

  {{-- Modal --}}

    <!-- Modal Structure -->
    <div id="modal2" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h5>Edit Profile</h5>
        <hr>
        <div class="row">
            
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12 m6">
                  <select class="icons">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">IX</option>
                    <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">X</option>
                    <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">XI</option>
                  </select>
                  <label>Pilih Kelas</label>
                </div>
                
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input  id="review" type="text" class="validate">
                <label for="review">Masukkan NIS Siswa</label>
              </div>
              <div class="input-field col s12">
                <input  id="disabled" type="text" class="validate">
                <label for="disabled">Masukkan Nama Siswa</label>
              </div>
              
                
                </div>
               
            </div>
            
         
           
          </form>
        </div>
      
      <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-red btn">Close  <i class="material-icons left">close</i></a>
        <a href="#!" class="modal-close waves-effect waves-green btn">Save <i class="material-icons left">send</i></a>
      </div>
    </div>
{{-- End Modal --}}




  {{-- Modal --}}

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h5>Keterangan</h5>
          <hr>
          <div class="row">
              
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12 m6">
                    <select class="icons">
                      <option value="" disabled selected>Choose your option</option>
                      <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">Buku Buleleng</option>
                      <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">Buku Terjalin</option>
                      <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">Buku Jomblo</option>
                    </select>
                    <label>Pilih Kategory</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Masukkan data Buku</label>
                  </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input  id="disabled" type="text" class="validate">
                  <label for="disabled">Halaman yang dibaca</label>
                </div>
                <div class="input-field col s12">
                    <input  id="review" type="text" class="validate">
                    <label for="review">Review Singkat</label>
                  </div>
                  <div class="input-field col s12">
                    <input  id="komen" type="text" class="validate">
                    <label for="komen">Komentar Dan Saran</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <select class="icons">
                      <option value="" disabled selected>Choose your option</option>
                      <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">Buk risma</option>
                      <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">Pak Kon</option>
                      <option value="" data-icon="{{asset('asset/photo/buleleng.jpeg')}}">Pak Tol</option>
                    </select>
                    <label>Guru Pedamping</label>
                  </div>
              </div>
              
           
             
            </form>
          </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-red btn">Close  <i class="material-icons left">close</i></a>
          <a href="#!" class="modal-close waves-effect waves-green btn">Save <i class="material-icons left">send</i></a>
        </div>
      </div
{{-- End Modal --}}

@endsection
    
