@include('inc.header')

<div class="container">
    <div class="col col-form-label-lg alert-link"> <h2>Kitap Detay</h2><br><br></div>
    <div class="row">
        <div class=" border-2 "></div>

        <div class="col-md-6 " >
            <img class="float-" width="400" src="{{asset('uploads/'.$book->cover)}}">

        </div>
        <br>
        <br>
        <div class="col-md-6 ">
            <div class="accordion" id="accordionExample" >
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Kitap Adı
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>{{$book->name}}</strong>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Kitap Yazarı
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>{{$book->author}}</strong>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            İSBN
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>{{$book->isbn}}</strong>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/" class="btn btn-success float-end">Kitaplar</a>

        </div>
    </div>
</div>

@include('inc.footer')
