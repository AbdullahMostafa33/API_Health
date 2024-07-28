<?php

namespace App\Http\Controllers\Api\v1;

use App\Filters\v1\CommentFilter;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\v1\CommentCollection;
use App\Http\Resources\v1\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        
        $filter = new CommentFilter();
        $filterItems = $filter->transform($request);      
      
        $appoint = Comment::where($filterItems);       
        return new CommentCollection($appoint->paginate());
        
    }

   
    public function store(CommentRequest $request)
    {
        return new CommentResource(Comment::create($request->all()));
    }

    public function show(Comment $Comment)
    {
       
       
        return new CommentResource($Comment);
    }

    public function update(CommentRequest $request, Comment $Comment)
    {
        return $Comment->update($request->all());
    }
    
    public function destroy(Comment $Comment)
    {
        $Comment->delete();
    }
}