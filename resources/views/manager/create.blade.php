
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">MANAGER</div>

               <div class="card-body">
                <form method="POST" action="{{route('manager.store')}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="manager_name" class="form-control" 
                        value="{{old('manager_name')}}">
                        <small class="form-text text-muted">Manager name</small>
                      </div>
                      <div class="form-group">
                        <label>Surname</label>
                         <input type="text" name="manager_surname" class="form-control"
                          value="{{old('manager_surname')}}">
                        <small class="form-text text-muted">Manager surname</small>
                      </div>
                      <label>Species:</label>
                      <div class="form-group">
                    <select name="specie_id">
                        @foreach ( $species as $specie )
                            <option value="{{$specie->id }}">{{$specie->name }} </option>
                        @endforeach
                 </select>
                 <small class="form-text text-muted">Select species</small>
                 <br>
                 <button type="submit" style="diplay:block; width:100%;">ADD</button>
                      </div>
                    @csrf
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
