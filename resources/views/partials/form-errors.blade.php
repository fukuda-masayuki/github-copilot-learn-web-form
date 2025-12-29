@if ($errors->any())
    <section>
        <p>入力内容にエラーがあります。</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif
