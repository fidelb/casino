@extends('layouts.app')

@section('template_title')
    {{ $game->name ?? 'Show Game' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Game</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('games.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Data:</strong>
                            {{ $game->data }}
                        </div>
                        <div class="form-group">
                            <strong>Player Id:</strong>
                            {{ $game->player_id }}
                        </div>
                        <div class="form-group">
                            <strong>Dau1:</strong>
                            {{ $game->dau1 }}
                        </div>
                        <div class="form-group">
                            <strong>Dau2:</strong>
                            {{ $game->dau2 }}
                        </div>
                        <div class="form-group">
                            <strong>Guanyada:</strong>
                            {{ $game->guanyada }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
