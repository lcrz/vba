@extends('layouts.main')
@section('content')
    <div class="w-full">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h2 id="card_title" class="text-2xl font-semibold">
                                {{ __('User') }}
                            </h2>
                             
                            <a href="{{ route('users.create') }}" class="btn-primary mb-2"  data-placement="left">
                                {{ __('Create New') }}
                            </a>
                               
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="w-full">
                                <thead class="bg-primary text-white  dark:bg-primary dark:text-light">
                                    <tr class="w-full">
                                        <th class="px-4 py-3">No</th>
                                        
										<th>Nombre</th>
										<th>Email</th>
										<th>Admin</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                 <tbody class="bg-white dark:bg-darker">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="border border-gray-200 px-4 py-3 dark:border-gray-700 ">{{ ++$i }}</td>
                                            
											<td class="border border-gray-200 px-4 py-3 dark:border-gray-700 ">{{ $user->name }}</td>
											<td class="border border-gray-200 px-4 py-3 dark:border-gray-700 ">{{ $user->email }}</td>
											<td class="border border-gray-200 px-4 py-3 dark:border-gray-700 ">{{ $user->admin }}</td>

                                            <td class="border border-gray-200 px-4 py-3 dark:border-gray-700 ">
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="" href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=""><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
