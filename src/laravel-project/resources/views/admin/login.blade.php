<div>
     <form method="POST" action="/admin/login">
        @csrf
        @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" required />
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="text" name="password" id="password" required />
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
</div>