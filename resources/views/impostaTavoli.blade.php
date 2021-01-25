@extends('layouts.app')

@section('content')

@auth
<form action="{{route('tavoliPost')}}" method="post">
 @csrf
 @method('post')

 <label for="desks">Numero Tavoli</label>
<input type="number" name="desks" id="">

<button class="btn btn-danger" type="submit">Crea Tavoli</button>
</form>

   
@endauth

@endsection