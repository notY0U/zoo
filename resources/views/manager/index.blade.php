
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">MANAGER</div>

               <div class="card-body">
                @foreach ($managers as $manager)
                <a href="{{route('manager.edit',[$manager])}}">{{$manager->name}} {{$manager->surname}} {{ $manager->manageSpecie->name}}</a>
                <form method="POST" action="{{route('manager.destroy', [$manager])}}">
                    @csrf
                    <button type="submit" style="diplay:block; width:100%;">DELETE</button>
                    <a style="color: black; text-decoration: none;" href="{{route('manager.pdf',[$manager])}}">[PDF]</a>
                </form>
                <br>
              @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
