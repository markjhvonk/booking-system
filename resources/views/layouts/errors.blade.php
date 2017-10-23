@if (count($errors))
    <script>
        @foreach ($errors->all() as $error)
            Materialize.toast('{{ $error }}', 4000, 'rounded deep-orange accent-3');
        @endforeach
    </script>
@endif