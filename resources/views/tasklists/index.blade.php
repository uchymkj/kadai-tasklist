@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        
        @if (count($tasklists) > 0)
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>状態</th>
                        <th>タスク</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasklists as $tasklist)
                        <tr>
                            <td>{!! link_to_route('tasklists.show', $tasklist->id, ['id' => $tasklist->id]) !!}</td>
                            <td>{{ $tasklist->status }}</td>
                            <td>{{ $tasklist->content }}</td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        @endif
    @endif
    
    {!! link_to_route('tasklists.create', '新規タスクの投稿', null, ['class' => 'btn btn-primary']) !!}

@endsection