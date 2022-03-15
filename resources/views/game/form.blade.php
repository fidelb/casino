<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('data') }}
            {{ Form::text('data', $game->data, ['class' => 'form-control' . ($errors->has('data') ? ' is-invalid' : ''), 'placeholder' => 'Data']) }}
            {!! $errors->first('data', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('player_id') }}
            {{ Form::text('player_id', $game->player_id, ['class' => 'form-control' . ($errors->has('player_id') ? ' is-invalid' : ''), 'placeholder' => 'Player Id']) }}
            {!! $errors->first('player_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dau1') }}
            {{ Form::text('dau1', $game->dau1, ['class' => 'form-control' . ($errors->has('dau1') ? ' is-invalid' : ''), 'placeholder' => 'Dau1']) }}
            {!! $errors->first('dau1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dau2') }}
            {{ Form::text('dau2', $game->dau2, ['class' => 'form-control' . ($errors->has('dau2') ? ' is-invalid' : ''), 'placeholder' => 'Dau2']) }}
            {!! $errors->first('dau2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('guanyada') }}
            {{ Form::text('guanyada', $game->guanyada, ['class' => 'form-control' . ($errors->has('guanyada') ? ' is-invalid' : ''), 'placeholder' => 'Guanyada']) }}
            {!! $errors->first('guanyada', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>