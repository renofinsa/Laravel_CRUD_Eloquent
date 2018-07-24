@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          @foreach ($berita as $a)
            <div class="col-md-8" style="margin-bottom : 10px">
                <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-8">
                          <h4>{{ $a->users->name }}</h4>
                          {{ $a->judul}} <span style="color : red"><b>({{$a->kategori->kategori}})</b></span></p>

                        </div>
                        <div class="col-md-4">
                          <button  data-toggle="modal" data-target="#ubah{{$a->id}}" class="btn btn-info" style="margin : 1px; float : right" type="button" name="button">Ubah</button>
                          <button  data-toggle="modal" data-target="#hapus{{$a->id}}" class="btn btn-danger" style="margin : 1px; float : right" type="button" name="button">Hapus</button>
                        </div>

                      </div>
                          <p style="text-align: right">{{ $a->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="card-body">
                      {{ $a->isi}}
                    </div>
                </div>
            </div>



            <!-- Modal hapus -->
    <div id="ubah{{$a->id}}" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{ $a->judul}}</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">

            <form class="" action="{{ route('berita.update', $a->id) }}" method="post">
              @csrf
              <input type="hidden" name="_method" value="PATCH">
              <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="judul" value="{{ $a->judul}}">
              </div>
              <div class="form-group">
                <label for="">Kategori</label>
                <select name="idkategori" class="form-control">
                  <option value="{{ $a->id_kategori}}">{{ $a->kategori->kategori}}</option>
                  @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->kategori}}</option>
                  @endforeach


                </select>
              </div>
              <div class="form-group">
                <label for="">Isi</label>
                <textarea name="isi" class="form-control" rows="8" cols="80">{{ $a->isi}}</textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="submit" class="btn btn-info form-control">
              </div>
            </form>

            </form>
          </div>
        </div>

      </div>
    </div>

            <!-- Modal hapus -->
    <div id="hapus{{$a->id}}" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{ $a->judul}}</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                  </div>
                </div>

                <div class="col-md-6">
                  <form class="" action="{{ route('berita.destroy', $a->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                  <div class="form-group">
                    <input type="submit" name="submit" value="Hapus" class="btn btn-info form-control">
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>






          @endforeach












        <!-- Modal tambah -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Buat Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <form class="" action="{{ route('berita.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="judul" value="">
          </div>
          <div class="form-group">
            <label for="">Kategori</label>
            <select name="idkategori" class="form-control">
              <option value="0">Pilih Kategori</option>
              @foreach ($kategori as $kat)
                <option value="{{ $kat->id }}">{{ $kat->kategori}}</option>
              @endforeach


            </select>
          </div>
          <div class="form-group">
            <label for="">Isi</label>
            <textarea name="isi" class="form-control" rows="8" cols="80"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="submit" class="btn btn-info form-control">
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
    </div>
</div>
@endsection
