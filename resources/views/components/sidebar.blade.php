<div class="sidebar w-30">
    <ul>
        <li><a href="{{ route('dashboard') }}">ホーム</a></li>
        <li><a href="{{ route('mypage.index', ['user_id' => Auth::id() ]) }}">マイページ</a></li>
        <li><a href="{{ route('profile.edit') }}">設定</a></li>
    </ul>
</div>
