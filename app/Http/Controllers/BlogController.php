<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // 一覧画面表示
    public function index()
    {
        // ブログデータを全て取得
        $blogs = Blog::all();

        //ビューにデータを渡す
        return view('index', compact('blogs'));
    }

    // 新規投稿画面を表示
    public function create()
    {
        return view('create');
    }

    // 投稿データを保存
    public function store(BlogRequest $request)
    {
    // バリデーション
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // 画像ファイルの処理
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath; // ← 修正済み
    }

    // 投稿データを保存
    Blog::create($validatedData);

    // リダイレクト
    return redirect()->route('index')->with('success', 'ブログが投稿されました');
    }

    // 詳細画面を表示
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('detail', compact('blog'));
    }

    // 更新画面の表示
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('edit', compact('blog'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        // 画像がアップロードされた場合
        if ($request->hasFile('image')) {
            // 既存の画像を削除
            if ($blog->image) {
                Storage::delete('public/' . $blog->image);
            }
            
            // 画像を保存
            $imagePath = $request->file('image')->store('images', 'public');
            $blog->image = $imagePath;
        }
        
        $blog->save();
        
        return redirect()->route('detail', $id)
            ->with('success', '記事が更新されました');
    }
}