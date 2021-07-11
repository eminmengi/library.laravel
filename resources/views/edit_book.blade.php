@include('inc.header')
<div class="container">

    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form method="post" action="{{route('update_book',['id'=>$book->id])}}"  enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Kitap Adı</label>
            <input name="name" type="text" value="{{ $book->name }}" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Yazar</label>
            <input name="author" type="text"  value="{{ $book->author }}" class="form-control" id="author">
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">İsbn</label>
            <input name="isbn" type="text"  value="{{ $book->isbn }}" class="form-control" id="isbn">
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Kitap Kapağı</label>
            <img src="{{asset('uploads/'.$book->cover)}}" width="90">

            <input type="file" name="file" class="form-control" id="cover">
        </div>


        <button type="submit" class="btn btn-primary">Kitap Düzenle</button>
        <a href="/" class="btn btn-success" >Kitaplar</a>
    </form>
</div>

@include('inc.footer')
