
 @extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">SPECIES</div>

               <div class="card-body">
                <form method="POST" action="{{route('specie.store')}}">
                    <div class="form-group">
                        <label>Species</label>
                    <input type="text" name="specie_name"  class="form-control" value="{{old('specie_name')}}">
                           <small class="form-text text-muted">Species name</small>
                         </div>
                    @csrf
                    <button type="submit">ADD</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
