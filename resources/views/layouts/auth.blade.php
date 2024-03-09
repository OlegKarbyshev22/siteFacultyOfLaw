<form action="{{route('auth')}}" method="POST">
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit">
</form>
