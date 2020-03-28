
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
                 <button type="submit">DELETE</button>
                </form>
                <br>
              @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
