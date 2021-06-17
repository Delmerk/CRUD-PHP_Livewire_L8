<div class="container">
    <form action="{{ url('/usuario') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('usuario.form', ['modo'=> 'Crear'])
    </form>
</div>