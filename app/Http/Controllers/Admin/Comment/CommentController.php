<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Services\comment\CommentService;
use App\Services\truyen\TruyenService;
use App\Services\user\UserService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $truyen, $comment, $user;

    public function __construct(TruyenService $truyen, CommentService $comment, UserService $user) {
        $this->truyen = $truyen;
        $this->comment = $comment;
        $this->user = $user;
    }

    public function create() {
        return view('admin.comment.add', [
            'title' => 'Thêm bình luận',
            'truyens' => $this->truyen->getAll(),
            'users' => $this->user->getUsers()
        ]);
    }

    public function store(Request $request) {
        $this->comment->insert($request);
        return redirect()->back(); 
    }

    public function index() {
        return view('admin.comment.list', [
            'title' => 'Danh sách bình luận',
            'values' => $this->comment->getAll()
        ]);
    }

    public function show(Comment $id) {
        return view('admin.comment.edit', [
            'title' => 'Chỉnh sửa bình luận: ',
            'value' => $id,
            'truyens' => $this->truyen->getAll(),
            'users' => $this->user->getUsers()
        ]);
    }

    public function update(Request $request, Comment $id) {
        $result = $this->comment->update($request, $id);
        if ($result) {
            return redirect('/admin/comment/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->comment->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bình luận'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa bình luận thất bại'
        ]);
    }

    public function add(Request $request) {
        $result = $this->comment->add($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Thêm thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Thêm thất bại'
        ]);
    }

    public function comment($id) {
        return response()->json($this->comment->comment($id));
    }

    public function edit(Request $request, Comment $id) {
        $result = $this->comment->edit($request, $id);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Sửa thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Sửa thất bại'
        ]);
    }

    public function delete($id) {
        $result = $this->comment->delete($id);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Xóa thất bại'
        ]);
    }
}
