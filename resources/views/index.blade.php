@include('inc.header')


        <div  class="container mt-20">
            <div class="row">
                <div class="col col-form-label-lg"> <h2>Kitaplar</h2></div>
                <div class="col">@auth<a href="{{route('add_book')}}" class="btn btn-success" style="float: right">Kitap Ekle</a>@endauth</div>
            </div>

            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

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
                    <td><img width="120" src="{{asset('uploads/'.$book->cover)}}" alt=""></td>
                    <td>{{$book->isbn}}</td>
                    <td>@auth
                            <a class="alert alert-success sm:block small " href="{{route('edit_book',['id'=>$book->id])}}" >Düzenle</a>
                            <form action="{{route('delete_book',['id'=>$book->id])}}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button style="text-align: left;width: 100%;" class="alert alert-danger sm:block small" type="submit" >Sil</button>
                            </form>
                        @endauth
                        <a class="alert alert-secondary sm:block small" href="{{route('detail_book',['id'=>$book->id])}}" >Detay</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>



@include('inc.footer')
