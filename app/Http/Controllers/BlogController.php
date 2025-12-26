<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $q = BlogPost::where('is_active', true)->orderByDesc('published_at');
        if ($s = $request->input('q')) $q->where('title','like',"%$s%");
        $posts = $q->paginate(12)->withQueryString();
        if ($posts->isEmpty()) {
            $dummy = collect([
                (object)[
                    'title' => 'Tips Liburan Murah ke Bali',
                    'excerpt' => 'Panduan lengkap dan hemat untuk liburan ke Bali bersama keluarga.',
                ],
                (object)[
                    'title' => 'Wisata Alam Terbaik di Indonesia',
                    'excerpt' => 'Rekomendasi destinasi wisata alam yang wajib dikunjungi.',
                ],
            ]);
            $posts = new \Illuminate\Pagination\LengthAwarePaginator($dummy, $dummy->count(), 12, 1);
        }
        return view('blog_index', compact('posts'));
    }
}
