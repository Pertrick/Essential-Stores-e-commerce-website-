<base href="/">
@include('admin.partials.header')

@include('admin.partials.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="p-4 m-4">
            @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <div style="text-align: center">{{session()->get('message') }}</div>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                            </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Sn.</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>User</th>
                                    <th>Admin</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $user)
                                        <form action="{{route('admin.user.assignroles')}}" method="POST"
                                              onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <tr>

                                            <td>{{$sn++}}.</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>

                                            <td>
                                                <input type="checkbox" {{$user->hasRole('User')? 'checked' : ''}}  name="role_user">

                                            </td>
                                            <td>
                                                <input type="checkbox" {{$user->hasRole('Administrator')? 'checked' : ''}}  name="role_admin">
                                            </td>


                                            <td>

                                                    <input type="hidden" value="{{$user->email}}" name="email">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit"  value="Assign Roles" class="btn btn-success">

                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                @else
                                    <tr><td colspan="9" style="text-align: center">No User to display</td></tr>
                                @endif
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->




@include('admin.partials.footer')
