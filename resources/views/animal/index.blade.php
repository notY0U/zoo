
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ANIMAL</div>

               <div class="card-body">
                @foreach ($animals as $animal)
                <a href="{{route('animal.edit',[$animal])}}">{{$animal->name}} {{$animal->yob}}-
                   Species: {{$animal->species->name}}-
                   Manager: {{ $animal->animalMan->name}}</a>
                <form method="POST" action="{{route('animal.destroy', [$animal])}}">
                 @csrf
                 <button type="submit" style="diplay:block; width:100%;">DELETE</button>
                </form>
                <br>
              @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
