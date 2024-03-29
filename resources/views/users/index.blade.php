@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    {{-- @include('layouts.headers.cards') --}}

    <div class="container-fluid mt--7">
        <div class="row">
            @include('layouts.headers.cards')
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Pokemons') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary">{{ __('previous') }}</a>
                                <a href="#" class="btn btn-sm btn-primary">{{ __('Next') }}</a>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="col-12">
                         @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif 
                    </div>--}}

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Foto') }}</th>
                                    <th scope="col">{{ __('Nome') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pokemons as $key => $pokemon)
                                    <tr style="{{'border-left: 6px solid '.$pokemon['color']}}">
                                        <td>
                                            <img src="{{$pokemon['imagem']}}">
                                        </td>
                                        <td>
                                            {{ $pokemon['nome'] }}
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    {{-- @if ($user->id != auth()->id())
                                                        <form action="{{ route('user.destroy', $user) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                {{-- <h3 class="mb-0">{{ __('Pokemons') }}</h3> --}}
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-primary">{{ __('previous') }}</a>
                                <a href="#" class="btn btn-sm btn-primary">{{ __('Next') }}</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
            
        {{-- @include('layouts.footers.auth') --}}
    </div>
@endsection