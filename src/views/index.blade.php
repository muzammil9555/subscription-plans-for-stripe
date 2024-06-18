@extends('layouts.app')

@section('content')
    <h1>Plans</h1>
    <a href="{{ route('plan.create') }}">Create New Plan</a>
    <ul>
        @foreach ($plans as $plan)
            <li>
                <h2>{{ $plan->name }}</h2>
                <p>{{ $plan->description }}</p>
                <p>Price: ${{ $plan->price }}</p>
                <p>Periodicity: {{ $plan->periodicity_type }}</p>
                <ul>
                    @foreach ($plan->features as $feature)
                        <li>{{ $feature->key }}: {{ $feature->value }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('plan.edit', $plan->id) }}">Edit</a>
                <form action="{{ route('plan.destroy', $plan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection