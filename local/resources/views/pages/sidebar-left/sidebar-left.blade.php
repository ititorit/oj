<!-- New post -->
<div class="card content">
	<div class="card-header bg-dark text-white"><span class="fa fa-newspaper-o float-right"></span> Bài viết mới</div>
	<div class="card-body">
		@foreach($newPost as $val)
		<li><a href="{{ route('post.detail', ['id' => $val->id]) }}">{{ $val->title }}</a></li>
		@endforeach
	</div>
</div>

<!-- Search -->
<form action="{{ route('search') }}" method="GET">
  <div class="input-group content">
    <input type="text" name="keywords" class="form-control" required="true" placeholder="Nội dung tìm kiếm...">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
</form>

<!-- Menu 2 level. -->
<div id="accordion" class="content">
  <div class="card">
    <div class="card-header bg-dark">
      <a class="card-link text-white" data-toggle="collapse" data-parent="#accordion">
        <span class="fa fa-map-o float-right"></span> Thể loại
      </a>
    </div>
    @foreach($cate as $tl)
    <div class="card-header bg-secondary" id="chudeCon_parent">
      <a class="card-link text-white"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne_{{ $tl->id }}">
        <span class="fa fa-bookmark"></span> {{$tl->name}} <span id="chudeCon_child" class="fa fa-caret-down"></span>
      </a>
    </div>
    <div id="child collapseOne_{{ $tl->id }}" class="collapse show menu_2">
      <div class="card-body">
        @foreach($chude as $val)
        @if($val->idCate == $tl->id)
        <li><a href="{{ route('pages.listPost.byChuDe', ['idChuDe' => $val->id]) }}">{{ $val->name }}</a></li>
        @endif
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
</div>