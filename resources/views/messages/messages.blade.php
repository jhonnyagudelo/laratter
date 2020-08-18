{{-- base para mostrar mensages --}}
<img src=" {{$message->get_image}} " alt="" class="img-thumbnail">
<p class="card-text">
    <div class="text-mited" > 
        Escrito por <a href=" /{{$message->user->username}} "> {{$message->user->name}}</a> 
    </div>
    {{$message->content}}
<a href="/messages/{{$message->id}}">Leer más</a>
</p>
<div class="card-text text-muted float-right">
    {{$message->created_at}}
</div>