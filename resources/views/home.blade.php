@extends('layouts.app')

@section('content')

<hi-modal-component></hi-modal-component>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <h2 class="navbar-brand" href="#">
            Божественный симулятор
        </h2>
        <animal-menu-component :data='@json($menu_data)'></animal-menu-component>
    </div>
</nav>
<div class="container p-5 bg-success">
    <animal-blocks-component ref="animal_blocks"></animal-blocks-component>
</div>

@endsection
