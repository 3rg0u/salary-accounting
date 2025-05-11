<form action="{{route('signin')}}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" name="email" id="">
    <label for="pw">pw</label>
    <input type="text" name="password" id="">
    <button type="submit">sub</button>
</form>