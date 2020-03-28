
 
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">ANIMAL</div>
               <div class="card-body">
                <form method="POST" action="{{route('animal.update', [$animal])}}">
                    <div class="form-group">
                        <label>Name</label>
                 <input type="text" name="animal_name" class="form-control" value="{{old('animal_name', $animal->name)}}">
                        <small class="form-text text-muted">Animal name</small>
                      </div>
                      <div class="form-group">
                    <select name="specie_id">
                        @foreach ($species as $specie)
                        <option value="{{$specie->id }}" @if($specie->id == $animal->specie_id) selected @endif>
                            {{$specie->name }} 
                        </option>
                        @endforeach
                </select>
                <small class="form-text text-muted">Select species</small>
                      </div>
                      <div class="form-group">
                        <label>Birth year</label>
                    <input type="text" name="animal_yob"  class="form-control" value="{{old('animal_yob', $animal->yob)}}">
                    <small class="form-text text-muted">Edit birth year</small>
                      </div>
                      <div class="form-group">
                        <label>Animal book</label>
                   <textarea name="animal_animal_book" class="form-control" id="summernote" >{{$animal->animal_book}}</textarea>
                   <small class="form-text text-muted">About animal</small>
                </div>
                <div class="form-group">
                    <select name="manager_id">
                        @foreach ( $managers as $manager )
                            <option value="{{$manager->id }}" @if($manager->id == $animal->manager_id) selected @endif>
                                {{$manager->name }} {{$manager->surname }} ({{ $manager->manageSpecie->name}})</option>
                        @endforeach
                 </select>
                 <small class="form-text text-muted">Select manager</small>
                 <br><button type="submit">EDIT</button>
                </div>
                    @csrf
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
@endsection
