@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
   
    <h1>タスク新規作成ページ</h1>
    
    @include('commons.error_tasklists')
    
 <!-- <div class="row"> -->
   <!-- <div class="col-xs-12 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6"> -->
   
    {!! Form::model($tasklist, ['route' => 'tasklists.store']) !!}
    
        <div class="form-group">
            {!! Form::label('status', '状　態:') !!}
            {!! Form::select('status', ['' => '', '未処理' => '未処理', '処理中' => '処理中', '処理済' => '処理済' ]) !!}
        </div>
        
        <div class="form-group form-inline">
            {!! Form::label('content', 'タスク:') !!}
            {!! Form::text('content', null, ['class' => 'form-control', 'style' => 'width:80%']) !!}
        </div>
        
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
    {!! Form::close() !!}
    
   </div>
</div>
 

@endsection