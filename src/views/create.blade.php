@extends('layouts.app')

@section('content')
    <h1>Create Plan</h1>
    <form action="{{ route('plan.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="periodicity_type">Periodicity Type</label>
            <select name="periodicity_type" id="periodicity_type" required>
                <option value="Weekly">Weekly</option>
                <option value="Monthly">Monthly</option>
                <option value="Quarterly">Quarterly</option>
                <option value="Yearly">Yearly</option>
            </select>
        </div>
        <div>
            <label for="stripe_price_plan_id">Stripe Price Plan ID</label>
            <input type="text" name="stripe_price_plan_id" id="stripe_price_plan_id" required>
        </div>
        <div id="features">
            <h3>Features</h3>
            <div class="feature">
                <label for="features[0][key]">Key</label>
                <input type="text" name="features[0][key]" required>
                <label for="features[0][value]">Value</label>
                <input type="text" name="features[0][value]" required>
                <button type="button" onclick="removeFeature(this)">Remove</button>
            </div>
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