<form action="/sendCode" method="POST">
	{{csrf_field()}}
	<input type="text" name="num" placeholder="Enter Code">
	<input type="hidden" name="id" value="{{$id}}">
	<input type="submit" name="submit">
</form>