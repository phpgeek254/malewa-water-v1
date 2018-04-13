@extends('master')
@section('content')
    <div class="row">
    	<div class="col m6 s12 noPrint animated slideInDown">
    		<a href="#add_user">
    			<button type="button" class="btn-floating btn-large waves-effect waves-light red pulse"><i class="fa fa-plus"></i></button>
    		</a>
    	</div>

        <div class="col m6 s12 noPrint animated slideInDown">
            {!! Form::open(['route'=>['search_user']]) !!}
            <div class="row">
                <div class="input-field col s6">
                {!! Form::text('user_results', null) !!}
                {!! Form::label('user_results', 'Search User') !!}
                </div>

                <div class="input-field col s6">
                <button name='submit' class="btn">
                    <i class="fa fa-search white-text"></i>
                </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>


	</div>
	<div class="row">
            <div class="col s12">
                <ul class="tabs .tabs-fixed-width">
                    @forelse ($locations as $location)
                       <li class="tab col m2 s2">
                           <a class="active blue-text" href="#{{ $location->name }}">
                               {{ $location->name }}

                           </a>
                           {{ count($location->users) }}
                       </li>
                    @empty
                       
                    @endforelse
                </ul>
            </div>
            @forelse ($locations as $location)
            <div id="{{ $location->name }}" class="col s12">
                   @include('auth.users', ['users' => $location->users])
            </div>
            @empty
               
            @endforelse
                
            
	</div>
    {{-- User List In a Table --}}
    <div class="row">
    	<div class="col s12 m8">
			{{-- @include('auth.users', $users) --}}
    	</div>
    </div>
    @include('auth.create')
@endsection