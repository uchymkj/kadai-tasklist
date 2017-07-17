@extends('layouts.app')

@section('content')

    <h1>id: {{ $tasklist->id }}のタスク編集ページ</h1>
    
    @include('commons.error_tasklists')
    
    {!! Form::model($tasklist, ['route' => ['tasklists.update', $tasklist->id], 'method' =>'put']) !!}
    
        {!! Form::label('status', '状態:') !!}
        {!! Form::select('status', ['未処理' => '未処理', '処理中' => '処理中', '処理済' => '処理済' ]) !!}
        
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('更新') !!}
        
    {!! Form::close() !!}

@endsection