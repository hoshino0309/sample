@extends('app')

@section('title', 'ブログ詳細')

@section('content')
<div class="container">
    <h1>ブログ詳細</h1>
    <div class="container">
        <h2>{{ $blog->title }}</h2>
        <p>{{ $blog->content }}</p>
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid">
        @endif
        <p>{{ $blog->created_at->format('Y-m-d') }}</p>
        
    </div>

    <a href="{{ route('edit', $blog->id) }}" class="btn btn-primary">更新する</a>
    <a href="{{ route('index') }}" class="btn btn-secondary">一覧へ戻る</a>

</div>
@endsection