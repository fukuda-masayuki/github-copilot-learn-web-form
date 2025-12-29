@if ($errors->any())
    <section class="rounded-lg border border-red-200 bg-red-50 p-4">
        <p class="font-medium text-red-900">入力内容にエラーがあります。</p>
        <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-800">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif
