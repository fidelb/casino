@extends('layouts.app')

@section('template_title')
    Game
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Game') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('games.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Data</th>
										<th>Player Id</th>
										<th>Dau1</th>
										<th>Dau2</th>
										<th>Guanyada</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($games as $game)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $game->data }}</td>
											<td>{{ $game->player_id }}</td>
											<td>{{ $game->dau1 }}</td>
											<td>{{ $game->dau2 }}</td>
											<td>{{ $game->guanyada }}</td>

                                            <td>
                                                <form action="{{ route('games.destroy',$game->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('games.show',$game->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('games.edit',$game->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $games->links() !!}
            </div>
        </div>
    </div>
@endsection
