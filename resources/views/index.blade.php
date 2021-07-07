@include('inc.header')


        <div class="container">
            <div class="row">
                <div class="col"> <h2>Kitaplar</h2></div>
                <div class="col">@auth<a href="{{route('add_book')}}" class="btn btn-success" style="float: right">Kitap Ekle</a>@endauth</div>
            </div>


            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Kitap Adı</th>
                    <th>Yazar</th>
                    <th>Kapak Kapağı</th>
                    <th>İsbn</th>
                    <th>Eylem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->author}}</td>
                    <td><img width="90" src="{{asset('uploads/'.$book->cover)}}" alt=""></td>
                    <td>{{$book->isbn}}</td>
                    <td>@auth<a href="">Düzenle </a><a href=""> Sil</a>@endauth</td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>



@include('inc.footer')
