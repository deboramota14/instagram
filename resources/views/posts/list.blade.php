@extends('layouts.app')


@section('content')

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           @foreach ($posts as $post)

               <div class="card mt-4">

                   <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                   <div class="card-body">{{$post->description}}</div>
                   @if (isset($comments))
                    @foreach ($comments as $comment)
                    @if($comment->id_post==$post->id)
                    <form method="POST" action="/comment/excluir/{{$comment->id}}">
                        @csrf
                        <p>{{$comment->comment}}</p>
                        <button type="submit" class="btn btn-outline-danger">Apagar comentário</button>
                    </form>
                    @endif
                    @endforeach
@endif
                    <form method="POST" action="/comment/comentar/{{$post->id}}">

                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment" type="text" placeholder="Comente sobre..." rows="1" ></textarea>
                            <button type="submit" class="btn btn-outline-primary">Comentar</button>
                            <p> Likes: {{$post->likes}} </p>
                            <a class="btn btn-outline-success" href="{{route('like', ['id' => $post->id])}}">Curtir</a>
                            <a class="btn btn-outline-danger" href="{{route('deslike', ['id' => $post->id ])}}">Deixar de curtir</a>

                        </div>

                    </form>
                </div>   
                

               </div>   

            @endforeach

       </div>

   </div>

</div>

@endsection