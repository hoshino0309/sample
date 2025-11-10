<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TNGブログ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- ヘッダー部 -->
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-primary-subtle">
        <h3>TNGブログ</h3>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <!-- フラッシュメッセージの表示 -->
             @if(session('success'))
             <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        
            <!-- 各画面の中身 -->
             <div class="col-8">
              @yield('content')
             </div>
         </div>
    </div>
    
    <footer class=" d-flex flex-wrap justify-content-center py-3 mt-5 bg-primary-subtle">
        <!-- フッター部 -->
         <p>&copy; 2024 All Rights Reserved.</p>
    </footer>

</body>

</html>