<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nickname') }}
            {{ Form::text('nickname', $player->nickname, ['class' => 'form-control' . ($errors->has('nickname') ? ' is-invalid' : ''), 'placeholder' => 'Nickname']) }}
            {!! $errors->first('nickname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $player->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('data_registre') }}
            {{ Form::text('data_registre', $player->data_registre, ['class' => 'form-control' . ($errors->has('data_registre') ? ' is-invalid' : ''), 'placeholder' => 'Data Registre']) }}
            {!! $errors->first('data_registre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>