<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
    <div class="controls-top">
        <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
        <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
    </div>

    <ol class="carousel-indicators">
        <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
        @for($i=1;$i<sizeof($lastProducts);$i++)
            <li data-target="#carousel-example-multi" data-slide-to="{{$i}}"></li>
        @endfor
    </ol>

    <div class="carousel-inner v-2" role="listbox">
        <?php $count=0;?>
        @foreach($lastProducts as $lastOne)
            <?php  $count++; ?>
            <div class="carousel-item {{$count==1? 'active' : ''}}">
                <div class="col-12 col-md-4">
                    <div class="card mb-2">
                        <img class="card-img-top" src="{{url('images',$lastOne->image)}}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                            <a class="btn btn-primary btn-md btn-rounded">Button</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
