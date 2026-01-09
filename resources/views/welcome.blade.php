@extends('Layout.Style')
@section('content')
<style>
    .welcome-section {
        background: linear-gradient(to right, lightblue, #87CEEB); /* Gradient to match navbar */
        padding: 40px 0; /* Added padding for spacing */
    }

    .welcome-title {
        color: white;
        font-size: 2.5rem; /* Smaller font size */
        font-weight: bold;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3); /* Adds a shadow for contrast */
        text-align: center; /* Center the text */
    }
</style>

<div class="welcome-section">
    <h1 class="welcome-title">Bienvenue</h1>
</div>
@endsection
