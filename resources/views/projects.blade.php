@extends('layouts.master')
@section('content')

    <div class="col-lg-12">
        <div style='margin-top: 20px; margin-bottom: 40px;'>
            Категория
            <select class="custom-select tupafleximesketituu" id="inputGroupSelect01" onchange='flex()'>
                    <option value="">Все</option>
                    @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
            </select>
        </div>
        @foreach($problems as $problem)
            <div class='project'>
                <h1 class="mt-4"><a href='/project/{{$problem->id}}'>{{$problem->title}}</a></h1>
                <a href="/projects/{{$problem->category->name}}">{{$problem->category->name}}</a>
                <p class="lead">
                by
                {{$problem->employer->email}}
                </p>

                <hr>
                <p>{{$problem->created_at->diffForHumans()}}</p>

                <img class="img-fluid rounded" src="{{$problem->image}}" alt="">

                <hr>
                <p class="lead">{{$problem->demands}}</p>
            </div>
        @endforeach
    </div>
    <script type='text/javascript'>
        let getCookie = function(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  } 
            if(getCookie('flex')){
                document.querySelector('.tupafleximesketituu').value = getCookie('flex');
            }
        function flex(){
            let tupaflex = document.querySelector('.tupafleximesketituu').value;
            setCookie('flex', tupaflex);
            window.location.replace("/projects/" + tupaflex);
        }
        </script>
@endsection