@extends('layouts.app')

@section('jumbo')
    <div id="jumbo">
        <div class="container text-center pt-5">
            <h1 style="font-size: 60px">HELLO WORLD!</h1>
            <h2 style="font-size: 30px">Vi presento il mio portfolio ♥</h2>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">

        <h3 class="mt-4 pb-5 text-center">Dai un'occhiata ai miei progetti:</h3>

        <div class="row">
            @forelse($projects as $project)
                <div class="col-3">
                    <div class="card m-3" style="width: 18rem;">
                        <img src="{{ $project->thumb }}" class="card-img-top" alt="{{ $project->title }}">
                        <div class="card-body">
                            <p class="card-text">{{ $project->title }}.</p>
                        </div>
                    </div>
                </div>
            @empty
                <h4 class="text-center">Non ci sono progetti visibili :(</h4>
            @endforelse
        </div>



    </div>
@endsection

@section('footer')
    <footer>
        <div class="container pt-3 pb-4">
            <small class="pt-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni beatae
                repudiandae alias necessitatibus optio iste, delectus ea nisi deserunt placeat voluptatem! Nam quis sapiente
                debitis, voluptas ut facere magni aliquid!</small>
        </div>
    </footer>
@endsection
