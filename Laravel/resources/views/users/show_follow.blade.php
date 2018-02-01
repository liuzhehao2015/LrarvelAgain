@extends('layouts.default')
@section('title', $title)

@section('content')
<div class="col-md-offset-2 col-md-8">
  <h1>{{ $title }}</h1>
  <ul class="users">
    @foreach ($users as $user)
      <li>
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
        <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>
        <div id="follow_form">
    @if (Auth::user()->isFollowing($user->id))
      <form action="{{ route('followers.destroy', $user->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-sm">取消关注</button>
      </form>
    @else
      <form action="{{ route('followers.store', $user->id) }}" method="post">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-sm btn-primary">关注</button>
      </form>
    @endif
  </div>
      </li>
    @endforeach
  </ul>

  {!! $users->render() !!}
</div>
@stop
