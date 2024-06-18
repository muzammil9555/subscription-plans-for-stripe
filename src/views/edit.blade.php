@extends('layouts.app')

@section('content')
    <h1>Edit Plan</h1>
    <form action="{{ route('plan.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $plan->name }}" required>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ $plan->price }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ $plan->description }}</textarea>
        </div>
        <div>
            <label for="periodicity_type">Periodicity Type</label>
            <select name="periodicity_type" id="periodicity_type" required>
                <option value="Weekly" {{ $plan->periodicity_type == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                <option value="Monthly" {{ $plan->periodicity_type == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="Quarterly" {{ $plan->periodicity_type == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                <option value="Yearly" {{ $plan->periodicity_type == 'Yearly' ? 'selected' : '' }}>Yearly</option>
            </select>
        </div>
        <div>
            <label for="stripe_price_plan_id">Stripe Price Plan ID</label>
            <input type="text" name="stripe_price_plan_id" id="stripe_price_plan_id" value="{{ $plan->stripe_price_plan_id }}" required>
        </div>
        <div id="features">
            <h3>Features</h3>
            @foreach ($plan->features as $index => $feature)
                <div class="feature">
                    <label for="features[{{ $index }}][key]">Key</label>
                    <input type="text" name="features[{{ $index }}][key]" value="{{ $feature->key }}" required>
                    <label for="features[{{ $index }}][value]">Value</label>
                    <input type="text" name="features[{{ $index }}][value]" value="{{ $feature->value }}" required>
                    <button type="button" onclick="removeFeature(this)">Remove</button>
                </div>
            @endforeach
        </div>
        <button type="button" onclick="addFeature()">Add Feature</button>
        <button type="submit">Save Plan</button>
    </form>

    <script>
        function addFeature() {
            const featureDiv = document.createElement('div');
            featureDiv.classList.add('feature');
            const featuresCount = document.querySelectorAll('#features > .feature').length;
            featureDiv.innerHTML = `
                <label for="features[${featuresCount}][key]">Key</label>
                <input type="text" name="features[${featuresCount}][key]" required>
                <label for="features[${featuresCount}][value]">Value</label>
                <input type="text" name="features[${featuresCount}][value]" required>
                <button type="button" onclick="removeFeature(this)">Remove</button>
            `;
            document.getElementById('features').appendChild(featureDiv);
        }

        function removeFeature(button) {
            button.parentElement.remove();
        }
    </script>
@endsection