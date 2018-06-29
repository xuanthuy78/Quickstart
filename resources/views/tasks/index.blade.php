@extends('layouts.master')

@section('content')

<div class="panel-body">
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            @if (Session::has('success'))
              <div class="alert alert-success text-center">
                  {{ Session::get('success') }}
              </div>
            @endif
            @if (Session::has('delete'))
              <div class="alert alert-success text-center">
                  {{ Session::get('delete') }}
              </div>
            @endif
            <div class="form-group" class="table">
                <label for="task-name" name="name" class="col-sm-3 control-label">New Task</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                    @if($errors->has('name'))
                    <p class="control text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus"></span> Add Task
                    </button>
                </div>
            </div><br>
        </form>
        <div class="form-group" class="table" >
        	<div class="col-sm-offset-3 col-sm-6">
                <label>Current Tasks</label>
                <table class="table table-hover" >
                	@foreach($tasks as $task)
                	<tr>
                		<td>{{$task->name}}</td>
                        <td><a href="{{url('task/' . $task->id . '/delete')}}" class="btn btn-warning" ><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                	</tr>
                	@endforeach
                </table>
            </div>
        </div>
</div>

@stop