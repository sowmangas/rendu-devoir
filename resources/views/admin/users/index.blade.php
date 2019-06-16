@extends('admin.home.index')

@section('homeContent')
    <h6><a href="{{ route('admin.users.create') }}" class="btn btn-primary">Création d'un utilisateur</a></h6>

    <form method="get" action="{{ route('admin.users.search') }}">

        <div class="input-group custom-search-form">

            <input type="text" class="form-control" name="search" id="search" placeholder="Rechercher...">
            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <td class="text-center">Prenom et Nom</td>
            <td class="text-center">Email</td>
            <td class="text-center">Role</td>
            <td class="text-center">formation</td>
            <td class="text-center">Modification</td>
            <td class="text-center" colspan="2">Actions</td>
        </tr>
        </thead>

        <tbody>
        @foreach ($users as $user)
            <tr class="text-center">
                <td>{{ $user->prenom }} {{ $user->nom }}</td>
                <td>{{ $user->adresse_mel }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->formation['nom_formation'] }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <td>
                    @if ($user->status == \App\Enum\StatusUser::LOCKED)
                        <form method="post" action="{{ route('admin.users.unlock', $user) }}">
                            @csrf {{ method_field('put') }}

                            <button type="submit" class="btn btn-danger" title="Débloquer l'utilisateur">
                                <i class="fa fa-lock"></i>
                            </button>
                        </form>
                    @endif

                    @if ($user->status == \App\Enum\StatusUser::UNLOCKED)
                        <form method="post" action="{{ route('admin.users.lock', $user) }}">
                            @csrf {{ method_field('put') }}

                            <button type="submit" class="btn btn-success" title="Bloquer l'utilisateur">
                                <i class="fa fa-unlock"></i>
                            </button>
                        </form>
                    @endif
                </td>
                <td>
                    <form method="post" action="{{ route('admin.users.reset', $user) }}">
                        @csrf {{ method_field('put') }}

                        <button type="submit" class="btn btn-warning" title="Réinitialiser mot de pass de l'utilisateur">
                            <i class="fa fa-undo"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        {{ $users->links() }}
        </tbody>
    </table>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
