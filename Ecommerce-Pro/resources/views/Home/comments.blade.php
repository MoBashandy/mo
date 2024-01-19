<div style="text-align : center ;padding-bottom : 30px">
    <h1 style="font-size :30px ; padding-top:20px ; padding-bottom : 20px ;">Comments</h1>
    <form action="{{url('comment')}}" method="POST">
    @csrf
        <textarea style="height:150px ;width:600px ; padding-bottom:20px ;" placeholder="write your comment" name="comment"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="comment">
    </form>
</div>
<div style="padding-left:20%;">
    <h1 style="font-size:20px ; padding-bottom:20px;">All Comments</h1>
    @foreach ($comment as $comment)
    <div>
        <b>{{$comment->name}}</b>
        <p>{{$comment->comment}}</p>
        <a class="btn btn-primary" href="javascript::void(0);" onclick="reply(this)" data-Commntid="{{$comment->id}} ">Reply</a>
        @foreach ($reply as $rep )
        @if ($rep->comment_id == $comment->id)
        <div style="padding-left: 3%;padding-top:10px; padding-bottom: 10px;">
            <b>{{$rep->name}}</b>
            <p>{{$rep->reply}}</p>
            <a class="btn btn-primary" href="javascript::void(0);" onclick="reply(this)" data-Commntid="{{$comment->id}} ">Reply</a>
        </div>
        @endif
        @endforeach
    </div>
    @endforeach
    <br>
    <div style="display: none;" class="replaydiv">
        <form action="{{url('reply')}}" method="POST">
            @csrf
            <br>
            <input type="text" id="commentId" name="commentId" hidden="">
            <textarea style="height:100px; width:500px;" placeholder="write your reply" name="reply"></textarea>
            <br>
            <button type="submit" class="btn btn-primary">Reply</button>
            <a href="javascript::void(0);" class="btn btn-danger" onclick="reply_close(this)">Close</a>
        </form>
    </div>

</div>

