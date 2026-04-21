<h1>{{ $title }}</h1>

@foreach($rents as $rent)
    <p>{{ $rent->tenant_name }}</p>
    <p>{{ $rent->property_name }}</p>
    <p>{{ $rent->price }}</p>
    <p>{{ $rent->start_date }}</p>
    <p>{{ $rent->end_date }}</p>
    <hr>
@endforeach