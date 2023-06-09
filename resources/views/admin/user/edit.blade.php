@extends('admin.layouts.main')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование пользователя</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Пользователи</a></li>
              <li class="breadcrumb-item active">{{ $user->title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="w-25">
              @csrf
              @method('patch')
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Имя пользователя"
                value="{{ $user->name }}">
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" value="{{ $user->email }}" class="form-control" name="email" placeholder="Электронная почта">
                @error('email')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-50">
                <label>Выберите роль</label>
                    <select name="role" class="form-control">
                      @foreach($roles as $id => $role)
                        <option value="{{ $id }}"
                        {{ $id == old('role_id') ? ' selected': ''}}
                        >{{$role}}</option>
                      @endforeach
                    </select>
                    @error('role')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
              </div>
              <div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
              </div>
              <input type="submit" class="btn btn-primary" value="Редактировать">
            </form>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection