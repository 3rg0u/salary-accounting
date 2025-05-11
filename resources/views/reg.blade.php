<form action="{{route('reg')}}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" name="email" id="">
    <label for="pw">pw</label>
    <input type="text" name="pw" id="">
    <label for="role">role</label>
    <input type="text" name="role" id="">
    <button type="submit">sub</button>
</form>