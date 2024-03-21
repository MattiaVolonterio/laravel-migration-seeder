@extends('template.app')

@section('page_title', 'Train')

@section('main')
    <div class="container my-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Compagnia</th>
                    <th scope="col">Stazione di partenza</th>
                    <th scope="col">Stazione d'arrivo</th>
                    <th scope="col">Partenza</th>
                    <th scope="col">Arrivo</th>
                    <th scope="col">Codice del Treno</th>
                    <th scope="col">Numero di carrozze</th>
                    <th scope="col">In Orario</th>
                    <th scope="col">Cancellato</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trains as $train)
                    <tr>
                        <th scope="row">{{ $train->id }}</th>
                        <td>{{ $train->company }}</td>
                        <td>{{ $train->departure_station }}</td>
                        <td>{{ $train->arrival_station }}</td>
                        <td>{{ $train->departure_time }}</td>
                        <td>{{ $train->arrival_time }}</td>
                        <td>{{ $train->train_code }}</td>
                        <td>{{ $train->number_of_carriages }}</td>
                        <td>
                            @if ($train->in_time)
                                Si
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            @if ($train->deleted)
                                Si
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Nessun risultato trovato</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        {{ $trains->links() }}
    </div>
@endsection
