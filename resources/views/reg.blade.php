<form action="{{route('reg')}}" method="post">
    @csrf
    <label for="email">email</label>
    <input type="email" name="email" id="">
    <label for="pw">pw</label>
    <input type="text" name="password" id="">
    <label for="role">role</label>
    <input type="text" name="role" id="">
    <button type="submit">sub</button>
</form>


<div class="wrap">
    <div class="contributor" width="240px" height="240px">
        <a href="https://www.github.com/3rg0u"><img src="https://avatars.githubusercontent.com/u/103344956?v=4"
                alt=""></a>
    </div>
</div>