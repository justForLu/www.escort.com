@extends('home.layout.base')

@section('content')
    <div class="header header-title">
        <a class="back" href="javascript:history.back();">
            <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <p>{{$article->title}}</p>
    </div>
    <section class="main-contain bg-white" style="padding: 40px 0px;">
        <div class="container">
            <div class="row">
                <?php echo $article->content ?>
            </div>
        </div>
    </section>
@endsection